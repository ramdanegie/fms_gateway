@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.admin-nav')

    <div class="row g-3">
        <div class="col-12">
            <div class="card overflow-hidden" style="background-color: #1E367B">
                <div class="card-header position-relative">
                    <div class="bg-holder d-none d-md-block bg-card z-index-1" style="background-image:url(../assets/img/illustrations/6.png);background-size:230px;background-position:right bottom;z-index:-1;">
                    </div>
                    <!--/.bg-holder-->

                    <div class="position-relative z-index-2">
                        <div>
                            <h3 class="text mb-1 text-white">Hello, {{ request()->user()->name }}!</h3>
                            <p class="fs--1 fw-bold text-white">Here’s what happening with your Gateway Customer Portal System Today </p>
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" style="border-top: 2px solid #FFF02D;"/>
                        </div>
                        
                        <!-- <div class="d-flex py-3">
                            <div class="pe-3">
                                <p class="text-900 fs--1 fw-bold">New Quotation</p>
                                <h4 class="text-800 mb-0">{{ \App\Models\FullContainerLoad::ongoing()->count() }}</h4>
                            </div>
                            <div class="ps-3">
                                <p class="text-900 fs--1 fw-bold">Accepted Quotation</p>
                                <h4 class="text-800 mb-0">{{ \App\Models\FullContainerLoad::onShipment()->count() }}</h4>
                            </div>
                            <div class="ps-3">
                                <p class="text-900 fs--1 fw-bold">Shipment on Going</p>
                                <h4 class="text-800 mb-0">{{ \App\Models\FullContainerLoad::ongoing()->count() }}</h4>
                            </div>
                            <div class="ps-3">
                                <p class="text-900 fs--1 fw-bold">Draft Confirmation</p>
                                <h4 class="text-800 mb-0">0</h4>
                            </div>
                            <div class="ps-3">
                                <p class="text-900 fs--1 fw-bold">Invoice Confirmation</p>
                                <h4 class="text-800 mb-0">0</h4>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row g-3 mb-3">
        <div class="col-xxl-12">
            <div class="card rounded-3 overflow-hidden h-100">
                <div class="card-body bg-line-chart-gradient d-flex flex-column justify-content-between">
                    <div class="row align-items-center g-0">
                        <div class="col light">
                            <h4 class="text-white mb-0">Shipment Info</h4>
                        </div>
                        <div class="col-auto d-none d-sm-block">
                            <select class="form-select form-select-sm mb-3" id="dashboard-chart-select">
                                <option value="successful" selected="selected">By Month</option>
                                <option value="failed">By Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="echart-line-payment" style="height:200px" data-echart-responsive="true">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <hr>

    <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
               <div class="bg-holder bg-card"
                                style="background-image:url({{ asset('falcon/assets/img/icons/spot-illustrations/corner-3.png') }});">
                            </div>
                <div class="card-body position-relative">
                    <h6>Quote on Going</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"
                         data-countup='{"endValue": {{ \App\Models\FullContainerLoad::ongoing()->count() }}}'>0</div><a class="fw-semi-bold fs--1 text-nowrap">See
                        all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
               <div class="bg-holder bg-card"
                                style="background-image:url({{ asset('falcon/assets/img/icons/spot-illustrations/corner-4.png') }});">
                            </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>Shipment on Going</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"
                         data-countup='{"endValue": {{ \App\Models\FullContainerLoad::onShipment()->count() }}}'>0</div><a class="fw-semi-bold fs--1 text-nowrap">See
                        all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card"
                                style="background-image:url({{ asset('falcon/assets/img/icons/spot-illustrations/corner-5.png') }});">
                            </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                    <h6>Shipment Completed</h6>
                    <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif"
                         data-countup='{"endValue": {{ \App\Models\FullContainerLoad::onShipmentComplete()->count() }}}'>0</div><a
                         class="fw-semi-bold fs--1 text-nowrap">See all<span class="fas fa-angle-right ms-1"
                                                                        data-fa-transform="down-1"></span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <div class="card h-md-100 h-100">
                <div class="card-header bg-light">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h6>Top Customers</h6>
                        </div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm pe-4" id="select-returning-customer-month">
                                <option value="0">Jan</option>
                                <option value="1">Feb</option>
                                <option value="2">Mar</option>
                                <option value="3">Apr</option>
                                <option value="4">May</option>
                                <option value="5">Jun</option>
                                <option value="6">Jul</option>
                                <option value="7">Aug</option>
                                <option value="8">Sep</option>
                                <option value="9">Oct</option>
                                <option value="10">Nov</option>
                                <option value="11">Dec</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row h-100 justify-content-between g-0">
                        <div class="col-5 col-sm-6 col-xxl pe-2">
                            <div class="fs--2 mt-3">
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">PT. ABCD</span></div>
                                    <div class="d-xxl-none">Shipment Completed : 57</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">PT. EFGH</span></div>
                                    <div class="d-xxl-none">Shipment Completed : 20</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-warning"></span><span class="fw-semi-bold">PT. HJKL</span></div>
                                    <div class="d-xxl-none">Shipment Completed : 22</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto position-relative">
                            <div class="echart-product-share"></div>
                            <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">57</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Export</option>
                                <option>Import</option>
                                <option>Domestic</option>
                                <option>Freight Only</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Full Container Load</option>
                                <option>Less Container Load</option>
                                <option>Breakbulk</option>
                                <option>Air Freight</option>
                                <option>Full Truck Load</option>
                                <option>Less Truck Load</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-md-100 h-100">
                <div class="card-header bg-light">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <h6>Top Country</h6>
                        </div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm pe-4" id="select-returning-customer-month">
                                <option value="0">Jan</option>
                                <option value="1">Feb</option>
                                <option value="2">Mar</option>
                                <option value="3">Apr</option>
                                <option value="4">May</option>
                                <option value="5">Jun</option>
                                <option value="6">Jul</option>
                                <option value="7">Aug</option>
                                <option value="8">Sep</option>
                                <option value="9">Oct</option>
                                <option value="10">Nov</option>
                                <option value="11">Dec</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row h-100 justify-content-between g-0">
                        <div class="col-5 col-sm-6 col-xxl pe-2">
                            <div class="fs--2 mt-3">
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">India</span></div>
                                    <div class="d-xxl-none">Shipment Completed : 57</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">Kosovo</span></div>
                                    <div class="d-xxl-none">Shipment Completed : 20</div>
                                </div>
                                <div class="d-flex flex-between-center mb-1">
                                    <div class="d-flex align-items-center"><span class="dot bg-warning"></span><span class="fw-semi-bold">Belgium</span></div>
                                    <div class="d-xxl-none">Shipment Completed : 22</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto position-relative">
                            <div class="echart-product-share"></div>
                            <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">57</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light py-2">
                    <div class="row flex-between-center">
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Export</option>
                                <option>Import</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <select class="form-select form-select-sm">
                                <option>Full Container Load</option>
                                <option>Less Container Load</option>
                                <option>Air Freight</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
