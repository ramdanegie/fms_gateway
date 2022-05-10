<?php

namespace App\Pdf;

use App\Helper\Convert;
use TCPDF;

class BillOfLading
{
    private $pdf;
    private $draftDoc;

    public function __construct($draftDoc)
    {
        $this->draftDoc = $draftDoc;
        $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $this->pdf->SetCreator(config("app.name") . now()->format("YmdHis"));
        $this->pdf->SetAuthor(config("app.name"));
        $this->pdf->SetTitle($this->draftDoc->fcl->quote_no);
        $this->pdf->SetSubject($this->draftDoc->fcl->quote_no);
        $this->pdf->setPrintHeader(false);
        $this->pdf->setPrintFooter(false);
        $this->pdf->AddPage();
        $this->pdf->SetAutoPageBreak(false, 0);
        $this->pdf->SetFont('helvetica', '', 7);
        $this->pdf->Image(storage_path("pdf-template/billoflading.jpg"), 0, 0, 210, 297);
    }

    public function setup()
    {
        $draftDoc = $this->draftDoc;
        $this->drawReceiver($draftDoc);
        $this->drawOriginAndDest($draftDoc);

        $arr_total = [];
        $y = 120;
        if (in_array($draftDoc->fcl->quote_type, ["fcl", "breakbulk"])) {
            foreach ($draftDoc->fcl->containers as $key => $value) {
                $y += 12;
                $mtotal = $value->qty . "x" . $value->size . $value->type;
                $this->pdf->setXY(52, $y);
                $this->pdf->MultiCell(30, 4, strtoupper($mtotal), 1, "L");

                array_push($arr_total, $mtotal);
            }
        }

        $y = 120;
        foreach ($draftDoc->fcl->cargos as $key => $value) {
            $y += 12;
            $this->pdf->setXY(7, $y);
            $this->pdf->MultiCell(45, 4, strtoupper($value->marks_numbers), 1, "L");
            $this->pdf->setXY(52, $y);
            if (!in_array($draftDoc->fcl->quote_type, ["fcl", "breakbulk"])) {
                $this->pdf->MultiCell(30, 4, strtoupper($value->cargo_total_unit . " " . $value->cargo_package_type), 1, "L");
            }

            $content = [
                "G.W. (KG) :         " . $value->cargo_weight,
                "N.W. (KG) :         " . $value->cargo_volume,
                "MEAS (M3) :     " . $value->cargo_total_weight,
            ];
            $this->pdf->setXY(160, $y);
            $this->pdf->MultiCell(50, 4, strtoupper(join("\r\n", $content)), 1, "L");
        }

        $this->pdf->setXY(74, $y);
        $title = "";
        if (in_array($draftDoc->fcl->quote_type, ["fcl", "breakbulk"])) {
            $title .= "SHIPPER LOAD, COUNT, & SEAL CONTAINER \r\n";
        }

        $title .= "SAID TO CONTAIN :\r\n";
        $this->pdf->MultiCell(75, 90, strtoupper($title . $draftDoc->goods_description), 1, "L");

        $y = $this->pdf->GetY() - 19;
        $this->pdf->setXY(7, $y);
        $this->pdf->MultiCell(45, 4, "CONTAINER/SEAL NO.:", 1, "L");

        if($draftDoc->freight_bl_type == "Express Release") {
            $this->pdf->setXY(100, $y);
            $this->pdf->MultiCell(75, 90, strtoupper($draftDoc->freight_bl_type), 1, "L");
        }

        $this->pdf->setXY(53, $y);
        $this->pdf->MultiCell(45, 4, implode(",", $arr_total) . (count($arr_total) > 1 ? "" : " ONLY"), 1, "L");

        foreach ($draftDoc->fcl->containers as $value) {
            if(empty($value->containers)) continue;

            $j_items = json_decode($value->containers);
            foreach ($j_items as $j_item) {
                $y += 5;
                $this->pdf->setXY(7, $y);
                $this->pdf->MultiCell(75, 90, strtoupper("{$j_item->container}/{$j_item->seal}"), 1, "L");
            }
        }

        $y = 150;
        $this->pdf->setXY(160, $y);
        // $this->pdf->MultiCell(50, 4, "SHIPPED ON BOARD disertai Place of Receipt lalu Est Shipment Date lalu", 1, "L");
        // . $draftDoc->fcl->date_est_shipment . $draftDoc->fcl->vessel . $draftDoc->fcl->voyage 
        $place = "SHIPPED ON BOARD\r\n";
        $place .= strtoupper("FROM {$draftDoc->fcl->destination->name}, {$draftDoc->fcl->destination->city}, {$draftDoc->fcl->destination->country}.\r\n");
        $place .= strtoupper("ON " . Convert::dateFormat($draftDoc->fcl->date_est_shipment, "M d, Y") . "\r\n");
        $place .= strtoupper("BY {$draftDoc->fcl->vessel} - {$draftDoc->fcl->voyage}\r\n");
        $this->pdf->MultiCell(50, 4, strtoupper($place), 1, "L");

        $y = 220;
        $this->pdf->setXY(10, $y);
        $this->pdf->MultiCell(75, 90, "FREIGHT", 1, "L");

        if ($draftDoc->freight == "Prepaid") {
            $this->pdf->setXY(55, $y);
            $this->pdf->MultiCell(75, 90, strtoupper($draftDoc->freight), 1, "L");
        }

        if ($draftDoc->freight == "Collect") {
            $this->pdf->setXY(85, $y);
            $this->pdf->MultiCell(75, 90, strtoupper($draftDoc->freight), 1, "L");
        }

        if($draftDoc->freight_bl_type != "Express Release") {
            $y = 220;
            $this->pdf->setXY(110, $y);
            $this->pdf->MultiCell(75, 90, strtoupper($draftDoc->freight_bl_type), 1, "L");
        }

        $y = 263;
        $this->pdf->setXY(140, $y);
        $this->pdf->MultiCell(75, 90, strtoupper(Convert::dateFormat($draftDoc->fcl->date_est_shipment, "d F Y")), 1, "L");

        $y = 283;
        $this->pdf->setXY(120, $y);
        $this->pdf->MultiCell(75, 90, "PT. GATEWAY CONTAINER LINE", 1, "L");

        $this->pdf->SetFont('helvetica', '', 7);
        $y = 288;
        $this->pdf->setXY(110, $y);
        $this->pdf->MultiCell(99, 90, "AS AGENT FOR THE CARRIER _________________ AS CARRIER", 1, "L");
    }

