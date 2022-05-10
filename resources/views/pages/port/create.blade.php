@extends('fms-admin')
@section('content')
<div class="content">
    @include('partial.admin-nav')
    <div class="card mb-3">
        <div class="card-header" style="background-color: #1E367B">
            <h5 class="mb-0" style="color: #FFF02D">Form Create Port</h5>
        </div>
        <div class="card-body position-relative">
            <livewire:form.create-port />
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    var _map = {};
    var _geocoder = {};
    var _marker = {};
    initFmsMap();

    function initFmsMap() {
        _geocoder = new google.maps.Geocoder();
        _map = new google.maps.Map(document.getElementById('fms_map'), {
            center: {
                lat: 0,
                lng: 0
            },
            zoom: 15
        });

        _geocoder.geocode({'address': "Jakarta"}, function (results, status) {
            if (status === 'OK') {
                _map.setCenter(results[0].geometry.location);
                _marker = new google.maps.Marker({
                    position: results[0].geometry.location
                });

                _marker.setMap(_map);
                $("#lat").val(results[0].geometry.location.lat).change();
                $("#lng").val(results[0].geometry.location.lng).change();
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    function changeMapCenter(el)
    {
        el = $(el);
        let location = {address: el.val()};
        _geocoder.geocode(location, function (results, status) {
            if (status === 'OK') {
                _map.setCenter(results[0].geometry.location);
                _marker.setPosition(results[0].geometry.location);
                $("#lat").val(results[0].geometry.location.lat).change();
                $("#lng").val(results[0].geometry.location.lng).change();
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    $("#lat").change(function () {
        Livewire.emit('getLatitudeForInput', this.value);
    });
    $("#lng").change(function () {
        Livewire.emit('getLongitudeForInput', this.value);
    });
</script>
@endpush