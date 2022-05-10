@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.user-nav')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div> <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h5>{{ $page_title }}</h5>
                    <p class="mt-2">You can check status, update and delete your {{ $page_title }}</p>
                </div>
            </div>
        </div>
    </div>

    <livewire:datatable.invoicing :page_title="$page_title" />
</div>
@endsection