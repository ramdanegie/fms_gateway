@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.admin-nav')
    <div class="card mb-3">
        <div class="card-header" style="background-color: #1E367B">
            <h5 class="mb-0" style="color: #FFF02D">Data Master Import Direct Schedule</h5>

        </div>
        <div class="card-body position-relative">
            <div id="actions">
                <a class="btn btn-dark me-1 mb-1 btn-sm" href="{{ route('internal.master.import-direct-create') }}">
                    <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ms-1">New</span>
                </a>
                <a class="btn btn-dark me-1 mb-1 btn-sm" href="{{ route('internal.master.import-direct-import') }}">
                    <span class="fas fas fa-file-excel" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ms-1">Import</span>
                </a>
            </div><hr>

            <livewire:datatable.import-direct />
        </div>
    </div>
</div>

@include('partial.alert')
@endsection
