@extends('fms')
@section('content')
    <div class="content">
        @include('partial.user-nav')
        <div class="card mb-3">
            <div class="card-header" style="background-color: #1E367B">
                <h5 class="mb-0" style="color: #FFF02D">Form Update Notify Party</h5>
            </div>
            <div class="card-body position-relative">
                <livewire:form.update-notifi-party :notifiParty="$notifiParty"/>
            </div>
        </div>
    </div>
@endsection
