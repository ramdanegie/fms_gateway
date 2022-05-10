@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.admin-nav')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div> <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Manage Shipment Air Freight</h5>
                    <p class="mt-2">You can check status, update and reject shipment</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body position-relative">
            <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ empty($form_page) ? "active" : "" }}" href="{{ route("internal.air_freight_list", ['form_page' => '']) }}">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($form_page == "PRO") ? "active" : "" }}" href="{{ route("internal.air_freight_list", ['form_page' => 'PRO']) }}">On Progress</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($form_page == "COMP") ? "active" : "" }}" href="{{ route("internal.air_freight_list", ['form_page' => 'COMP']) }}">Completed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($form_page == "REJ") ? "active" : "" }}" href="{{ route("internal.air_freight_list", ['form_page' => 'REJ']) }}">Rejected</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($form_page == "CNL") ? "active" : "" }}" href="{{ route("internal.air_freight_list", ['form_page' => 'CNL']) }}">Cancel</a>
                </li>
            </ul>
            <div class="tab-content border p-3 mt-3" id="pill-myTabContent">
                <div class="tab-pane fade show active" id="pill-tab-newquote" role="tabpanel" aria-labelledby="newquote-tab">
                    <div class="card mb-3">
                        <div class="card-body position-relative">
                            <div id="actions">
                                <button class="btn btn-primary me-1 mb-1 btn-sm" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">Filter</span>
                                </button>
                                <button class="btn btn-primary me-1 mb-1 btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">Export</span>
                                </button>
                            </div>

                            <livewire:datatable.admin.air-freight :issued_status="$form_page"/>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection