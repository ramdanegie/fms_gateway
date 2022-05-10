@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.admin-nav')
    <div class="card mb-3">
        <div class="card-header" style="background-color: #1E367B">
            <h5 class="mb-0" style="color: #FFF02D">Data Master Export Direct Schedule</h5>
            
        </div>
        
        <div class="card-body position-relative">
            <livewire:datatable.export-direct />
        </div>
    </div>
</div>

@include('partial.alert')
@endsection