    public function drawReceiver($draftDoc)
    {
        $this->pdf->setXY($this->pdf->GetY() + 145, 17);
        $this->pdf->MultiCell(80, 4, strtoupper($draftDoc->bl_number), 1, "L");

        $x = 7;
        $this->pdf->setXY($x, 17);
        $this->pdf->MultiCell(80, 4, strtoupper($draftDoc->shipper->shipper_name), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->shipper->address}"), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->shipper->city}, {$draftDoc->shipper->country}"), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->shipper->pic_phone}, {$draftDoc->shipper->email}"), 1, "L");

        $this->pdf->setXY($x, 46);
        $this->pdf->MultiCell(80, 4, strtoupper($draftDoc->consignee->consignee_name), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->consignee->address}"), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->consignee->city}, {$draftDoc->shipper->country}"), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->consignee->pic_phone}, {$draftDoc->shipper->email}"), 1, "L");

        if (empty($draftDoc->notify)) {
            $this->pdf->setXY($x, 73);
            $this->pdf->MultiCell(80, 4, strtoupper($draftDoc->consignee->consignee_name), 1, "L");
            $this->pdf->setX($x);
            $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->consignee->address}"), 1, "L");
            $this->pdf->setX($x);
            $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->consignee->city}, {$draftDoc->shipper->country}"), 1, "L");
            $this->pdf->setX($x);
            $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->consignee->pic_phone}, {$draftDoc->shipper->email}"), 1, "L");
        } else {
            $this->pdf->setXY($x, 73);
            $this->pdf->MultiCell(80, 4, strtoupper($draftDoc->notify->notify_name), 1, "L");
            $this->pdf->setX($x);
            $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->notify->address}"), 1, "L");
            $this->pdf->setX($x);
            $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->notify->city}, {$draftDoc->shipper->country}"), 1, "L");
            $this->pdf->setX($x);
            $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->notify->pic_phone}, {$draftDoc->shipper->email}"), 1, "L");
        }

        $this->pdf->setXY($x + 100, 73);
        $this->pdf->MultiCell(90, 4, strtoupper($draftDoc->fcl->addres_delivery), 1, "L");
    }

    public function drawOriginAndDest($draftDoc)
    {
        $y = 101;
        $this->pdf->setXY(7, $y);
        $this->pdf->MultiCell(40, 4, strtoupper("{$draftDoc->fcl->origin->name}, {$draftDoc->fcl->origin->city}"), 1, "L");
        $this->pdf->setXY(52, $y);
        $this->pdf->MultiCell(40, 4, strtoupper("{$draftDoc->fcl->origin->name}, {$draftDoc->fcl->origin->city}"), 1, "L");

        if (!empty($draftDoc->fcl->vessel)) {
            $this->pdf->setXY(7, $y + 12);
            $this->pdf->MultiCell(100, 4, "{$draftDoc->fcl->vessel}, {$draftDoc->fcl->voyage}", 1, "L");
        }

        $y = 113;
        $this->pdf->setXY(106, $y);
        $this->pdf->MultiCell(40, 4, strtoupper("{$draftDoc->fcl->destination->name}, {$draftDoc->fcl->destination->city}"), 1, "L");
        $this->pdf->setXY(156, $y);
        $this->pdf->MultiCell(40, 4, strtoupper("{$draftDoc->fcl->destination->name}, {$draftDoc->fcl->destination->city}"), 1, "L");
    }

    public function stream()
    {
        $this->setup();
        return $this->pdf->Output("{$this->draftDoc->fcl->quote_no}.pdf", 'I');
    }
}
