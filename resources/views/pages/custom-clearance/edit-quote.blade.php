@extends('fms')
@section('content')
<div class="content">
    @include('partial.user-nav')
    @include('partial.alert')

    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);">
        </div> <!--/.bg-holder-->
        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Edit Quote of Custom Clearance</h5>
                    <p class="mt-2">You can check status, update and delete your quotation</p>
                </div>
            </div>
        </div>
    </div>

    <livewire:datatable.edit-quote-custom-clearance />
</div>
@endsection