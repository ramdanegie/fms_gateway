@extends('fms')
@section('content')
<div class="content">
    @include('partial.user-nav')
    @include('partial.alert')

    <div class="card mb-3">
        <div class="card-header" style="background-color: #1E367B">
            <h5 class="mb-0" style="color: #FFF02D">Manage Quotation</h5>
        </div>
    </div>

    <livewire:datatable.edit-quote-fcl :filter_status="$filter_status"/>
</div>
@endsection