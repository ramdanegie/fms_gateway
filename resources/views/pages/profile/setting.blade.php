@extends('fms')
@section('content')
<div class="content">
    @include('partial.user-nav')
    <div class="row g-2">
        <div class="col-9">
            <div class="card mb-3" style="background-color: #1e367b">
                <div class="card-header">
                    <h5 class="mb-0 text-white">Profile Settings</h5>
                </div>
                <div class="card-body bg-light">
                    <livewire:form.profile-setting :user='$user'>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card mb-3" style="background-color: #1e367b">
                <div class="card-header">
                    <h5 class="mb-0 text-white">Change Password</h5>
                </div>
                <div class="card-body bg-light">
                    <livewire:form.profile-update-password :user='$user'>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
