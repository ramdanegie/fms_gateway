@extends('fms')
@section('content')
    <div class="content">
        @include('partial.user-nav')
        <div class="row mb-3">
            <div class="col">
                <div class="card shadow-none border" style="background-color: #1E367B">
                    <div class="row gx-0 flex-between-center">
                        <div class="col-sm-auto d-flex align-items-center">&nbsp;&nbsp;&nbsp;
                            <div>
                                <h4 class="text-white fs--1 mb-0">Welcome to Gateway
                                    <span class="text fw-medium" style="color: #FFF02D">&nbsp;Portal System</span>
                                </h4>
                                <h5 class="text-white fw-bold mb-0 overflow-hidden">A smarter way to order <span
                                        class="typed-text fw-bold ms-1"
                                        data-typed-text='["Full Container Load.","Less Container Load.","Non Container Shipment.","Air Freight.","Full Truck Load.","Less Truck Load.","Custom Clearance."]'></span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-md-auto p-3">
                            <form class="row align-items-center g-3">
                                <div class="col-auto">
                                    <h6 class="text-white mb-0">Calendar :</h6>
                                </div>
                                <div class="col-md-auto position-relative">
                                    <input class="form-control form-control-sm datetimepicker ps-4" id="Date" type="text"
                                        data-options="Date.now();" /><span
                                        class="fas fa-calendar-alt text-primary position-absolute top-50 translate-middle-y ms-2">
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-lg-9">
                <div class="row mb-3">
                    <div class="col-sm-6 col-md-4 mb-3 mb-sm-3 mb-lg-0">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card"
                                style="background-image:url({{ asset('falcon/assets/img/icons/spot-illustrations/corner-3.png') }});">
                            </div>
                            <div class="card-body position-relative">
                                <h6>Quote on Going</h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" style="color: #1e367b" data-countup='{"endValue": {{ \App\Models\FullContainerLoad::mine()->ongoing()->count() }}}'>0</div>
                                <!-- <a class="fw-semi-bold fs--1 text-nowrap">See all <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 mb-3 mb-sm-3 mb-lg-0">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card"
                                style="background-image:url({{ asset('falcon/assets/img/icons/spot-illustrations/corner-4.png') }});">
                            </div>
                            <!--/.bg-holder-->

                            <div class="card-body position-relative">
                                <h6>Shipment on Going</h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif " style="color: #1e367b"
                                    data-countup='{"endValue":{{ \App\Models\FullContainerLoad::mine()->onShipment()->count() }}}'>0</div>
                                <!-- <a class="fw-semi-bold fs--1 text-nowrap">See
                                    all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card overflow-hidden" style="min-width: 12rem">
                            <div class="bg-holder bg-card"
                                style="background-image:url({{ asset('falcon/assets/img/icons/spot-illustrations/corner-5.png') }});">
                            </div>
                            <div class="card-body position-relative">
                                <h6>Shipment Completed</h6>
                                <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" style="color: #1e367b" data-countup='{"endValue":{{ \App\Models\FullContainerLoad::mine()->onShipmentComplete()->count() }}}'>0</div>
                                <!-- <a class="fw-semi-bold fs--1 text-nowrap">See all <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row flex-between-center g-card">
                            <div class="col-auto">
                                <h6>Shipment Completed This Week</h6>
                            </div>
                            <div class="col-auto d-flex">
                                <div class="btn btn-sm btn-text d-flex align-items-center p-0 me-3 shadow-none"
                                    id="echart-bar-report-for-this-week-option-1"><span
                                        class="fas fa-circle text-primary fs--2 me-1"></span><span
                                        class="text">This Week </span></div>
                                <div class="btn btn-sm btn-text d-flex align-items-center p-0 shadow-none"
                                    id="echart-bar-report-for-this-week-option-2"><span
                                        class="fas fa-circle text-300 fs--2 me-1"></span><span class="text">Last
                                        Week</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0">
                        <!-- Find the JS file for the following chart at: src/js/charts/echarts/report-for-this-week.js-->
                        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                        <div class="echart-bar-report-for-this-week" data-echart-responsive="true"
                            data-chart="{&quot;option1&quot;:&quot;echart-bar-report-for-this-week-option-1&quot;,&quot;option2&quot;:&quot;echart-bar-report-for-this-week-option-2&quot;}">
                        </div>
                    </div>
                </div>
            </div>

            @if (\App\Models\Banner::count() > 0)
            <div class="col-lg-3 pe-lg-4">
                <div class="row">
                    <div class="col-lg-12 mb-lg-0">
                        <div class="swiper-container theme-slider"
                            data-swiper='{"autoplay":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                            <div class="swiper-wrapper">
                            @foreach (\App\Models\Banner::get() as $item)
                                <div class="swiper-slide"><img class="rounded-1 img-fluid" src="{{ asset("files/{$item->file_banner}") }}" alt="{{ $item->title }}" /></div>
                            @endforeach
                            </div>
                            <div class="swiper-nav">
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <hr>
    </div>
@endsection

@push('script')
<script>
    var data = {!! json_encode($reports) !!};
    reportForThisWeekInit(data);
</script>
@endpush