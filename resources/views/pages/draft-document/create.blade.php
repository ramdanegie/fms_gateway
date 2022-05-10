@extends(auth()->user()->isAdmin() ? 'fms-admin' : 'fms')
@section('content')
<div class="content">
    @include('partial.user-nav')
    @include('partial.alert')
    <div class="col-lg-12 col-xl-12 col-xxl-12 h-100">
        <div class="card theme-dark h-100 mb-5">
            <div class="card-header" style="background-color: #1E367B">
                <h5 class="mb-0" style="color: #FFF02D">Draft Document {{ $title }}</h5>
                <hr><h6 class="mb-0" style="color: #FFFFFF">Quote Number : </h6>
            </div>
            <div class="card-body py-4">
                <livewire:form.draft-document :fcl="$fcl" :draft_type="$draft_type">
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