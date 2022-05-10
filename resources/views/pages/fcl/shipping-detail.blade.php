@extends('fms')
@section('content')
    <div class="content">
        @include('partial.user-nav')
        @include('partial.alert')
        <div class="col-lg-12 col-xl-12 col-xxl-12 h-100">
            <div class="card theme-wizard h-100 mb-5">
                <div class="card-header" style="background-color: #1E367B">
                        <h5 class="mb-0" style="color: #FFF02D">{{ $title }}</h5>
                        <hr><h6 class="mb-0" style="color: #FFFFFF">Shipment Number : </h6>
                </div>
                <div class="card-body py-4">
                    <livewire:form.fcl.detail :fullContainerLoad="$fcl" :form_page="$page" :edit_mode="2" :quote_type="$quote_type">
                </div>
            </div>
        </div>
    </div>
@endsection
