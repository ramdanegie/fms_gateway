@extends('fms-auth')
@section('content')
<div class="container-fluid">
    <div class="row min-vh-100 flex-center g-0">
        <div class="col-lg-8 col-xxl-5 py-3 position-relative">
            <img class="bg-auth-circle-shape" src="{{ asset('falcon/assets/img/icons/spot-illustrations/bg-shape.png') }}" alt="" width="250">
            <img class="bg-auth-circle-shape-2" src="{{ asset('falcon/assets/img/icons/spot-illustrations/shape-1.png') }}" alt="" width="150">
            <div class="card overflow-hidden z-index-1">
                <div class="card-body p-0">
                    <div class="row g-0 h-100">
                        <div class="col-md-5 text-center" style="background-color: #1e367b">
                            <div class="position-relative p-4 pt-md-5 pb-md-7 light">
                                <div class="bg-holder bg-auth-card-shape"
                                    style="background-image:url({{ asset('falcon/assets/img/icons/spot-illustrations/half-circle.png') }});">
                                </div>

                                <div class="z-index-1 position-relative">
                                    <img class="img" src="{{ asset('falcon/assets/img/logo.png') }}" alt="" width="150">
                                    <hr>
                                    <p class="opacity-75 text-white">
                                        <b>Welcome to Customer Portal</b>
                                        <br>
                                        The Place to Order Shipment 
                                        <br>
                                        For Our Customers
                                    </p>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                <p class="text-white">Don't have an account?<br>
                                    <a class="text-decoration-underline link-light" href="{{ route("register") }}">Get started!</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-7 d-flex flex-center">
                            <livewire:login-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection