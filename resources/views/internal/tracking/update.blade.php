@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.user-nav')
    <div class="card mb-3">
        <div class="card-header" style="background-color: #1E367B">
            <h5 class="mb-0" style="color: #FFF02D">Form Update Tracking Shipment</h5>                
        </div>
        <div class="card-body position-relative">
            <livewire:form.update-tracking :tracking="$tracking"/>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        flatpickr($("input.datepicker"), {"enableTime": false, "dateFormat": "d/m/y", "disableMobile": true, minDate: "today"});

        Livewire.hook('element.updated', (el, component) => {
            setTimeout(() => {
                flatpickr($("input.datepicker"), {"enableTime": false, "dateFormat": "d/m/y", "disableMobile": true, minDate: "today"});
            }, 100);
        });
    });
</script>
@endpush