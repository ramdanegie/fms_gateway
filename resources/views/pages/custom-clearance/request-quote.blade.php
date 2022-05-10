@extends('fms')
@section('content')
    <div class="content">
        @include('partial.user-nav')
        <div class="col-lg-12 col-xl-12 col-xxl-12 h-100">
            <div class="card theme-wizard h-100 mb-5">
                <div class="card-header bg-light pt-3 pb-2">
                    <ul class="nav justify-content-between nav-wizard">
                        <li class="nav-item">
                            <a class="nav-link {{ ($form_page == "page-1" ? "active" : "") }} fw-semi-bold" href="{{ route("req-quote.custom-clearance", ["edit_mode" => request()->edit_mode, "page" => "page-1", "ccl_id" => $customClearance->id]) }}">
                                <span class="nav-item-circle-parent">
                                    <span class="nav-item-circle">
                                        <span class="fas fa-ship"></span>
                                    </span>
                                </span>
                                <span class="d-none d-md-block mt-1 fs--1">Type of Shipment</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ($form_page == "page-2" ? "active" : "") }} fw-semi-bold" href="{{ route("req-quote.custom-clearance", ["edit_mode" => request()->edit_mode, "page" => "page-2", "ccl_id" => $customClearance->id]) }}">
                                <span class="nav-item-circle-parent">
                                    <span class="nav-item-circle">
                                        <span class="fas fa-object-group"></span>
                                    </span>
                                </span>
                                <span class="d-none d-md-block mt-1 fs--1">Detail</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ($form_page == "page-3" ? "active" : "") }} fw-semi-bold" href="{{ route("req-quote.custom-clearance", ["edit_mode" => request()->edit_mode, "page" => "page-3", "ccl_id" => $customClearance->id]) }}">
                                <span class="nav-item-circle-parent">
                                    <span class="nav-item-circle">
                                        <span class="far fa-file-alt"></span>
                                    </span>
                                </span>
                                <span class="d-none d-md-block mt-1 fs--1">Document</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ ($form_page == "page-4" ? "active" : "") }} fw-semi-bold" href="{{ route("req-quote.custom-clearance", ["edit_mode" => request()->edit_mode, "page" => "page-4", "ccl_id" => $customClearance->id]) }}">
                                <span class="nav-item-circle-parent">
                                    <span class="nav-item-circle">
                                        <span class="fas fa-thumbs-up"></span>
                                    </span>
                                </span>
                                <span class="d-none d-md-block mt-1 fs--1">Submit</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body py-4" id="wizard-controller">
                    <div class="tab-content">
                        @if ($form_page == "page-1")
                        <livewire:form.custom-clearance.type-of-shipment :customClearance="$customClearance" :form_page="$form_page">                            
                        @endif

                        @if ($form_page == "page-2")
                        <livewire:form.custom-clearance.detail :customClearance="$customClearance" :form_page="$form_page">
                        @endif

                        @if ($form_page == "page-3")
                        <livewire:form.custom-clearance.attachments :customClearance="$customClearance">                            
                        @endif

                        @if ($form_page == "page-4")
                        <livewire:form.custom-clearance.confirm :customClearance="$customClearance">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
function safeParseFloat(n) {
    n = parseFloat(n);
    if (isNaN(n)) {
        return 0;
    }

    return n;
}

document.addEventListener("DOMContentLoaded", () => {
    Livewire.hook('element.updated', (el, component) => { 
        $.each($("input.datetimepicker:not(.flatpickr-input)"), function(i, item){
            flatpickr(item, {"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true, minDate: "today"});
        });

        let IdrFormater = Intl.NumberFormat("id-ID", {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
        let UsdFormater = Intl.NumberFormat("en-EN", {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 0,
            maximumFractionDigits: 2
        });

        let pure_amount = 0;
        $("#insurance").unbind().change(function() {
            $("#amount").val(0).change();
        });

        $("#amount").unbind().focusin(function() {
            let _this = $(this);
            _this.val(pure_amount);
        });

        $("#amount").unbind().on("change focusout", function() {
            let _this = $(this),
                v = _this.val(),
                i = $("#insurance");

            pure_amount = i.val() == "USD" ? v.replace(/[^\d.-]/g, "") : v.replace(/\D/g, '');
            if (i.val() == "USD") {
                _this.val(UsdFormater.format(pure_amount));
                return;
            }

            _this.val(IdrFormater.format(pure_amount));
        });
    });
});
</script>
@endpush