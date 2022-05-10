<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketReply;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    const TCODE = "M002";

    public function list(Request $request)
    {
        return view("pages.ticket.list");
    }

    public function create(Request $request, Ticket $ticket = null)
    {
        return view("pages.ticket.create", [
            "ticket" => $ticket
        ]);
    }

    public function detail(Request $request, Ticket $ticket)
    {
        return view("pages.ticket.detail", [
            "ticket" => $ticket,
            "responses" => TicketReply::where("ticket_id", $ticket->id)->get()
        ]);
    }

    public function reply(Request $request)
    {
        $request->validate([
            "ticket_id" => "required",
            "answer" => "required",
        ]);

        $ticket = Ticket::find($request->ticket_id);
        if(empty($ticket)) {
            return back()->withErrors("ticket not found");
        }

        $user_type = 2;
        if($ticket->user_id == $request->user()->id) {
            $user_type = 3;
        }

        if($request->user()->isAdmin()) {
            $user_type = 1;
        }

        $reply = new TicketReply();
        $reply->ticket_id = $request->ticket_id;
        $reply->user_id = $request->user()->id;
        $reply->user_type = $user_type;
        $reply->message = $request->answer;

        try {
            $reply->save();
        } catch (\Throwable $th) {
            return back()->withErrors("Failed");
        }

        return back()->with("fms_info", "Saved");
    }

    public function delete(Request $request, Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->back()->with("fms_info", "Deleted");
    }
}
