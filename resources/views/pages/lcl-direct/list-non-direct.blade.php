@extends('fms')
@section('content')
    <div class="content">
        @include('partial.user-nav')
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Schedule Non Direct</h5>
            </div>
            <div class="card-body position-relative">
                <livewire:datatable.schedule-non-direct />
            </div>
        </div>
    </div>

    @include('partial.alert')
@endsection