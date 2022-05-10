@extends('fms')
@section('content')
<div class="content">
    @include('partial.user-nav')
    <div class="card mb-3">
        <div class="card-header" style="background-color: #1E367B">
            <h5 class="mb-0" style="color: #FFF02D">{{ $ticket->subject }}</h5>
        </div>

        @include('partial.alert-banner')

        <div class="card-body position-relative">
            <div>
                {{ $ticket->message }}
            </div>
            <div>
                created at : {{ $ticket->created_at->format("d/m/Y H:i") }}
                attachment : <a href="{{ url("files/{$ticket->attachment}") }}" target="blank">Attachment</a>
            </div>

            <hr>

            <ul>
                @forelse ($responses as $response)
                <li>
                    <h3 style="font-size: 14px">{{ $response->user->name }} 
                        {{ $response->user_type == 1 ? "(Administrator)" : "" }}
                    </h3>
                    <p style="font-size: 12px">{{ $response->message }}</p>
                    <p style="font-size: 11px">at {{ $response->created_at->format("d/m/Y H:i") }}</p>
                </li>
                @empty
                <li>No answer for ticket "{{ $ticket->subject }}"</li>
                @endforelse
            </ul>

            <hr>
            <form method="POST" action="{{ route(request()->user()->isAdmin() ? "internal.ticket.reply" : "ticket.reply") }}">
                <div class="row">
                    <div class="col-4">
                        <textarea class="form-control" name="answer" id="" rows="5"></textarea>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-sm btn-primary">Reply</button>
                    </div>
                </div>

                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
