@extends('fms')
@section('content')
    <div class="content">
        @include('partial.user-nav')
        <div class="card mb-3">
           <div class="card-header" style="background-color: #1E367B">
                <h5 class="mb-0" style="color: #FFF02D">Form Update Cargo</h5>
                
            </div>
            <div class="card-body position-relative">
            <livewire:form.update-cargo :cargo="$cargo"/>
            </div>
        </div>
    </div>
@endsection
