<?php

namespace App\Http\Controllers;

use App\Client\TmsDesktop;
use App\Exceptions\FmsException;
use App\Models\FullContainerLoad;
use App\Models\Ticket;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FclController extends Controller
{
    public function requestQuoteHandle(Request $request, string $quote_type)
    {
        $redir = "req-quote";
        $form_page = "page-1";
        if (!empty($request->page)) {
            $form_page = $request->page;
        }

        if (empty($request->fcl_id)) {
            $fcl = FullContainerLoad::where([
                ["user_id", auth()->user()->id],
                ["quote_type", $quote_type],
                ["is_temp", 1]
            ]);
            if ($fcl->count() > 0) {
                $fcl = $fcl->first();
                return redirect()->route($redir, ["quote_type" => $quote_type, "page" => "page-1", "fcl_id" => $fcl->id]);
            } else {
                $fcl             = new FullContainerLoad();
                $fcl->user_id    = auth()->user()->id;
                $fcl->quote_type = $quote_type;
                $fcl->is_temp    = 1;
                $fcl->save();

                return redirect()->route($redir, ["quote_type" => $quote_type, "page" => "page-1", "fcl_id" => $fcl->id]);
            }
        }

        return view("pages.fcl.request-quote", [
            "edit_mode"         => $request->edit_mode,
            "form_page"         => $form_page,
            "quote_type"        => $quote_type,
            "redir"             => $redir,
            "extend_page"       => request()->user()->isAdmin() ? "fms-admin" : "fms",
            "fullContainerLoad" => FullContainerLoad::find($request->fcl_id)
        ]);
    }

    public function editQuoteHandle(Request $request)
    {
        $quote_title = "";
        return view("pages.fcl.edit-quote", [
            "filter_status" => null,
            "quote_title"   => $quote_title,
        ]);
    }

    public function shipmentHandle(Request $request)
    {
        return view("pages.fcl.manage-shipment", [
            "filter_status" => FullContainerLoad::PROGRESS
        ]);
    }

    public function detailShipmentHandle(Request $request, string $quote_type, FullContainerLoad $fcl)
    {
        return view("pages.fcl.shipping-detail", [
            "quote_type" => $quote_type,
            "fcl" => $fcl,
            "page" => "page-2",
            "title" => (isset(config("quotation_types")[$quote_type]) ? config("quotation_types")[$quote_type] : $quote_type) . " - Shipping Detail"
        ]);
    }

    public function detailCargoHandle(Request $request, string $quote_type, FullContainerLoad $fcl)
    {
        return view("pages.fcl.cargo-detail", [
            "cargos" => $fcl->cargos,
            "containers" => $fcl->containers,
        ]);
    }

    public function detailDocumentHandle(Request $request, string $quote_type, FullContainerLoad $fcl)
    {
        return view("pages.fcl.document-detail", [
            "fcl" => $fcl
        ]);
    }

    public function detailQuotation(Request $request, string $quote_type, FullContainerLoad $fcl)
    {
        if(!empty($fcl->pi_valid_until) && $fcl->pi_valid_until < now()->format("Y-m-d H:i")) {
            return abort("403", "DOCUMENT EXPIRED");
        }

        return view("pages.fcl.detail-quotation", [
            "fcl" => $fcl
        ]);
    }

    public function deleteHandle(Request $request)
    {
        $model = FullContainerLoad::find($request->id);
        if (empty($model)) {
            return back()->with("fms_error", "FCL Not found");
        }
        
        if (!empty($model->issued_at) && $model->issued_status != "REJ") {
            return back()->with("fms_error", "Delete failed! FCL is already issued, issued status : {$model->issued_status}");
        }

        try {
            $error = "";
            TmsDesktop::deleteQuotation($error, $model->quote_no);
            if(!empty($error)) {
                throw new FmsException($error);
            }

            $model->delete();
            session()->flash("fms_info", "FCL Deleted!");
        } catch (\Throwable $th) {
            if($th instanceof FmsException) {
                session()->flash("fms_error", $th->getMessage());                
            } else {
                session()->flash("fms_error", "FCL Delete failed!");
            }
        }

        return back();
    }

    public function handleAgree(Request $request, string $quote_type, FullContainerLoad $fcl)
    {
        $fcl->pi_status = "OK";
        $fcl->save();

        return back();
    }

    public function handleReject(Request $request, string $quote_type, FullContainerLoad $fcl)
    {
        $allow = ["GET", "POST"];
        if(!in_array($request->getMethod(), $allow)) {
            return abort(404);
        }

        if($request->getMethod() == "GET") {
            return view("pages.fcl.rejection", [
                "fcl" => $fcl
            ]);
        }

        $fcl->issued_reason = $request->issued_reason;
        $fcl->issued_at     = now();
        $fcl->issued_status = "REJ";
        $fcl->pi_status     = "RJ";
        $fcl->save();

        return redirect()->route("edit-quote.full-container-load.quotation", $fcl->id);
    }

    public function createTracking(Request $request, FullContainerLoad $fcl)
    {
        $tracking = Tracking::where([
            ["trackingable_id", $fcl->id],
            ["trackingable_type", FullContainerLoad::class],
            ["is_publish", 0],
        ])->first();
        if(!empty($tracking)) {
            return redirect()->route("internal.tracking.update", $tracking->id);
        }

        $tracking = new Tracking();
        $tracking->trackingable_id = $fcl->id;
        $tracking->trackingable_type = FullContainerLoad::class;

        try {
            $tracking->saveOrFail();
        } catch (\Throwable $th) {
            return back()->with("fms_error", $th->getMessage());
        }

        return redirect()->route("internal.tracking.update", $tracking->id);
    }

    public function handleTicketing(Request $request, FullContainerLoad $fcl)
    {
        $ticket = Ticket::where([
            ["user_id", $fcl->id],
            ["ticketable_id", $fcl->id],
            ["ticketable_type", FullContainerLoad::class],
            ["is_publish", 0],
        ])->first();
        if(!empty($ticket)) {
            return redirect()->route("ticket.create", $ticket->id);
        }

        $ticket = new Ticket();
        $ticket->ticketable_id = $fcl->id;
        $ticket->ticketable_type = FullContainerLoad::class;

        try {
            $ticket->saveOrFail();
        } catch (\Throwable $th) {
            return back()->with("fms_error", $th->getMessage());
        }

        return redirect()->route("ticket.create", $ticket->id);
    }

    public function shippingInstruction(Request $request, string $quote_type, FullContainerLoad $fcl)
    {
        return view("pages.fcl.shipping", [
            "fcl" => $fcl,
            "title" => isset(config("quotation_types")[$quote_type]) ? config("quotation_types")[$quote_type] : $quote_type
        ]);
    }

    public function detailShipping(Request $request, string $quote_type, FullContainerLoad $fcl)
    {
        return view("pages.fcl.shipping-detail", [
            "fcl" => $fcl,
            "quote_type" => $quote_type
        ]);
    }

    public function bookingConfirmHandle(Request $request, string $quote_type, FullContainerLoad $fcl)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pages.fcl.pdf-booking-confirm', ["fcl" => $fcl]);
        return $pdf->stream();
    }
}
