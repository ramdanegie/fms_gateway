@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.admin-nav')
    <div class="card mb-3">
        <div class="card-header" style="background-color: #1E367B">
            <h5 class="mb-0" style="color: #FFF02D">Manage Shipment</h5>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body position-relative">
            <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                <li class="nav-item" style="width:20% !important; text-align: center;">
                    <a class="nav-link {{ empty($form_page) ? "active" : "" }}" href="{{ route("internal.fcl_list", ['form_page' => '']) }}" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight: bold;">PENDING</a>
                </li>
                <li class="nav-item" style="width:20% !important; text-align: center;">
                    <a class="nav-link {{ ($form_page == "PRO") ? "active" : "" }}" href="{{ route("internal.fcl_list", ['form_page' => 'PRO']) }}" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight: bold;">ON PROGRESS</a>
                </li>
                <li class="nav-item" style="width:20% !important; text-align: center;">
                    <a class="nav-link {{ ($form_page == "COMP") ? "active" : "" }}" href="{{ route("internal.fcl_list", ['form_page' => 'COMP']) }}" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight: bold;">COMPLETED</a>
                </li>
                <li class="nav-item" style="width:20% !important; text-align: center;">
                    <a class="nav-link {{ ($form_page == "REJ") ? "active" : "" }}" href="{{ route("internal.fcl_list", ['form_page' => 'REJ']) }}" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight: bold;">REJECTED</a>
                </li>
                <li class="nav-item" style="width:20% !important; text-align: center;">
                    <a class="nav-link {{ ($form_page == "CNL") ? "active" : "" }}" href="{{ route("internal.fcl_list", ['form_page' => 'CNL']) }}" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight: bold;">CANCEL</a>
                </li>
            </ul>
            <div class="tab-content border p-3 mt-3" id="pill-myTabContent">
                <div class="tab-pane fade show active" id="pill-tab-newquote" role="tabpanel" aria-labelledby="newquote-tab">
                    <livewire:datatable.admin.full-container-load :issued_status="$form_page" />
                </div>
            </div>
        </div>
    </div>
</div>

@include('partial.alert')
@endsection