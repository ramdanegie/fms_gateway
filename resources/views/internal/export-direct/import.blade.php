@extends('fms-admin')
@section('content')
    <div class="content">
        @include('partial.user-nav')
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Form Export Direct Schedule</h5>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ url("files/example/import-direct.xlsx") }}" download="export-direct.xlsx" class="btn btn-sm btn-primary">Download Example</a>
                    </div>
                </div>
            </div>
            <div class="card-body position-relative">
                <livewire:form.import-export-direct />
            </div>
        </div>
    </div>
@endsection
