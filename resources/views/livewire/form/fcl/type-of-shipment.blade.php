
@section('depot')
<div class="col-12">
    <div class="card mb-3">
        <div class="card-body">
            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                <span class="badge bg-dark dark__bg-dark">Depo</span>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="depot_id">Depo Name</label>
                        <select wire:change='changeDepo($event.target.value)' wire:model='depot_id' class="form-select" id="depot_id">
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
<div class="col-12">
    <div class="card mb-3">
        <div class="card-body">
            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                <span class="badge bg-dark dark__bg-dark">Port</span>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="originport_id">Port</label>
                        <select wire:model='originport_id' class="form-select" id="originport_id">
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
<div class="col-12">
    <div class="card mb-3">
        <div class="card-body">
            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                <span class="badge bg-dark dark__bg-dark">Loading</span>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="origin_location">Loading Location</label>
                        <select wire:model='origin_id' wire:change='changeOrigin($event.target.value)' class="form-select">
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
<div class="col-12">
    <div class="card mb-3">
        <div class="card-body">
            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                <span class="badge bg-dark dark__bg-dark">Unloading</span>
            </div>
            <div class="row g-2">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="destination_id">Unloading Location</label>
                        <select wire:change='changeDestination($event.target.value)' wire:model='destination_id' class="form-select">
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

