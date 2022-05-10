@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.admin-nav')
    <div class="card mb-3">
        <div class="card-header" style="background-color: #1E367B">
            <h5 class="mb-0" style="color: #FFF02D">Form Import Direct Schedule</h5>
        </div>

        <div class="card-body position-relative">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ url("files/example/import-direct.xlsx") }}" class="btn btn-sm btn-primary">Download Example</a>
                </div>
            </div><hr>
            <livewire:form.import-import-direct />
        </div>
    </div>
</div>
@endsection
