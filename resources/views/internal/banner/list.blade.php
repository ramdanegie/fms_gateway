@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.admin-nav')
    <div class="card-header" style="background-color: #1E367B">
        <h5 class="mb-0" style="color: #FFF02D">Data Master Banner</h5>                
    </div>
    <div class="card mb-3">
        <div class="card-header">
            <div class="alert alert-info border-2 d-flex align-items-center" role="alert">
                <div class="bg-info me-3 icon-item"><span class="fas fa-info-circle text-white fs-3"></span></div>
                <p class="mb-0 flex-1">Best & Recommended Resolution Image : 576 x 1024 pixels</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div id="actions">
                <a class="btn btn-dark me-1 mb-1 btn-sm" href="{{ route("internal.master.banner-create") }}">
                    <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ms-1">New</span>
                </a>
            </div>
        </div>
        <div class="card-body position-relative">
            <livewire:datatable.banner />
        </div>
    </div>
</div>

@include('partial.alert')
@endsection