<div>
    @include('partial.alert-banner')
    <form wire:submit.prevent='submit'>
        <div class="tab-pane {{ ($form_page == "page-1" ? "active" : "") }} px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab1" id="bootstrap-wizard-validation-tab1">
            <div class="row g-2">

                @if ($quote_type != "ltl")
                <div class="col-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                <span class="badge bg-dark dark__bg-dark">Trade</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="tradetype">Type of Trading</label>
                                <select wire:change='changeTradeType' wire:model='trade_type' class="form-select" aria-label="Type of Trading" id="trade_type" required="required" id="tradetype">
                                    <option value="">- Choose -</option>
                                    @foreach ($list_trade_type as $k => $v)
                                    <option wire:key='{{ $k }}' value="{{ $k }}">{{ $v }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if ($quote_type == "ftl")
                    @if ($trade_type != "DOM")
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Draft Number</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="npe_number">
                                        @if ($trade_type == "EX")
                                        NPE Number
                                        @else
                                        SPPB Number
                                        @endif
                                    </label>
                                    <input wire:model='npe_number' class="form-control" id="npe_number" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @else
                <div class="{{ $quote_type == "ltl" ? "col-6" : "col-4"}}">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div
                                style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                <span class="badge bg-dark dark__bg-dark">Shipment</span>
                            </div>
                            <div class="row g-2">

                                {{-- this section not showing on ltl, ccl --}}
                                @if (!in_array($quote_type,["ltl", "ccl"]))
                                    @if (in_array($trade_type, ["IM", "EX"]))
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="incoterms">Incoterms</label>
                                            <select wire:model='incoterm' class="form-select" required="required" id="incoterms">
                                                @foreach ($list_incoterm as $incoterm)
                                                <option value="{{ $incoterm }}">{{ $incoterm ? $incoterm : "- Choose -" }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                @endif

                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="shipmenttype">{{ $quote_type != "ccl" ? "Type of Shipment" : "Mode of Transportation" }}</label>
                                        <select @if (in_array("shipment_type", $_select_lock)) {{ "disabled" }} @endif wire:model='shipment_type' class="form-select" aria-label="Type of Shipment" id="shipmenttype">
                                        @if ($quote_type == "ccl")
                                        <option value="AIR" selected>AIR</option>
                                        <option value="SEA">SEA</option>
                                        @else
                                        <option value="DTD" selected>Door to Door</option>
                                        <option value="DTP">Door to Port</option>
                                        <option value="PTD">Port to Door</option>
                                        <option value="PTP">Port to Port</option>
                                        @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- this section not showing on ltl, ccl --}}
                @if (!in_array($quote_type,["ltl", "ccl"]))
                <div class="col-5">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                <span class="badge bg-dark dark__bg-dark">Date & Time</span>
                            </div>
                            <div class="row g-2">

                                @if ($trade_type == "DOM" && in_array($shipment_type, ["DTD", "DTP"]))
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="pickup_date">Pickup Date</label>
                                        <input wire:model='date_pickup' {{ ($is_pickup != 1 ? "disabled" : "required") }} class="form-control datetimepicker" id="pickup_date" type="text" placeholder="d/m/y H:i"/>
                                    </div>
                                </div>
                                @endif

                                @if (in_array($trade_type, ["EX", "IM"]) || ($trade_type == "DOM" && in_array($shipment_type, ["PTD", "DTP", "PTP"])))
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="shipment_date">Est Shipment Date</label>
                                        <input wire:model='date_est_shipment' wire:ignore class="form-control datepicker" required="required" id="shipment_date" type="text" placeholder="d/m/y" />
                                    </div>
                                </div>
                                @endif

                                @if ($trade_type == "DOM" && in_array($shipment_type, ["DTD", "PTD"]))
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="unloading_date">Unloading Date</label>
                                        <input wire:model='date_unloading' {{ ($is_delivery != 1 ? "disabled" : "required") }} class="form-control datetimepicker" id="unloading_date" type="text" placeholder="d/m/y H:i" />
                                    </div>
                                </div>
                                @endif

                                <div class="form-text fs--1 text-warning"><small>*this data required to know if the cargo need temporary storage or not</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @endif
            </div>

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
            @elseif($quote_type != "ccl")
                <div class="row g-2">
                    @if (in_array($shipment_type, ['DTD', 'DTP']))
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Origin</span>
                                </div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="origin_id_d">Origin Location</label>
                                            <select id="origin_id_d" wire:model='origin_id' wire:change='changeOrigin($event.target.value)' class="form-select select2 origin d">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (in_array($shipment_type, ['PTP', 'PTD']))
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Origin</span>
                                </div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="originport_id_p">Origin Location</label>
                                            <select id="originport_id_p" wire:model='originport_id' wire:change='changeOrigin($event.target.value, "P")' class="form-select select2 origin p">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (in_array($shipment_type, ['DTD', 'PTD']))
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Destination</span>
                                </div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="destination_id_d">Destination Location</label>
                                            <select id="destination_id_d" wire:change='changeDestination($event.target.value)' wire:model='destination_id' class="form-select select2 destination d">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (in_array($shipment_type, ['PTP', 'DTP']))
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Destination</span>
                                </div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="destiport_id_p">Destination Location</label>
                                            <select id="destiport_id_p" wire:change='changeDestination($event.target.value, "P")' wire:model='destiport_id' class="form-select select2 destination p">
                                                <option value="">Select</option>
                                                @foreach ($dest_ports as $port)
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
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            @endif

            {{-- this section not showing on ccl --}}
            @if (!in_array($quote_type, ["ccl"]))
                @if (!in_array($trade_type, ["DOM", ""]))
                <div class="row g-2">

                    @if (!in_array($trade_type, ["ftl", ""]))
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row g-2">
                                    @if ($quote_type == "ltl")
                                    <div class="col-6">
                                        <div class="form-check form-switch">
                                            <input wire:model='is_lolo_charge' class="form-check-input" id="is_lolo_charge" type="checkbox"/>
                                            <label class="form-check-label" for="is_lolo_charge">Loading/Unloading Charge&nbsp;<small>(Optional)</small></label>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-6">
                                        <div class="form-check form-switch">
                                            <input wire:model='is_custom_clearance' class="form-check-input" id="is_custom_clearance" type="checkbox" checked="" />

                                            @if ($trade_type == "EX")
                                            <label class="form-check-label" for="is_custom_clearance">Handling PEB & NPE</label>
                                            @elseif ($trade_type == "IM")
                                            <label class="form-check-label" for="is_custom_clearance">Handling PIB</label>
                                            @else
                                            <label class="form-check-label" for="is_custom_clearance">Include Custom Clearance</label>
                                            @endif
                                        </div>
                                    </div>
                                    @if (!in_array($trade_type, ["IM"]))
                                    <div class="col-6">
                                        <div class="form-check form-switch">
                                            <input wire:model='is_request_cert_origin' class="form-check-input" id="is_request_cert_origin" type="checkbox" checked="" />
                                            <label class="form-check-label" for="is_request_cert_origin">Request Certificate of Origin</label>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (!in_array($quote_type, ['ftl', 'ltl']))
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row g-2">
                                    @if ($trade_type == "EX")
                                    <div class="col-6">
                                        <div class="form-check form-switch">
                                            <input wire:model='is_pickup' class="form-check-input" id="is_pickup" type="checkbox"/>
                                            <label class="form-check-label" for="is_pickup">Include Pickup Service</label>
                                        </div>
                                    </div>
                                    @elseif($trade_type == "IM")
                                    <div class="col-6">
                                        <div class="form-check form-switch">
                                            <input wire:model='is_delivery' class="form-check-input" id="is_delivery" type="checkbox"/>
                                            <label class="form-check-label" for="is_delivery">Include Delivery Service</label>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endif

                @if ($is_pickup == 1)
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
                                                @foreach ($picupLocation as $origin)
                                                <option wire:key='origin:{{ $origin->id }}' value="{{ $origin->id }}">{{ $origin->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if (in_array($trade_type, ["EX", "DOM"]))
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="pickup_date">Pickup Date</label>
                                            <input wire:model='date_pickup' {{ ($is_pickup != 1 ? "disabled" : "required") }} class="form-control datetimepicker" id="pickup_date" type="text" placeholder="d/m/y H:i"/>
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
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="fleet_category">Fleet Category</label>
                                            <select id="fleet_category" wire:model='fleet_category' class="form-select">
                                                <option value="">Select</option>
                                                @foreach (config("fleet_categories") as $i => $item)
                                                <option wire:key='fleet_category:{{ $i }}' value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="fleet_type">Fleet Type</label>
                                            <select id="fleet_type" wire:model='fleet_type' class="form-select">
                                                <option value="">Select</option>
                                                @foreach (config("fleet_types") as $i => $item)
                                                <option wire:key='fleet_type:{{ $i }}' value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if ($is_delivery == 1)
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
                                            <input wire:model='date_unloading' {{ ($is_delivery != 1 ? "disabled" : "required") }} class="form-control datetimepicker" id="unloading_date" type="text" placeholder="d/m/y H:i" />
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
            @endif
        </div>

        <div class="card-footer bg-light">
            @if ($edit_mode != 2)
            <div class="px-sm-3 px-md-5">
                <ul class="pager wizard list-inline mb-0">
                    <li class="previous"></li>
                    <li class="next">
                        <button class="btn btn-primary px-5 px-sm-6" type="submit">
                            Next <span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"></span>
                        </button>
                    </li>
                </ul>
            </div>
            @endif
        </div>

        <div wire:loading.delay.longer><div id="cover-spin"></div></div>
    </form>
</div>

@if($edit_mode == 2)
@push('script')
<script>
document.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        $("input, select").prop("disabled", true);
    }, 60);
});
</script>
@endpush
@endif