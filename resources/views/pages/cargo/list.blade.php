@extends('fms')
@section('content')
    <div class="content">
        @include('partial.user-nav')
        <div class="card mb-3">
            <div class="card-header" style="background-color: #1E367B">
                <h5 class="mb-0" style="color: #FFF02D">Data Master Cargo</h5>
                

                @include('partial.alert')

                
            </div>
            <div class="card-body position-relative">
                <livewire:datatable.cargo />
            </div>
        </div>
    </div>
@endsection