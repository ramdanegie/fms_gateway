@section('depot')
<div class="col-4">
    <div class="card mb-3">
        <div class="card-body">
            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                <span class="badge bg-dark dark__bg-dark">Depo</span>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="depot_id">Depo Name</label>
                        <select disabled wire:change='changeDepo($event.target.value)' wire:model='depot_id' class="form-select" id="depot_id">
                            <option value="">- Choose -</option>
                            @foreach ($list_depo as $depo)
                            <option wire:key='depot_id_{{ $depo->id }}' value="{{ $depo->id }}">{{ $depo->name }}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="depo_city">City</label>
                        <input wire:model='depo_city' class="form-control" id="depo_city" type="text" placeholder="City" readonly/>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label" for="depo_address">Address</label>
                        <textarea wire:model='depo_address' disabled class="form-control" id="depo_address" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="date_depo_pickup">Pickup Container in Depo</label>
                        <input wire:model='date_depo_pickup' class="form-control datetimepicker" id="date_depo_pickup" type="text" placeholder="d/m/y H:i" data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
                    </div>
                </div>
                {{-- <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="date_depo_delivery">Deliver Container in Depo</label>
                        <input wire:model='date_depo_delivery' class="form-control datetimepicker" id="date_depo_delivery" type="text" placeholder="d/m/y H:i" data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('port')
<div class="col-4">
    <div class="card mb-3">
        <div class="card-body">
            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                <span class="badge bg-dark dark__bg-dark">Port</span>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="originport_id">Port</label>
                        <select disabled wire:model='originport_id' class="form-select" id="originport_id">
                            <option value="">- Choose -</option>
                            @foreach ($ports as $port)
                            <option wire:key='originport_id_{{ $port->id }}' value="{{ $port->id }}">{{ $port->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="max-dtp">Maximum Deliver Time at Port</label>
                        <input wire:model='date_max_delivery' class="form-control datetimepicker" type="text" placeholder="d/m/y H:i" data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="vessel">Vessel <small>(Optional)</small></label></label>
                        <input wire:model='vessel' class="form-control" type="text" name="vessel" placeholder="Vessel" id="vessel" />
                    </div>
                </div>
                <div class="col-6">            
                    <div class="mb-3">
                        <label class="form-label" for="voyage">Voyage <small>(Optional)</small></label></label>
                        <input wire:model='voyage' class="form-control" type="text" name="voyage" placeholder="Voyage" id="voyage" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('loading')
<div class="col-4">
    <div class="card mb-3">
        <div class="card-body">
            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                <span class="badge bg-dark dark__bg-dark">Loading</span>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="origin_location">Loading Location</label>
                        <select disabled wire:model='origin_id' wire:change='changeOrigin($event.target.value)' class="form-select">
                            <option value="">Select</option>
                        @foreach ($origins as $origin)
                            <option wire:key='origin:{{ $origin->id }}' value="{{ $origin->id }}">{{ $origin->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="origin">Country</label>
                        <input wire:model='origin_country' class="form-control" type="text" placeholder="Country" readonly/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="origin">City</label>
                        <input wire:model='origin_city' class="form-control" type="text" placeholder="City" readonly/>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label" for="address">Address</label>
                        <textarea wire:model='origin_address' readonly class="form-control" id="address" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="pickup_date">Loading Date</label>
                        <input wire:model='date_pickup' wire:ignore class="form-control datetimepicker" required="required" id="pickup_date" type="text" placeholder="d/m/y H:i" data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('unloading')
<div class="col-4">
    <div class="card mb-3">
        <div class="card-body">
            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                <span class="badge bg-dark dark__bg-dark">Unloading</span>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="destination_id">Unloading Location</label>
                        <select disabled wire:change='changeDestination($event.target.value)' wire:model='destination_id' class="form-select">
                            <option value="">Select</option>
                        @foreach ($destinations as $destination)
                            <option wire:key='dest:{{ $destination->id }}' value="{{ $destination->id }}">{{ $destination->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="destination">Country</label>
                        <input wire:model='destination_country' class="form-control" type="text" placeholder="Country" readonly/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="destination">City</label>
                        <input wire:model='destination_city' class="form-control" type="text" placeholder="City" readonly/>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label id="destination_address" class="form-label" for="address2">Address</label>
                        <textarea wire:model='destination_address' readonly class="form-control" id="destination_address" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="unloading_date">Unloading Date</label>
                        <input wire:model='date_unloading' wire:ignore class="form-control datetimepicker" required="required" id="unloading_date" type="text" placeholder="d/m/y H:i" data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    function jsChangeShipper(el) {
        var _this = $(el),
                item = _this.find("option:selected").data("bind");

        $("#shipper_country").val(item.country).change();
        $("#shipper_city").val(item.city).change();
        $("#shipper_address").val(item.address).change();
        $("#shipper_picphone").val(item.pic_phone).change();
        $("#shipper_picname").val(item.pic_name).change();
        $("#shipper_email").val(item.email).change();
    }

    function jsChangeConsignee(el) {
        var _this = $(el),
                item = _this.find("option:selected").data("bind");

        $("#consignee_country").val(item.country).change();
        $("#consignee_city").val(item.city).change();
        $("#consignee_address").val(item.address).change();
        $("#consignee_picphone").val(item.pic_phone).change();
        $("#consignee_picname").val(item.pic_name).change();
        $("#consignee_email").val(item.email).change();
    }

    function jsChangeNotify(el) {
        var _this = $(el),
                item = _this.find("option:selected").data("bind");

        $("#notify_country").val(item.country).change();
        $("#notify_city").val(item.city).change();
        $("#notify_address").val(item.address).change();
        $("#notify_picphone").val(item.pic_phone).change();
        $("#notify_picname").val(item.pic_name).change();
        $("#notify_email").val(item.email).change();
    }

    setTimeout(() => {
        jsChangeShipper($("select#shipper_id"));
        jsChangeConsignee($("select#consignee_id"));
        jsChangeNotify($("select#notifi_id"));
    }, 500);
</script>
@endpush

<div>
    <form wire:submit.prevent='submit'>
        
        <div class="row g-2">
             <div class="card-header" style="background-color: #1E367B">
                    <h5 class="mb-0" style="color: #FFF02D">Detail Draft Document</h5>
                </div>
            @if (request()->user()->isAdmin())
            <div class="col-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="bl_number">BL Number</label> <!-- Notes : Free Text -->
                            <input wire:model='bl_number' class="form-control" id="bl_number" type="text" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="airway_bill_number">Airwaybill Number</label> <!-- Notes : Free Text -->
                            <input wire:model='airway_bill_number' class="form-control" id="airway_bill_number" type="text" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="airway_bill_no">Master Airwaybill No</label> <!-- Notes : Free Text -->
                            <input wire:model='airway_bill_no' class="form-control" id="airway_bill_no" type="text" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="flight_date">Flight Date</label>
                            <input wire:model='flight_date' wire:ignore class="form-control datepicker" id="flight_date" type="text" placeholder="d/m/y" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="first_carrier">by first Carrier</label>
                            <input wire:model='first_carrier' class="form-control" id="first_carrier" type="text" placeholder="First Carrier" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="handling_information">Handling Information</label>
                            <input wire:model='handling_information' class="form-control" id="handling_information" type="text" placeholder="Handling Information" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="doc_at">At</label>
                            <input wire:model='doc_at' class="form-control" id="doc_at" type="text" placeholder="At" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="doc_place">Place</label>
                            <input wire:model='doc_place' class="form-control" id="doc_place" type="text" placeholder="Place" />
                        </div>
                    </div>
                </div>
            </div>
            @endif

            
        </div>

        <div class="row g-2">
            @if ($quote_type != "ltl")
            <div class="col-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                            <span class="badge bg-dark dark__bg-dark">Trade</span>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <label class="form-label" for="tradetype">Type of Trading</label>
                                <select wire:change='changeTradeType' wire:model='trade_type' class="form-select" aria-label="Type of Trading" id="trade_type" disabled id="tradetype">
                                    <option value="">- Choose -</option>
                                    @foreach ($list_trade_type as $k => $v)
                                    <option wire:key='{{ $k }}' value="{{ $k }}">{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            @if (!in_array($trade_type, ["DOM", ""]))
            <div class="col-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-4">
                                <div class="form-check form-switch">
                                    <input wire:model='chk_onboard' class="form-check-input" id="chk_onboard" type="checkbox"/>
                                    <label class="form-check-label" for="chk_onboard">Shipped on Board</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if ($quote_type != "ftl" && request()->user()->isAdmin())
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div
                            style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                            <span class="badge bg-dark dark__bg-dark">Shipment</span>
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="vessel">Vessel</label> <!-- Notes : Free Text -->
                                    <input wire:model='vessel' class="form-control" id="vessel" type="text" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="voyage">Voyage</label> <!-- Notes : Free Text -->
                                    <input wire:model='voyage' class="form-control" id="voyage" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="addres_delivery">Delivery</label> <!-- Notes : Free Text -->
                                    <textarea class="form-control" wire:model='addres_delivery' id="addres_delivery" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                @if (!in_array($quote_type, ["ltl", "ccl"]))
                <div class="col-5">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                <span class="badge bg-dark dark__bg-dark">Date & Time</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="shipment_date">Est Shipment Date</label>
                                        <input wire:model='date_est_shipment' wire:ignore class="form-control datepicker" id="shipment_date" type="text" placeholder="d/m/y" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            @endif
        </div>

         <div class="card-header" style="background-color: #1E367B">
                    <h5 class="mb-0" style="color: #FFF02D">Routing</h5>
                </div>
        <div class="row g-2">
            @if ($quote_type == "ftl")
            <div class="row g-2">
                @if ($trade_type == "EX")
                @yield('depot')
                @yield('loading')
                @yield('port')
                @endif

                @if ($trade_type == "IM")
                @yield('port')
                @yield('unloading')
                @yield('depot')
                @endif

                @if ($trade_type == "DOM")
                @yield('loading')
                @yield('unloading')
                @endif
            </div>
            @else
                @if (in_array($shipment_type, ['DTD', 'DTP']))
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                <span class="badge bg-dark dark__bg-dark">Origin</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="origin_id_d">Origin Location</label>
                                        <select disabled id="origin_id_d" wire:model='origin_id' wire:change='changeOrigin($event.target.value)' class="form-select select2 origin d">
                                            <option value="">Select</option>
                                            @foreach ($origins as $origin)
                                            <option wire:key='origin:{{ $origin->id }}' value="{{ $origin->id }}">{{ $origin->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="origin_country_d">Origin Country</label>
                                        <input id="origin_country_d" wire:model='origin_country' class="form-control" type="text" placeholder="Country" readonly/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="origin_city_d">Origin City</label>
                                        <input id="origin_city_d" wire:model='origin_city' class="form-control" type="text" placeholder="City" readonly/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="origin_address_d">Address</label>
                                        <textarea wire:model='origin_address' readonly class="form-control" id="origin_address_d" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="origin_printed_as">{{ ($quote_type == "air-freight" ? "Printed on AWB as" : "Printed on BL as") }}</label> <!-- Notes : Free Text -->
                                        <input wire:model='origin_printed_as' class="form-control" id="origin_printed_as" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if (in_array($shipment_type, ['PTP', 'PTD']))
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                <span class="badge bg-dark dark__bg-dark">Origin</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="originport_id_p">Origin Location</label>
                                        <select disabled id="originport_id_p" wire:model='originport_id' wire:change='changeOrigin($event.target.value, "P")' class="form-select select2 origin p">
                                            <option value="">Select</option>
                                            @foreach ($ports as $port)
                                            <option wire:key='origin:port:{{ $port->id }}' value="{{ $port->id }}">{{ $port->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="origin_country_p">Origin Country</label>
                                        <input id="origin_country_p" wire:model='origin_country' class="form-control" type="text" placeholder="Country" readonly/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="origin_city_p">Origin City</label>
                                        <input id="origin_city_p" wire:model='origin_city' class="form-control" type="text" placeholder="City" readonly/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="origin_address_p">Port</label>
                                        <textarea id="origin_address_p" wire:model='origin_address' readonly class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="origin_printed_as">{{ ($quote_type == "air-freight" ? "Printed on AWB as" : "Printed on BL as") }}</label> <!-- Notes : Free Text -->
                                        <input wire:model='origin_printed_as' class="form-control" id="origin_printed_as" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if (in_array($shipment_type, ['DTD', 'PTD']))
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                <span class="badge bg-dark dark__bg-dark">Destination</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="destination_id_d">Destination Location</label>
                                        <select disabled id="destination_id_d" wire:change='changeDestination($event.target.value)' wire:model='destination_id' class="form-select select2 destination d">
                                            <option value="">Select</option>
                                            @foreach ($destinations as $destination)
                                            <option wire:key='dest:{{ $destination->id }}' value="{{ $destination->id }}">{{ $destination->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="destination_country_d">Destination Country</label>
                                        <input id="destination_country_d" wire:model='destination_country' class="form-control" type="text" placeholder="Country" readonly/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="destination_city_d">Destination City</label>
                                        <input id="destination_city_d" wire:model='destination_city' class="form-control" type="text" placeholder="City" readonly/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="destination_address_d">Address</label>
                                        <textarea id="destination_address_d" wire:model='destination_address' readonly class="form-control" id="destination_address" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="destination_printed_as">{{ ($quote_type == "air-freight" ? "Printed on AWB as" : "Printed on BL as") }}</label> <!-- Notes : Free Text -->
                                        <input wire:model='destination_printed_as' class="form-control" id="destination_printed_as" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if (in_array($shipment_type, ['PTP', 'DTP']))
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                <span class="badge bg-dark dark__bg-dark">Destination</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="destiport_id_p">Destination Location</label>
                                        <select disabled id="destiport_id_p" wire:change='changeDestination($event.target.value, "P")' wire:model='destiport_id' class="form-select select2 destination p">
                                            <option value="">Select</option>
                                            @foreach ($ports as $port)
                                            <option wire:key='dest:port:{{ $port->id }}' value="{{ $port->id }}">{{ $port->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="destination_country_p">Destination Country</label>
                                        <input id="destination_country_p" wire:model='destination_country' class="form-control" type="text" placeholder="Country" readonly/>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="destination_city_p">Destination City</label>
                                        <input id="destination_city_p" wire:model='destination_city' class="form-control" type="text" placeholder="City" readonly/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="destination_address_p">Port</label>
                                        <textarea wire:model='destination_address' readonly class="form-control" id="destination_address_p" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="destination_printed_as">{{ ($quote_type == "air-freight" ? "Printed on AWB as" : "Printed on BL as") }}</label> <!-- Notes : Free Text -->
                                        <input wire:model='destination_printed_as' class="form-control" id="destination_printed_as" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if (request()->user()->isAdmin())
                <div class="col-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                <span class="badge bg-dark dark__bg-dark">Transhipment Port</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="port_id">Transhipment Port</label>
                                        <select wire:model='port_id' class="form-select" id="port_id" id="port_id">
                                            <option wire:key='trans:port:' value="">- Choose -</option>
                                            @foreach ($ports as $port)
                                            <option wire:key='trans:port:{{ $port->id }}' value="{{ $port->id }}">{{ $port->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="port_printed_as">{{ ($quote_type == "air-freight" ? "Printed on AWB as" : "Printed on BL as") }}</label> <!-- Notes : Free Text -->
                                        <input wire:model='port_printed_as' class="form-control" id="port_printed_as" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            @endif
        </div>

        @if ($chk_pickup == 1 && $trade_type == "EX" && request()->user()->isAdmin())
        <div class="row g-2">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                            <span class="badge bg-dark dark__bg-dark">Pickup Location</span>
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="pickup_id">Location Name</label>
                                    <select id="pickup_id" wire:model='pickup_id' wire:change='changeDelivery($event.target.value)' class="form-select select2 pickup">
                                        <option value="">Select</option>
                                        @foreach ($origins as $origin)
                                        <option wire:key='origin:{{ $origin->id }}' value="{{ $origin->id }}">{{ $origin->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if (in_array($trade_type, ["EX", "DOM"]))
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="pickup_date">Pickup Date</label>
                                    <input wire:model='date_pickup' {{ ($chk_pickup!= 1 ? "disabled" : "required") }} class="form-control datetimepicker" id="pickup_date" type="text" placeholder="d/m/y H:i"/>
                                </div>
                            </div>
                            @endif
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="pickup_country">Country</label>
                                    <input id="pickup_country" wire:model='pickup_country' class="form-control" type="text" placeholder="Country" readonly/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="pickup_city">City</label>
                                    <input id="pickup_city" wire:model='pickup_city' class="form-control" type="text" placeholder="City" readonly/>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="pickup_address">Address</label>
                                    <textarea id="pickup_address" wire:model='pickup_address' readonly class="form-control" id="address" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if ($chk_delivery == 1 && $trade_type == "IM")
        <div class="row g-2">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                            <span class="badge bg-dark dark__bg-dark">Delivery Location</span>
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="delivery_id">Location Name</label>
                                    <select id="delivery_id" wire:model='delivery_id' wire:change='changeDelivery($event.target.value)' class="form-select select2 delivery">
                                        <option value="">Select</option>
                                        @foreach ($origins as $origin)
                                        <option wire:key='origin:{{ $origin->id }}' value="{{ $origin->id }}">{{ $origin->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if (in_array($trade_type, ["IM", "DOM"])) 
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="unloading_date">Unloading Date</label>
                                    <input wire:model='date_unloading' {{ ($chk_delivery!= 1 ? "disabled" : "required") }} class="form-control datetimepicker" id="unloading_date" type="text" placeholder="d/m/y H:i" />
                                </div>
                            </div>
                            @endif
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="delivery_country">Country</label>
                                    <input id="delivery_country" wire:model='delivery_country' class="form-control" type="text" placeholder="Country" readonly/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="delivery_city">City</label>
                                    <input id="delivery_city" wire:model='delivery_city' class="form-control" type="text" placeholder="City" readonly/>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="delivery_address">Address</label>
                                    <textarea id="delivery_address" wire:model='delivery_address' readonly class="form-control" id="address" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

         <div class="card-header" style="background-color: #1E367B">
                    <h5 class="mb-0" style="color: #FFF02D">What are you Shipping?</h5>
                </div>
        <div class="row g-2">

            @if (in_array($quote_type, ["ftl"]))
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div
                            style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                            <span class="badge bg-dark dark__bg-dark">Truck</span>
                        </div>
                        <div class="row g-2">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="truck_id">Truck Type</label>
                                    <select disabled wire:model='truck_id' class="form-select" id="truck_id">
                                        <option value="">- Choose -</option>
                                        @foreach ($trucks as $truck)
                                        <option value="{{ $truck->id }}">{{ $truck->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label" for="qty_unit"> Total Unit
                                        <span class="badge rounded-pill bg-secondary">Units</span>
                                    </label>
                                    <input disabled wire:model='qty_unit' class="form-control" type="number" min="0" placeholder="Unit Depth" id="qty_unit" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (in_array($quote_type, ["fcl", "ftl"]))
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <div style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                            <span class="badge bg-dark dark__bg-dark">Container</span>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @foreach ($frm_container as $i => $val)
                                <div id="root_party.{{ $val }}">
                                    <div class="row g-2" id="party.{{ $val }}">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="size.{{ $val }}">Size Container</label>
                                                <select disabled wire:model='size.{{ $val }}' class="form-select" aria-label="Size Container" id="size.{{ $val }}">
                                                    <option value="">- Choose -</option>
                                                @foreach ($size_containers as $item)
                                                    <option wire:key='size.{{ $val }}{{ $item->value }}' value="{{ $item->value }}">{{ $item->display }}</option>
                                                @endforeach
                                                </select>
                                                @error('size.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="type.{{ $val }}">Type Container</label>
                                                <select disabled wire:model='container_type.{{ $val }}' class="form-select" aria-label="Type Container" id="type.{{ $val }}">
                                                    <option value="">- Choose -</option>
                                                @foreach ($type_containers as $item)
                                                    <option wire:key='container_type.{{ $val }}{{ $item->title }}' value="{{ $item->title }}">{{ $item->description }}</option>
                                                @endforeach
                                                </select>
                                                @error('container_type.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="qty.{{ $val }}">Total Container</label>
                                                <input disabled wire:model='qty.{{ $val }}' class="form-control" type="number" min="0" name="totalcontainer" placeholder="Total Container" id="qty.{{ $val }}" />
                                                @error('qty.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            @if (request()->user()->isAdmin())
                            @for ($i = 0; $i < $qty[$val]; $i++)
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="containers.{{ $val }}.{{ $i }}">Container Number</label>
                                            <input disabled wire:model='containers.{{ $val }}.{{ $i }}' class="form-control" type="text" placeholder="Container" id="containers.{{ $val }}.{{ $i }}" />
                                            @error('containers.{{ $val }}.{{ $i }}') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="seals.{{ $val }}.{{ $i }}">Seal</label>
                                            <input disabled wire:model='seals.{{ $val }}.{{ $i }}' class="form-control" type="text" placeholder="Seal" id="seals.{{ $val }}.{{ $i }}" />
                                            @error('seals.{{ $val }}.{{ $i }}') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (in_array($quote_type, ["ccl"]))
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                            <span class="badge bg-dark dark__bg-dark">Cargo Value</span>
                        </div>
                        <div class="row g-2">
                            <label class="form-label">Cargo Value</label>
                            <div class="col-4">
                                <div class="mb-3">
                                    <select wire:model='cargo_cur' class="form-select" id="insurance"  data-options='{"placeholder":true}'>
                                        <option value="">- Choose -</option>
                                        <option value="IDR">IDR</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <input wire:model='cargo_amount' id="amount" class="form-control" type="text" placeholder="Value" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                            <span class="badge bg-dark dark__bg-dark">Freight Value</span>
                        </div>
                        <div class="row g-2">
                            <label class="form-label">Freight Value</label>
                            <div class="col-4">
                                <div class="mb-3">
                                    <select wire:model='freight_cur' class="form-select" id="insurance"  data-options='{"placeholder":true}'>
                                        <option value="">- Choose -</option>
                                        <option value="IDR">IDR</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <input wire:model='freight_amount' id="amount" class="form-control" type="text" placeholder="Value" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if ($quote_type != "ftl")
            <div class="col-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <div
                            style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                            <span class="badge bg-dark dark__bg-dark">Insurance</span>
                        </div>
                        <div class="row g-2">
                            <label class="form-label">Insurance&nbsp;</label> <!-- Notes : Data Quotation, Khusus CIF Insurance Wajib ada, -->
                            <div class="col-4">
                                <div class="mb-3">
                                    <select disabled wire:model='insurance_cur' class="form-select" id="insurance" data-options='{"placeholder":true}'>
                                        <option value="">- Choose -</option>
                                        <option value="IDR">IDR</option>
                                        <option value="USD">USD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <input disabled wire:model='insurance_amount' id="amount" class="form-control" type="text" placeholder="Value" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @foreach ($frm_cargo as $i => $val)
            <div id="form_area.{{ $i }}">
                <div class="row g-2">
                    <div class="col-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Cargo</span>
                                </div>

                                <div class="col-10">
                                    <div class="mb-3">
                                        <label for="cargo-description">Cargo Description</label>&nbsp;
                                        <select disabled wire:model='cargo_id.{{ $val }}' wire:change='changeCargo($event.target.value, {{ $val }})' class="form-select" id="cargo-description.{{ $val }}">
                                            <option value="">Select</option>
                                            @foreach ($cargos as $cargo)
                                            <option wire:key='cargo_id.{{ $val }}{{ $cargo->id }}' value="{{ $cargo->id }}">{{ $cargo->description }}</option>
                                            @endforeach
                                        </select>
                                        @error('cargo_id.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="mb-3">
                                        <label class="form-label" for="cargo_type.{{ $val }}">Type of Cargo</label>
                                        <input disabled wire:model='cargo_type.{{ $val }}' class="form-control" type="text" placeholder="Cargo type" id="cargo_type.{{ $val }}" />
                                        @error('cargo_type.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="mb-3">
                                        <label class="form-label" for="cargo_hs_code.{{ $val }}">HS Code</label>
                                        <input disabled wire:model='cargo_hs_code.{{ $val }}' class="form-control" type="text" placeholder="HS Code" id="cargo_hs_code.{{ $val }}" />
                                        @error('cargo_hs_code.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                @if (isset($cargo_type[$val]) && strtolower($cargo_type[$val]) == "dangerous goods")
                                <div class="col-10">
                                    <div class="mb-3">
                                        <label class="form-label" for="file_msds.{{ $val }}">MSDS (Material Safety Data Sheet)</label>
                                        <input disabled wire:model='file_msds.{{ $val }}' class="form-control" type="file" placeholder="File MSDS" id="file_msds.{{ $val }}" />
                                        @error('file_msds.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                @endif

                                @if (!in_array($quote_type, ["fcl", "lcl", "ftl", "ltl", "air-freight"]))
                                <div class="col-10">
                                    <div class="mb-3">
                                        <label class="form-label" for="file_cargo_image.{{ $val }}">Cargo Image</label>
                                        <input id="file_cargo_image.{{ $val }}" type="file" class="form-control" name="file" wire:model='file_cargo_image.{{ $val }}'/>
                                    </div>
                                    @error('file_cargo_image.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="card mb-3" id="card_measurement.{{ $i }}">
                            <div class="card-body">
                                <div
                                    style="width: 100%; height: 24px; margin-bottom: 10px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Measurement</span>
                                </div>
                                <div class="row g-2">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="unit-length.{{ $val }}">Unit Length</label>&nbsp;<span class="badge rounded-pill bg-secondary">CM</span>
                                            <input disabled {{ isset($is_volume[$val]) && $is_volume[$val] == 1 ? "readonly" : "" }} wire:model='cargo_length.{{ $val }}' class="form-control" type="number" min="0" placeholder="Unit Length" id="unit-length.{{ $val }}" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="unit-height.{{ $val }}">Unit Height</label>&nbsp;
                                            <span class="badge rounded-pill bg-secondary">CM</span>
                                            <input disabled {{isset($is_volume[$val]) &&  $is_volume[$val] == 1 ? "readonly" : "" }} wire:model='cargo_height.{{ $val }}' class="form-control" type="number" min="0" placeholder="Unit Height" id="unit-height.{{ $val }}" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="unit-depth.{{ $val }}">Unit Depth</label>&nbsp;
                                            <span class="badge rounded-pill bg-secondary">CM</span>
                                            <input disabled {{ isset($is_volume[$val]) && $is_volume[$val] == 1 ? "readonly" : "" }} wire:model='cargo_depth.{{ $val }}' class="form-control" type="number" min="0" placeholder="Unit Depth" id="unit-depth.{{ $val }}" />
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="total-volume.{{ $val }}">Total Volume</label>&nbsp;
                                            <span class="badge rounded-pill bg-secondary">M3</span>
                                            <input disabled {{ isset($is_volume[$val]) && $is_volume[$val] == 1 ? "" : "readonly" }} wire:model="cargo_volume.{{ $val }}" class="form-control" type="text" min="0" placeholder="Total Volume" id="total-volume.{{ $val }}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="total-unit.{{ $val }}">Total Unit</label>&nbsp;
                                            <span class="badge rounded-pill bg-secondary">Units</span>
                                            <input disabled wire:model='cargo_total_unit.{{ $val }}' class="form-control" type="number" min="0" placeholder="Total Unit" id="total-unit.{{ $val }}" />
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="unit-weight.{{ $val }}">Unit Weight</label>&nbsp;
                                            <span class="badge rounded-pill bg-secondary">KG</span>
                                            <input disabled {{ isset($is_volume[$val]) && $is_volume[$val] == 1 ? "readonly" : "" }} wire:model='cargo_weight.{{ $val }}' class="form-control" type="number" min="0" placeholder="Unit Weight" id="unit-weight.{{ $val }}" />
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="total-weight.{{ $val }}">Total Weight</label>&nbsp;
                                            <span class="badge rounded-pill bg-secondary">KG</span>
                                            <input disabled {{ isset($is_weight[$val]) && $is_weight[$val] == 1 ? "" : "readonly" }} wire:model="cargo_total_weight.{{ $val }}" class="form-control" type="number" min="0" placeholder="Total Weight" id="cargo_total_weight.{{ $val }}" />
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row g-2">
                                    <div class="col-4">
                                        <div class="form-check form-switch">
                                            <input disabled wire:model='is_volume.{{ $val }}' class="form-check-input" id="chk_volume_only.{{ $val }}" type="checkbox" />
                                            <label class="form-check-label" for="chk_volume_only.{{ $val }}">Enter Total Volume Only</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check form-switch">
                                            <input disabled wire:model='is_weight.{{ $val }}' class="form-check-input" id="is_weight.{{ $val }}" type="checkbox" />
                                            <label class="form-check-label" for="is_weight.{{ $val }}">Enter Total Weight Only</label>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>

                @if (!in_array($quote_type, ["ftl", "ltl"]))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-3" id="goods_description.{{ $i }}">
                            <div class="card-body">
                                <div
                                    style="width: 100%; height: 24px; margin-bottom: 10px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Description of Goods</span>
                                </div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="cargo_package_type.{{ $val }}">Package Type</label> <!-- Notes : Choice -->
                                            <select wire:model='cargo_package_type.{{ $val }}' class="form-select" id="cargo_package_type.{{ $val }}">
                                                <option value="">- Choose -</option>
                                                <option value="Box">Box</option>
                                                <option value="Pallets">Pallets</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="marks_numbers.{{ $val }}">Marks and Numbers</label> <!-- Notes : Free Text -->
                                            <textarea rows="8" id="marks_numbers.{{ $val }}" wire:model='marks_numbers.{{ $val }}' class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="goods_description">Description of Goods</label>
                                            <textarea rows="8" wire:model='goods_description' id="goods_description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>

        @if ($quote_type != "ltl") 
         <div class="card-header" style="background-color: #1E367B">
                    <h5 class="mb-0" style="color: #FFF02D">Freight and Remark</h5>
                </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-2">
                    @if (!in_array($quote_type, ["ftl", "ccl"]))
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="freight">Freight</label> <!-- Notes : Choice -->
                            <select wire:model='freight' class="form-select" id="freight" required>
                                <option value="">- Choose -</option>
                                <option value="Prepaid">Prepaid</option>
                                <option value="Collect">Collect</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="freight_bl_type">BL Type</label> <!-- Notes : Choice -->
                            <select wire:model='freight_bl_type' class="form-select" id="freight_bl_type" required>
                                <option value="">- Choose -</option>
                                <option value="3 (THREE) ORIGINAL">3 (THREE) ORIGINAL</option>
                                <option value="Express Release">Express Release</option>
                            </select>
                        </div>
                    </div>
                    @endif

                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="tradetype">Remark</label> <!-- Notes : Free Text -->
                            <textarea wire:model='freight_remark' class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

         <div class="card-header" style="background-color: #1E367B">
                    <h5 class="mb-0" style="color: #FFF02D">Contacts</h5>
                </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="shipper_id">Shipper <a style="color: red"><small>Party Sending the Goods</small></a></label> <!-- Notes : Data Master Shipper -->
                                    <select onchange="jsChangeShipper(this)" wire:model='shipper_id' class="form-select" id="shipper_id" required>
                                        <option value="">- Choose -</option>
                                        @foreach ($shippers as $shipper)
                                        <option data-bind="{{ $shipper }}" value="{{ $shipper->id }}">{{ $shipper->shipper_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="shipper_picname">PIC Name</label>
                                    <input wire:ignore id="shipper_picname" class="form-control" type="text"/>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="shipper_picphone">PIC Phone</label>
                                    <input wire:ignore id="shipper_picphone" class="form-control" type="text"/>
                                </div>
                            </div>
                            </div>
                            
                            <!-- <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="shipper_country">Country</label>
                                    <input wire:ignore disabled id="shipper_country" class="form-control" type="text"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="shipper_city">City</label>
                                    <input wire:ignore disabled id="shipper_city" class="form-control" type="text"/>
                                </div>
                            </div> -->
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label" for="shipper_address">Address</label>
                                    <textarea class="form-control" wire:ignore id="shipper_address" rows="8"></textarea>
                                </div>
                            </div>
                            
                            <!-- <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="shipper_email">Email</label>
                                    <input wire:ignore disabled id="shipper_email" class="form-control" type="text"/>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <hr>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="consignee_id">Consignee <a style="color: red"><small>Party Receiving the Goods</small></a></label> <!-- Notes : Data Master Consignee -->
                                    <select onchange="jsChangeConsignee(this)" wire:model='consignee_id' class="form-select" id="consignee_id" required>
                                        <option value="">- Choose -</option>
                                        @foreach ($consignees as $consignee)
                                        <option data-bind="{{ $consignee }}" value="{{ $consignee->id }}">{{ $consignee->consignee_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="consignee_picname">PIC Name</label>
                                    <input wire:ignore id="consignee_picname" class="form-control" type="text"/>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="consignee_picphone">PIC Phone</label>
                                    <input wire:ignore id="consignee_picphone" class="form-control" type="text"/>
                                </div>
                            </div>
                            </div>
                            
                           <!-- <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="consignee_country">Country</label>
                                    <input wire:ignore disabled id="consignee_country" class="form-control" type="text"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="consignee_city">City</label>
                                    <input wire:ignore disabled id="consignee_city" class="form-control" type="text"/>
                                </div>
                            </div> -->
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label" for="consignee_address">Address</label>
                                    <textarea class="form-control" wire:ignore id="consignee_address" rows="8"></textarea>
                                </div>
                            </div>
                            
                            <!-- <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="consignee_email">Email</label>
                                    <input wire:ignore disabled id="consignee_email" class="form-control" type="text"/>
                                </div>
                            </div> -->
                        </div>
                    </div><hr>

                    @if (!in_array($quote_type, ["ftl", "ltl"]))
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="notifi_id">Notify (3rd party) <a style="color: red"><small>If empty will be same as Consignee</small></a></label> <!-- Notes : Data Master Notify Party -->
                                    <select onchange="jsChangeNotify(this)" wire:model='notifi_id' class="form-select" id="notifi_id">
                                        <option value="">- Choose -</option>
                                        @foreach ($third_parties as $notifi)
                                        <option data-bind="{{ $notifi }}" value="{{ $notifi->id }}">{{ $notifi->notifi_party }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="notifi_picname">PIC Name</label>
                                    <input wire:ignore id="notifi_picname" class="form-control" type="text"/>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="notifi_picphone">PIC Phone</label>
                                    <input wire:ignore id="notifi_picphone" class="form-control" type="text"/>
                                </div>
                            </div>
                            </div>
                            <!-- <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="notifi_country">Country</label>
                                    <input wire:ignore disabled id="notifi_country" class="form-control" type="text"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="notifi_city">City</label>
                                    <input wire:ignore disabled id="notifi_city" class="form-control" type="text"/>
                                </div>
                            </div> -->
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label" for="notifi_address">Address</label>
                                    <textarea class="form-control" wire:ignore id="notifi_address" rows="8"></textarea>
                                    
                                </div>
                            </div>
                            
                            <!-- <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="notifi_email">Email</label>
                                    <input wire:ignore disabled id="notifi_email" class="form-control" type="text"/>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @if (!empty($fcl->file_documents) &&  request()->user()->isAdmin())
         <div class="card-header" style="background-color: #1E367B">
                    <h5 class="mb-0" style="color: #FFF02D">Documents</h5>
                </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-2">
                    @foreach (json_decode($fcl->file_documents) as $key => $file)
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="upload-invoice">
                                {{ (isset(config('fcl-lang')[$key]) ? config('fcl-lang')[$key] : $key) }} 
                                <a title="download file" download="{{ $key }}.{{ pathinfo($file, PATHINFO_EXTENSION) }}" class="btn btn-sm" href="{{ asset("files/{$file}") }}">
                                    <small>{{ (isset(config('fcl-lang')[$key]) ? config('fcl-lang')[$key] : $key) }} </small>
                                </a>
                            </label>
                            <input type="file" class="form-control" name="file" wire:model='{{ $key }}'/>
                        </div>
                        @error($key) <span class="error">{{ $message }}</span> @enderror
                    </div>
                    @endforeach                    
                </div>
            </div>
        </div>
        @endif

        <div class="row g-2">
            <div class="col-12 text-center">
                <button class="btn btn-primary" style="width: 25%; min-width: 100px;">{{ $admin_mode ? "UPDATE DRAFT" : "SUBMIT DRAFT" }}</button>
            </div>
        </div>

    {{-- <div wire:loading.delay.longer><div id="cover-spin"></div></div> --}}
    </form>
    @include('partial.alert')
</div>
