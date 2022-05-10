@extends($extend_page)
@section('content')
<div class="content">

    @include('partial.user-nav')
    @include('partial.alert')

    <div class="col-lg-12 col-xl-12 col-xxl-12 h-100">
        <div class="card mb-3">
            <div class="card-header" style="background-color: #1E367B">
                <h5 class="mb-0" style="color: #FFF02D">Form Request Quotation</h5>                
            </div>
        </div>
        <div class="card theme-wizard h-100 mb-5">
            <div class="card-header bg-light pt-3 pb-2">
                <ul class="nav justify-content-between nav-wizard">
                    <li class="nav-item">
                        <a class="nav-link {{ ($form_page == "page-1" ? "active" : "") }} fw-semi-bold" href="{{ route($redir, ["quote_type" => $quote_type, "edit_mode" => request()->edit_mode, "page" => "page-1", "fcl_id" => $fullContainerLoad->id]) }}">
                            <span class="nav-item-circle-parent">
                                <span class="nav-item-circle">
                                    <span class="far fa-clipboard"></span>
                                </span>
                            </span>
                            <span class="d-none d-md-block mt-1 fs--1">General</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($form_page == "page-2" ? "active" : "") }} fw-semi-bold" href="{{ route($redir, ["quote_type" => $quote_type, "edit_mode" => request()->edit_mode, "page" => "page-2", "fcl_id" => $fullContainerLoad->id]) }}">
                            <span class="nav-item-circle-parent">
                                <span class="nav-item-circle">
                                    <span class="fas fa-object-group"></span>
                                </span>
                            </span>
                            <span class="d-none d-md-block mt-1 fs--1">Detail</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($form_page == "page-3" ? "active" : "") }} fw-semi-bold" href="{{ route($redir, ["quote_type" => $quote_type, "edit_mode" => request()->edit_mode, "page" => "page-3", "fcl_id" => $fullContainerLoad->id]) }}">
                            <span class="nav-item-circle-parent">
                                <span class="nav-item-circle">
                                    <span class="far fa-file-alt"></span>
                                </span>
                            </span>
                            <span class="d-none d-md-block mt-1 fs--1">Document</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($form_page == "page-4" ? "active" : "") }} fw-semi-bold" href="{{ route($redir, ["quote_type" => $quote_type, "edit_mode" => request()->edit_mode, "page" => "page-4", "fcl_id" => $fullContainerLoad->id]) }}">
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
                    <livewire:form.fcl.type-of-shipment :fullContainerLoad="$fullContainerLoad" :form_page="$form_page" :edit_mode="$edit_mode" :quote_type="$quote_type" :redir="$redir">
                        @endif

                        @if ($form_page == "page-2")
                        <livewire:form.fcl.detail :fullContainerLoad="$fullContainerLoad" :form_page="$form_page" :edit_mode="$edit_mode" :quote_type="$quote_type" :redir="$redir">
                            @endif

                            @if ($form_page == "page-3")
                            <livewire:form.fcl.attachments :fullContainerLoad="$fullContainerLoad" :edit_mode="$edit_mode" :quote_type="$quote_type" :redir="$redir">
                                @endif

                                @if ($form_page == "page-4")
                                <livewire:form.fcl.confirm :fullContainerLoad="$fullContainerLoad" :edit_mode="$edit_mode" :quote_type="$quote_type" :redir="$redir">
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
                                            initSelect2();
                                            flatpickr($("input.datetimepicker"), {"enableTime": true, "dateFormat": "d/m/y H:i", "disableMobile": true, minDate: "today"});
                                            flatpickr($("input.datepicker"), {"enableTime": false, "dateFormat": "d/m/y", "disableMobile": true, minDate: "today"});

                                            Livewire.hook('element.updated', (el, component) => {
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
                                                $("#insurance").unbind().change(function () {
                                                    $("#amount").val(0).change();
                                                });

                                                $("#amount").unbind().focusin(function () {
                                                    let _this = $(this);
                                                    _this.val(pure_amount);
                                                });

                                                $("#amount").unbind().on("change focusout", function () {
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

                                                setTimeout(() => {
                                                    flatpickr($("input.datetimepicker"), {"enableTime": true, "dateFormat": "d/m/y H:i", "disableMobile": true, minDate: "today"});
                                                    flatpickr($("input.datepicker"), {"enableTime": false, "dateFormat": "d/m/y", "disableMobile": true, minDate: "today"});
                                                    initSelect2();
                                                }, 100);
                                            });
                                        });

                                        function initSelect2() {
                                            $('.select2').select2();
                                            $('.select2').off('change').on('change', function (e) {
                                                let _this = $(this);
                                                let ch = "";

                                                if (_this.hasClass("origin")) {
                                                    ch = _this.hasClass("d") ? "D" : "P";
                                                    Livewire.emit('changeOrigin', this.value, ch);
                                                }

                                                if (_this.hasClass("destination")) {
                                                    ch = _this.hasClass("d") ? "D" : "P";
                                                    Livewire.emit('changeDestination', this.value, ch);
                                                }

                                                if (_this.hasClass("delivery")) {
                                                    Livewire.emit('changeDelivery', this.value);
                                                }

                                                if (_this.hasClass("pickup")) {
                                                    Livewire.emit('changePickup', this.value);
                                                }
                                            });
                                        }
                                    </script>
                                    @endpush