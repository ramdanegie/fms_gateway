<?php

namespace App\Http\Controllers;

use App\Models\DraftDocumentHistory;
use App\Models\FclDraftDocument;
use App\Models\FullContainerLoad as Fcl;
use Illuminate\Http\Request;

class DraftDocumentController extends Controller
{
    public function list(Request $request, string $draft_type)
    {
        return view("pages.draft-document.list", [
            "draft_type" => $draft_type,
            "page_title" => isset(config("draft_types")[$draft_type]) ? config("draft_types")[$draft_type] : $draft_type
        ]);
    }

    public function create(Request $request, string $draft_type, Fcl $fcl)
    {
        if (!$fcl->drafDocument()->exists() && $fcl->shippingInstruction()->exists()) {
            $model = new FclDraftDocument();
            $model->fcl_id                 = $fcl->id;
            $model->draft_type             = $draft_type;
            $model->si_number              = $fcl->shippingInstruction->si_number;
            $model->freight                = $fcl->shippingInstruction->freight;
            $model->freight_bl_type        = $fcl->shippingInstruction->freight_bl_type;
            $model->freight_remark         = $fcl->shippingInstruction->freight_remark;
            $model->origin_printed_as      = $fcl->shippingInstruction->origin_printed_as;
            $model->destination_printed_as = $fcl->shippingInstruction->destination_printed_as;
            $model->port_id                = $fcl->shippingInstruction->port_id;
            $model->port_printed_as        = $fcl->shippingInstruction->port_printed_as;
            $model->shipper_id             = $fcl->shippingInstruction->shipper_id;
            $model->consignee_id           = $fcl->shippingInstruction->consignee_id;
            $model->notifi_id              = $fcl->shippingInstruction->notifi_id;
            $model->attachments            = $fcl->shippingInstruction->attachments;
            $model->goods_description      = $fcl->shippingInstruction->goods_description;
            $model->is_admin_approve       = $fcl->shippingInstruction->is_admin_approve;
            $model->saveOrFail();
        }

        return view("pages.draft-document.create", [
            "fcl" => $fcl,
            "draft_type" => $draft_type,
            "title" => isset(config("draft_types")[$draft_type]) ? config("draft_types")[$draft_type] : $draft_type
        ]);
    }

    public function listHistory(Request $request, Fcl $fcl)
    {
        $items = DraftDocumentHistory::where("fcl_id", $fcl->id)->get();
        return view("pages.draft-document.history", [
            "items" => $items
        ]);
    }

    public function download(Request $request, string $draft_type, FclDraftDocument $draft)
    {
        if($draft_type == "BL") {
            return (new \App\Pdf\BillOfLading($draft))->stream();
        }

        if($draft_type == "AB") {
            return (new \App\Pdf\AirwayBill($draft))->stream();
        }

        return abort(402, "Unprocessable Content");
    }
}
