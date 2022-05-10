@extends('fms-admin')
@section('content')
    <div class="content">
        @include('partial.user-nav')
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Form Create Export Direct Schedule</h5>
                <hr>
            </div>
            <div class="card-body position-relative">
                <livewire:form.create-export-direct />
            </div>
        </div>
    </div>
@endsection
