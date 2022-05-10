@extends('fms-auth')
@section('content')
    <div class="container-fluid">
        <div class="row min-vh-100 flex-center g-0">
            <div class="col-lg-8 col-xxl-5 py-3 position-relative">
                <img class="bg-auth-circle-shape"
                    src="{{ asset('falcon/assets/img/icons/spot-illustrations/bg-shape.png') }}" alt="" width="250">
                <img class="bg-auth-circle-shape-2"
                    src="{{ asset('falcon/assets/img/icons/spot-illustrations/shape-1.png') }}" alt="" width="150">
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
                                            <br>the Place to Order Freight Forwarding & more
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-3 mb-4 mt-md-4 mb-md-5 light">
                                    <p class="pt-3 text-white">Have an account?<br>
                                        <a class="btn btn-outline-light mt-2 px-4" href="{{ route("login") }}">Log In</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-7 d-flex flex-center">
                                <livewire:registration-form />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
