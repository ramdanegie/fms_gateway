<?php

namespace App\Pdf;

use App\Helper\Convert;
use TCPDF;

class AirwayBill
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
        $this->pdf->SetFont('times', '', 10);
        $this->pdf->Image(storage_path("pdf-template/airwaybill.jpg"), 0, 0, 210, 297);
    }

    public function setup()
    {
        $draftDoc = $this->draftDoc;

        $this->drawReceiver($draftDoc);

        $this->pdf->setXY(1, 98);
        $this->pdf->MultiCell(80, 4, "{$draftDoc->fcl->origin->name}, {$draftDoc->fcl->origin->country}", 1, "L");

        $this->pdf->setXY(110, 90);
        $this->pdf->MultiCell(80, 4, "FREIGHT", 1, "L");

        // first TO
        $this->pdf->setXY(1, 108);
        $this->pdf->MultiCell(80, 4, $draftDoc->fcl->destination->country_code, 1, "L");

        $this->pdf->setXY(12, 108);
        $this->pdf->MultiCell(80, 4, $draftDoc->first_carrier, 1, "L");

        // TO
        $this->pdf->setXY(61, 108);
        $this->pdf->MultiCell(80, 4, $draftDoc->transhipmentPort->country_code, 1, "L");

        // BY
        $this->pdf->setXY(72, 108);
        $this->pdf->MultiCell(80, 4, $draftDoc->transhipmentPort->country_code, 1, "L");

        $this->pdf->setXY(115, 108);
        $this->pdf->MultiCell(80, 4, ($draftDoc->fcl->shippingInstruction->freight == "Prepaid") ? "PP" : "CL", 1, "L");

        if($draftDoc->fcl->shippingInstruction->freight == "Prepaid") {
            $this->pdf->setXY(123, 109);
            $this->pdf->MultiCell(80, 4, "X", 1, "L");
            $this->pdf->setXY(133, 109);
            $this->pdf->MultiCell(80, 4, "X", 1, "L");
        } else {
            $this->pdf->setXY(128, 109);
            $this->pdf->MultiCell(80, 4, "X", 1, "L");
            $this->pdf->setXY(138, 109);
            $this->pdf->MultiCell(80, 4, "X", 1, "L");
        }

        $this->pdf->setXY(150, 107);
        $this->pdf->MultiCell(80, 4, "N.V.D", 1, "L");

        $this->pdf->setXY(180, 107);
        $this->pdf->MultiCell(80, 4, "N.C.V", 1, "L");

        $this->pdf->setXY(1, 118);
        $this->pdf->MultiCell(80, 4, "{$draftDoc->transhipmentPort->city}, {$draftDoc->transhipmentPort->country}", 1, "L");

        $this->pdf->setXY(48, 118);
        $this->pdf->MultiCell(80, 4, Convert::dateFormat($draftDoc->flight_date), 1, "L");

        $this->pdf->setXY(107, 108);
        $this->pdf->MultiCell(80, 4, $draftDoc->fcl->insurance_cur, 1, "L");
        $this->pdf->setXY(107, 118);
        $this->pdf->MultiCell(80, 4, empty($draftDoc->fcl->insurance_amount) ? "NIL" : $draftDoc->fcl->insurance_amount, 1, "L");

        // handling_information
        $this->pdf->setXY(1, 128);
        $this->pdf->MultiCell(90, 4, $draftDoc->handling_information, 1, "L");

        $this->pdf->setXY(90, 250);
        $this->pdf->MultiCell(90, 4, strtoupper(request()->user()->name), 1, "L");

        $this->pdf->setXY(85, 270);
        $this->pdf->MultiCell(30, 4, $draftDoc->created_at->format("d-M-Y"), 1, "C");

        $this->pdf->setXY(160, 270);
        $this->pdf->MultiCell(30, 4, $draftDoc->doc_at, 1, "L");

        $this->pdf->setXY(180, 270);
        $this->pdf->MultiCell(30, 4, $draftDoc->doc_place, 1, "L");

        $this->pdf->setXY(70, 285);
        $this->pdf->MultiCell(100, 4, "PT GATEWAY CONTAINER LINE", 1, "C");

        $y = 152;
        $total_unit = 0;
        $total_weight = 0;
        foreach ($draftDoc->fcl->cargos as $cargo) {
            $this->pdf->setXY(1, $y);
            $this->pdf->MultiCell(100, 4, $cargo->cargo_total_unit, 1, "L");

            $this->pdf->setXY(12, $y);
            $this->pdf->MultiCell(100, 4, $cargo->cargo_total_weight, 1, "L");

            $this->pdf->setXY(86, $y);
            $this->pdf->MultiCell(100, 4, "AS AGREED", 1, "L");

            $y += 5;
            $total_unit += $cargo->cargo_total_unit;
            $total_weight += $cargo->cargo_total_weight;
        }

        $y = 210;
        $this->pdf->setXY(1, $y);
        $this->pdf->MultiCell(30, 4, $total_unit, 1, "L");

        $this->pdf->setXY(12, $y);
        $this->pdf->MultiCell(30, 4, $total_weight, 1, "L");

        $y = 228;
        $this->pdf->setXY(2, $y);
        $this->pdf->MultiCell(30, 4, "AS ARRANGED", 1, "C");
    }

    private function drawReceiver($draftDoc)
    {
        $x = 1;
        $this->pdf->setXY($x, 6);
        $this->pdf->MultiCell(80, 4, strtoupper($draftDoc->airway_bill_no), 1, "L");

        $x = 165;
        $this->pdf->setXY($x, 6);
        $this->pdf->MultiCell(80, 4, strtoupper($draftDoc->airway_bill_number), 1, "L");

        $x = 1;
        $this->pdf->setXY($x, 22);
        $this->pdf->MultiCell(80, 4, strtoupper($draftDoc->shipper->shipper_name), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->shipper->address}"), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->shipper->city}, {$draftDoc->shipper->country}"), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->shipper->pic_phone}, {$draftDoc->shipper->email}"), 1, "L");

        $this->pdf->setXY($x, 54);
        $this->pdf->MultiCell(80, 4, strtoupper($draftDoc->consignee->consignee_name), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->consignee->address}"), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->consignee->city}, {$draftDoc->shipper->country}"), 1, "L");
        $this->pdf->setX($x);
        $this->pdf->MultiCell(80, 4, strtoupper("{$draftDoc->consignee->pic_phone}, {$draftDoc->shipper->email}"), 1, "L");
    }

    public function stream()
    {
        $this->setup();
        return $this->pdf->Output("{$this->draftDoc->fcl->quote_no}.pdf", 'I');
    }
}
