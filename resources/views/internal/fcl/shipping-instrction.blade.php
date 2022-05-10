@extends('fms-admin')
@section('content')
    <div class="content">
        @include('partial.user-nav')
        @include('partial.alert')
        <div class="col-lg-12 col-xl-12 col-xxl-12 h-100">
            <div class="card theme-wizard h-100 mb-5">
                <div class="card-header bg-light pt-3 pb-2">
                    <h3>{{ $title }}</h3>
                </div>
                <div class="card-body py-4">
                    <livewire:form.shipping-instruction :fcl="$fcl" :admin_mode=true>
                </div>
            </div>
        </div>
    </div>
@endsection
