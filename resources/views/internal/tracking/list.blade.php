@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.admin-nav')
    <div class="card mb-3">
        <div class="card-header" style="background-color: #1E367B">
            <h5 class="mb-0" style="color: #FFF02D">List Tracking Shipment</h5>        

        </div>
        <div class="card-body position-relative">
            <div id="actions">
                <button class="btn btn-falcon-default btn-sm mx-2" type="button">
                    <span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ms-1">Filter</span>
                </button>
            </div><hr>
            <livewire:datatable.tracking />
        </div>
    </div>
</div>

@include('partial.alert')
@endsection
