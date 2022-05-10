<div>
    <div class="card theme-wizard h-100 mb-5">
        <div class="card-header bg-light pt-3 pb-2">
            <ul class="nav justify-content-between nav-wizard">
                <li class="nav-item">
                    <a wire:click='setFormPage("page:1")' class="nav-link {{ ($form_page == "page:1" ? "active" : "") }} fw-semi-bold" href="#bootstrap-wizard-validation-tab1" data-bs-toggle="tab"  data-wizard-step="data-wizard-step">
                        <span class="nav-item-circle-parent">
                            <span class="nav-item-circle">
                                <span class="fas fa-ship"></span>
                            </span>
                        </span>
                        <span class="d-none d-md-block mt-1 fs--1">Type of Shipment</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:click='setFormPage("page:2")' class="nav-link {{ ($form_page == "page:2" ? "active" : "") }} fw-semi-bold" href="#bootstrap-wizard-validation-tab2" data-bs-toggle="tab" data-wizard-step="data-wizard-step">
                        <span class="nav-item-circle-parent">
                            <span class="nav-item-circle">
                                <span class="fas fa-object-group"></span>
                            </span>
                        </span>
                        <span class="d-none d-md-block mt-1 fs--1">Detail</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:click='setFormPage("page:3")' class="nav-link {{ ($form_page == "page:3" ? "active" : "") }} fw-semi-bold" href="#bootstrap-wizard-validation-tab4" data-bs-toggle="tab" data-wizard-step="data-wizard-step">
                        <span class="nav-item-circle-parent">
                            <span class="nav-item-circle">
                                <span class="far fa-file-alt"></span>
                            </span>
                        </span>
                        <span class="d-none d-md-block mt-1 fs--1">Document</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:click='setFormPage("page:4")' class="nav-link {{ ($form_page == "page:4" ? "active" : "") }} fw-semi-bold" href="#bootstrap-wizard-validation-tab5" data-bs-toggle="tab" data-wizard-step="data-wizard-step">
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
                <div class="tab-pane {{ ($form_page == "page:1" ? "active" : "") }} px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab1" id="bootstrap-wizard-validation-tab1">
                    <div class="row g-2">
                        <div class="col-3">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                        <span class="badge bg-dark dark__bg-dark">Trade</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="tradetype">Type of Trading</label>
                                        <select wire:model='trade_type' class="form-select" aria-label="Type of Trading" id="trade_type" required="required" id="tradetype">
                                        @foreach ($list_trade_type as $k => $v)
                                        <option wire:key='{{ $k }}' value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div
                                        style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                        <span class="badge bg-dark dark__bg-dark">Shipment</span>
                                    </div>
                                    <div class="row g-2">

                                        @if (in_array($trade_type, ["IM", "EX"]))
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="incoterms">Incoterms</label>
                                                <select wire:model='incoterm' class="form-select" required="required" id="incoterms">
                                                @foreach ($list_incoterm as $incoterm)
                                                <option value="{{ $incoterm }}">{{ $incoterm }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="col-8">
                                            <div class="mb-3">
                                                <label class="form-label" for="shipmenttype">Type of Shipment</label>
                                                <select wire:model='shipment_type' class="form-select" aria-label="Type of Shipment" required="required" id="shipmenttype">
                                                    <option value="DTD" selected>Door to Door</option>
                                                    <option value="DTP">Door to Port</option>
                                                    <option value="PTD">Port to Door</option>
                                                    <option value="PTP">Port to Port</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                        <span class="badge bg-dark dark__bg-dark">Date & Time</span>
                                    </div>
                                    <div class="row g-2">
                                        @if (in_array($trade_type, ["EX", "DOM"]))
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="pickup_date">Pickup Date</label>
                                                <input wire:model='date_pickup' wire:ignore class="form-control datetimepicker" required="required" id="pickup_date" type="text" placeholder="d/m/y H:i" data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
                                            </div>
                                        </div>
                                        @endif

                                        @if (in_array($trade_type, ["EX", "IM", "FO"]))
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="shipment_date">Est Shipment Date</label>
                                                <input wire:model='date_est_shipment' wire:ignore class="form-control datetimepicker" required="required" id="shipment_date" type="text" placeholder="d/m/y H:i" data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
                                            </div>
                                        </div>
                                        @endif

                                        @if (in_array($trade_type, ["IM", "DOM"])) 
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="unloading_date">Unloading Date</label>
                                                <input wire:model='date_unloading' wire:ignore class="form-control datetimepicker" required="required" id="unloading_date" type="text" placeholder="d/m/y H:i" data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                        <span class="badge bg-dark dark__bg-dark">Origin</span>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-12">
                                            <div class="mb-3" wire:ignore>
                                                <label for="origin_location">Origin Location</label>
                                                <select wire:model='origin_id' wire:change='changeOrigin($event.target.value)' class="form-select js-choice" id="origin_location" size="1" name="origin_location" data-options='{"removeItemButton":true,"placeholder":true}'>
                                                    <option value="">Select</option>
                                                @foreach ($origins as $origin)
                                                    <option wire:key='origin:{{ $origin->id }}' value="{{ $origin->id }}">{{ $origin->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="origin">Origin Country</label>
                                                <input wire:model='origin_country' class="form-control" type="text" placeholder="Country" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="origin">Origin City</label>
                                                <input wire:model='origin_city' class="form-control" type="text" placeholder="City" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="address">Address</label>
                                                <textarea wire:model='origin_address' readonly class="form-control" id="address" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div style="width: 100%; height: 24px; margin-bottom: 5px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                        <span class="badge bg-dark dark__bg-dark">Destination</span>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-12">
                                            <div class="mb-3" wire:ignore>
                                                <label for="destination_id">Destination Location</label>
                                                <select wire:change='changeDestination($event.target.value)' wire:model='destination_id' class="form-select js-choice" id="destination_id" size="1" name="origin_location" data-options='{"removeItemButton":true,"placeholder":true}'>
                                                    <option value="">Select</option>
                                                @foreach ($destinations as $destination)
                                                    <option wire:key='dest:{{ $destination->id }}' value="{{ $destination->id }}">{{ $destination->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="destination">Destination Country</label>
                                                <input wire:model='destination_country' class="form-control" type="text" placeholder="Country" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="destination">Destination City</label>
                                                <input wire:model='destination_city' class="form-control" type="text" placeholder="City" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label id="destination_address" class="form-label" for="address2">Address / Sea Port</label>
                                                <textarea wire:model='destination_address' readonly class="form-control" id="destination_address" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" id="chkCustomClearance" type="checkbox" checked="" />
                                                <label wire:model='is_custom_clearance' class="form-check-label" for="chkCustomClearance">Include Custom Clearance</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" id="chkRequuestCertificateofOrigin" type="checkbox" checked="" />
                                                <label wire:model='is_request_cert_origin' class="form-check-label" for="chkCustomRequestCertificateofOrigin">Request Certificate of Origin</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane {{ ($form_page == "page:2" ? "active" : "") }} px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab2" id="bootstrap-wizard-validation-tab2">
                    <div id="form_details">
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div
                                            style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                            <span class="badge bg-dark dark__bg-dark">Container</span>
                                        </div>

                                        <div id="root_party">
                                            <div class="row g-2" id="party">
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="size-container">Size Container</label>
                                                        <select wire:model='size' class="form-select" aria-label="Size Container" required="required" id="size-container" data-wizard-validate-password="true">
                                                        @foreach ($size_containers as $item)
                                                            <option value="{{ $item->id }}">{{ $item->display }}</option>                                                        
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="type-container">Type Container</label>
                                                        <select wire:model='type' class="form-select" aria-label="Type Container" required="required" id="type-container" data-wizard-validate-password="true">
                                                        @foreach ($type_containers as $item)
                                                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="bootstrap-wizard-validation-wizard-totalcontainer">Total Container</label>
                                                        <input wire:model='qty' class="form-control" type="number" min="0" name="totalcontainer" placeholder="Total Container" id="bootstrap-wizard-validation-wizard-totalcontainer" />
                                                    </div>
                                                </div>
                                                <div class="col-12 text-right fms-hide" id="area_rem_multiple_container">
                                                    <button type="button" id="rem_multiple_container" class="btn btn-sm btn-danger">Remove Container</button>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-left">
                                            <button type="button" id="add_multiple_container" class="btn btn-sm btn-primary">Add Multiple Container</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div
                                            style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                            <span class="badge bg-dark dark__bg-dark">Insurance</span>
                                        </div>
                                        <div class="row g-2">
                                            <label
                                                class="form-label">Insurance&nbsp;<small>(Optional)</small></label>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <select wire:model='insurance_cur' class="form-select" id="insurance"  data-options='{"placeholder":true}'>
                                                        <option value="">- Choose -</option>
                                                        <option value="IDR">IDR</option>
                                                        <option value="USD">USD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="mb-3">
                                                    <input wire:model='insurance_amount' id="amount" class="form-control" type="text" placeholder="Value" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="form_area">
                            <div class="row g-2">
                                <div class="col-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                                <span class="badge bg-dark dark__bg-dark">Cargo</span>
                                            </div>

                                            <div class="col-10">
                                                <div class="mb-3" wire:ignore>
                                                    <label for="cargo-description">Cargo Description</label>&nbsp;
                                                    <span>
                                                        <button type="button" id="add_master_cargo" class="btn btn-sm btn-falcon-primary">+ Data Master</button>
                                                    </span>
                                                    <select wire:model='cargo_id' wire:change='changeCargo($event.target.value)' class="form-select js-choice" id="cargo-description" size="1" name="cargo-description" data-options='{"removeItemButton":true,"placeholder":true}'>
                                                        <option value="">Select</option>
                                                        @foreach ($cargos as $cargo)
                                                        <option value="{{ $cargo->id }}">{{ $cargo->description }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-10">
                                                <div class="mb-3">
                                                    <label class="form-label" for="bootstrap-wizard-validation-wizard-totalcontainer">Type of Cargo</label>
                                                    <input class="form-control" type="number" min="0" name="totalcontainer" placeholder="Total Container" id="bootstrap-wizard-validation-wizard-totalcontainer" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="card mb-3" id="card_measurement">
                                        <div class="card-body">
                                            <div
                                                style="width: 100%; height: 24px; margin-bottom: 10px; border-bottom: 2px solid gray; text-align: left">
                                                <span class="badge bg-dark dark__bg-dark">Measurement</span>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="unit-length">Unit Length</label>&nbsp;<span class="badge rounded-pill bg-secondary">CM</span>
                                                        <input wire:model='cargo_length' class="form-control" type="number" min="0" name="unitlength" placeholder="Unit Length" id="unit-length" />
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="unit-height">Unit Height</label>&nbsp;
                                                        <span class="badge rounded-pill bg-secondary">CM</span>
                                                        <input wire:model='cargo_height' class="form-control" type="number" min="0" name="unitheight" placeholder="Unit Height" id="unit-height" />
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="unit-depth">Unit Depth</label>&nbsp;
                                                        <span class="badge rounded-pill bg-secondary">CM</span>
                                                        <input wire:model='cargo_depth' class="form-control" type="number" min="0" name="unitdepth" placeholder="Unit Depth" id="unit-depth" />
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="unit-weight">Unit Weight</label>&nbsp;
                                                        <span class="badge rounded-pill bg-secondary">KG</span>
                                                        <input wire:key='cargo_weight' wire:model='cargo_weight' class="form-control" type="number" min="0" name="unitweight" placeholder="Unit Weight" id="unit-weight" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-2">
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="total-unit">Total Unit</label>&nbsp;<span
                                                            class="badge rounded-pill bg-secondary">Units</span>
                                                        <input wire:model='cargo_total_unit' class="form-control" type="number" min="0"
                                                            name="totalunit" placeholder="Total Unit"
                                                            id="total-unit" />
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input wire:model='is_volume' class="form-check-input" id="chk_volume_only"
                                                            type="checkbox" />
                                                        <label class="form-check-label" for="chk_volume_only">Enter
                                                            Volume Only</label>
                                                    </div>

                                                </div>

                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="total-volume">Total Volume</label>&nbsp; <span
                                                            class="badge rounded-pill bg-secondary">M3</span>
                                                        <input wire:model="cargo_volume" disabled class="form-control" type="number"
                                                            min="0" name="totalvolume" placeholder="Total Volume"
                                                            id="total-volume" />
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="total-weight">Total Weight</label>&nbsp;
                                                        <span class="badge rounded-pill bg-secondary">MT</span>
                                                        <input wire:model="cargo_total_weight" disabled class="form-control" type="number"
                                                            min="0" name="totalweight" placeholder="Total Weight"
                                                            id="total-weight" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 text-right" id="area_rem_cargo">
                                    <button wire:click='decCargoLength' type="button" id="rem_cargo" class="btn btn-sm btn-danger">Remove Cargo</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button wire:click='incCargoLength' type="button" id="add_cargo" class="btn btn-sm btn-primary">Add More Cargo</button>
                    </div>
                </div>

                <div class="tab-pane {{ ($form_page == "page:3" ? "active" : "") }} px-sm-3 px-md-5" role="tabpanel"
                    aria-labelledby="bootstrap-wizard-validation-tab4" id="bootstrap-wizard-validation-tab4">
                    <form class="form-validation">
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="upload-invoice">Invoice</label>
                                    <div id="upload-invoice" class="dropzone dropzone-single p-0"
                                        data-dropzone="data-dropzone"
                                        data-options='{"url":"valid/url","maxFiles":1,"dictDefaultMessage":"Choose or Drop a file here"}'>
                                        <div class="fallback">
                                            <input type="file" name="file" />
                                        </div>
                                        <div class="dz-preview dz-preview-single">
                                            <div class="dz-preview-cover dz-complete"><img class="dz-preview-img"
                                                    src="{{ asset('falcon/assets/img/generic/image-file-2.png') }}"
                                                    alt="..." data-dz-thumbnail="" /><a
                                                    class="dz-remove text-danger" href="#!"
                                                    data-dz-remove="data-dz-remove"><span
                                                        class="fas fa-times"></span></a>
                                                <div class="dz-progress"><span class="dz-upload"
                                                        data-dz-uploadprogress=""></span></div>
                                                <div class="dz-errormessage m-1"><span
                                                        data-dz-errormessage="data-dz-errormessage"></span>
                                                </div>
                                            </div>
                                            <div class="dz-progress"><span class="dz-upload"
                                                    data-dz-uploadprogress=""></span></div>
                                        </div>
                                        <div class="dz-message" data-dz-message="data-dz-message">
                                            <div class="dz-message-text">
                                                <img class="me-2"
                                                    src="{{ asset('falcon/assets/img/icons/cloud-upload.svg') }}"
                                                    width="25" alt="" />Drop your file here
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="upload-packing-list">Packing List</label>
                                    <div id="upload-packing-list" class="dropzone dropzone-single p-0"
                                        data-dropzone="data-dropzone"
                                        data-options='{"url":"valid/url","maxFiles":1,"dictDefaultMessage":"Choose or Drop a file here"}'>
                                        <div class="fallback">
                                            <input type="file" name="file" />
                                        </div>
                                        <div class="dz-preview dz-preview-single">
                                            <div class="dz-preview-cover dz-complete"><img class="dz-preview-img"
                                                    src="{{ asset('falcon/assets/img/generic/image-file-2.png') }}"
                                                    alt="..." data-dz-thumbnail="" /><a
                                                    class="dz-remove text-danger" href="#!"
                                                    data-dz-remove="data-dz-remove"><span
                                                        class="fas fa-times"></span></a>
                                                <div class="dz-progress"><span class="dz-upload"
                                                        data-dz-uploadprogress=""></span></div>
                                                <div class="dz-errormessage m-1"><span
                                                        data-dz-errormessage="data-dz-errormessage"></span>
                                                </div>
                                            </div>
                                            <div class="dz-progress"><span class="dz-upload"
                                                    data-dz-uploadprogress=""></span></div>
                                        </div>
                                        <div class="dz-message" data-dz-message="data-dz-message">
                                            <div class="dz-message-text">
                                                <img class="me-2"
                                                    src="{{ asset("falcon/assets/img/icons/cloud-upload.svg") }}" width="25"
                                                    alt="" />Drop your file here</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="upload-certificate-origin">Certificate of
                                        Origin</label>
                                    <div id="upload-certificate-origin" class="dropzone dropzone-single p-0"
                                        data-dropzone="data-dropzone"
                                        data-options='{"url":"valid/url","maxFiles":1,"dictDefaultMessage":"Choose or Drop a file here"}'>
                                        <div class="fallback">
                                            <input type="file" name="file" />
                                        </div>
                                        <div class="dz-preview dz-preview-single">
                                            <div class="dz-preview-cover dz-complete"><img class="dz-preview-img"
                                                    src="{{ asset('falcon/assets/img/generic/image-file-2.png') }}"
                                                    alt="..." data-dz-thumbnail="" /><a
                                                    class="dz-remove text-danger" href="#!"
                                                    data-dz-remove="data-dz-remove"><span
                                                        class="fas fa-times"></span></a>
                                                <div class="dz-progress"><span class="dz-upload"
                                                        data-dz-uploadprogress=""></span></div>
                                                <div class="dz-errormessage m-1"><span
                                                        data-dz-errormessage="data-dz-errormessage"></span>
                                                </div>
                                            </div>
                                            <div class="dz-progress"><span class="dz-upload"
                                                    data-dz-uploadprogress=""></span></div>
                                        </div>
                                        <div class="dz-message" data-dz-message="data-dz-message">
                                            <div class="dz-message-text">
                                                <img class="me-2"
                                                    src="{{ asset("falcon/assets/img/icons/cloud-upload.svg") }}" width="25"
                                                    alt="" />Drop your file here</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="upload-bl">Bill of Lading</label>
                                    <div id="upload-bl" class="dropzone dropzone-single p-0"
                                        data-dropzone="data-dropzone"
                                        data-options='{"url":"valid/url","maxFiles":1,"dictDefaultMessage":"Choose or Drop a file here"}'>
                                        <div class="fallback">
                                            <input type="file" name="file" />
                                        </div>
                                        <div class="dz-preview dz-preview-single">
                                            <div class="dz-preview-cover dz-complete"><img class="dz-preview-img"
                                                    src="{{ asset('falcon/assets/img/generic/image-file-2.png') }}"
                                                    alt="..." data-dz-thumbnail="" /><a
                                                    class="dz-remove text-danger" href="#!"
                                                    data-dz-remove="data-dz-remove"><span
                                                        class="fas fa-times"></span></a>
                                                <div class="dz-progress"><span class="dz-upload"
                                                        data-dz-uploadprogress=""></span></div>
                                                <div class="dz-errormessage m-1"><span
                                                        data-dz-errormessage="data-dz-errormessage"></span>
                                                </div>
                                            </div>
                                            <div class="dz-progress"><span class="dz-upload"
                                                    data-dz-uploadprogress=""></span></div>
                                        </div>
                                        <div class="dz-message" data-dz-message="data-dz-message">
                                            <div class="dz-message-text">
                                                <img class="me-2"
                                                    src="{{ asset("falcon/assets/img/icons/cloud-upload.svg") }}" width="25"
                                                    alt="" />Drop your file here</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label" for="upload-other-documents">Other
                                        Documents</label>
                                    <div id="upload-other-documents" class="dropzone dropzone-single p-0"
                                        data-dropzone="data-dropzone"
                                        data-options='{"url":"valid/url","maxFiles":1,"dictDefaultMessage":"Choose or Drop a file here"}'>
                                        <div class="fallback">
                                            <input type="file" name="file" />
                                        </div>
                                        <div class="dz-preview dz-preview-single">
                                            <div class="dz-preview-cover dz-complete"><img class="dz-preview-img"
                                                    src="{{ asset('falcon/assets/img/generic/image-file-2.png') }}"
                                                    alt="..." data-dz-thumbnail="" /><a
                                                    class="dz-remove text-danger" href="#!"
                                                    data-dz-remove="data-dz-remove"><span
                                                        class="fas fa-times"></span></a>
                                                <div class="dz-progress"><span class="dz-upload"
                                                        data-dz-uploadprogress=""></span></div>
                                                <div class="dz-errormessage m-1"><span
                                                        data-dz-errormessage="data-dz-errormessage"></span>
                                                </div>
                                            </div>
                                            <div class="dz-progress"><span class="dz-upload"
                                                    data-dz-uploadprogress=""></span></div>
                                        </div>
                                        <div class="dz-message" data-dz-message="data-dz-message">
                                            <div class="dz-message-text">
                                                <img class="me-2"
                                                    src="{{ asset("falcon/assets/img/icons/cloud-upload.svg") }}" width="25"
                                                    alt="" />Drop your file here</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane {{ ($form_page == "page:4" ? "active" : "") }} text-left px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab5" id="bootstrap-wizard-validation-tab5">
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="row align-items-left">
                                <div class="col">
                                    <h5 class="mb-0">Your data is all set! Please check again before
                                        submit</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body bg-light border-top">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Shipment -->
                                    <div class="card mb-3">
                                        <div class="card-body position-relative">
                                            <h6 class="fw-semi-bold ls mb-3 text-uppercase">Type of Shipment</h6>
                                            <div id="tableExample"
                                                data-list='{"valueNames":["tradetype","customclearance","incoterms","shipmenttype","pickupdate","unloadingdate","estshipmentdate","insurance"],"page":5,"pagination":true}'>
                                                <div class="table-responsive scrollbar">
                                                    <table class="table table-bordered table-striped fs--1 mb-0">
                                                        <thead class="bg-400 text-900">
                                                            <tr>
                                                                <th class="sort" data-sort="tradetype">
                                                                    Type of Trade</th>
                                                                <th class="sort" data-sort="incoterms">
                                                                    Incoterms</th>
                                                                <th class="sort"
                                                                    data-sort="shipmenttype">Type of Shipment</th>
                                                                <th class="sort" data-sort="pickupdate">
                                                                    Pickup Date</th>
                                                                <th class="sort"
                                                                    data-sort="unloadingdate">Unloading Date</th>
                                                                <th class="sort"
                                                                    data-sort="estshipmentdate">Est Shipment Date
                                                                </th>
                                                                <th class="sort"
                                                                    data-sort="customclearance">Custom Clearance
                                                                </th>
                                                                <th class="sort" data-sort="reqcoo">
                                                                    Request Certificate of Origin</th>
                                                                <th class="sort" data-sort="insurance">
                                                                    Insurance</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="list">
                                                            <tr>
                                                                <td class="tradetype">Export</td>
                                                                <td class="incoterms">FOB</td>
                                                                <td class="shipmenttype">Door to Door</td>
                                                                <td class="pickupdate">01/01/2022 08:00</td>
                                                                <td class="unloadingdate">01/01/2022 08:00</td>
                                                                <td class="estshipmentdate">01/01/2022 08:00</td>
                                                                <td class="customclearance">Included</td>
                                                                <td class="reqcoo">Included</td>
                                                                <td class="insurance">IDR 500.000</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Origin - Destination -->
                                    <hr>
                                    <div class="card mb-3">
                                        <div class="card-body position-relative">
                                            <h6 class="fw-semi-bold ls mb-3 text-uppercase">Origin - Destination
                                            </h6>
                                            <div id="tableExample"
                                                data-list='{"valueNames":["origincountry","origincity","destinationcountry","destinationcity"],"page":5,"pagination":true}'>
                                                <div class="table-responsive scrollbar">
                                                    <table class="table table-bordered table-striped fs--1 mb-0">
                                                        <thead class="bg-400 text-900">
                                                            <tr>
                                                                <th class="sort"
                                                                    data-sort="origincountry">Origin Country</th>
                                                                <th class="sort" data-sort="origincity">
                                                                    Origin City</th>
                                                                <th class="sort"
                                                                    data-sort="originaddress">Origin Address</th>
                                                                <th class="sort"
                                                                    data-sort="destinationcountry">Destination
                                                                    Country</th>
                                                                <th class="sort"
                                                                    data-sort="destinationcity">Destination City
                                                                </th>
                                                                <th class="sort"
                                                                    data-sort="destinationaddress">Destination
                                                                    Address/Sea Port</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="list">
                                                            <tr>
                                                                <td class="origincountry">Indonesia</td>
                                                                <td class="origincity">Jakarta</td>
                                                                <td class="originaddress">Marunda</td>
                                                                <td class="destinationcountry">Thailand</td>
                                                                <td class="destinationcity">Bangkok</td>
                                                                <td class="destinationaddress">Hanoi</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Container -->
                                    <hr>
                                    <div class="card mb-3">
                                        <div class="card-body position-relative">
                                            <h6 class="fw-semi-bold ls mb-3 text-uppercase">List Container</h6>
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-left">
                                                    Detail of your Container<button
                                                        class="btn btn-falcon-primary btn-sm" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-container">Open List
                                                        Container</button></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Cargo -->
                                    <hr>
                                    <div class="card mb-3">
                                        <div class="card-body position-relative">
                                            <h6 class="fw-semi-bold ls mb-3 text-uppercase">List Cargo</h6>
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-left">
                                                    Detail of your Cargo<button
                                                        class="btn btn-falcon-primary btn-sm" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#modal-cargo">Open
                                                        List Cargo</button></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Documents -->
                                    <hr>
                                    <div class="card mb-3">
                                        <div class="card-body position-relative">
                                            <h6 class="fw-semi-bold ls mb-3 text-uppercase">List Documents</h6>
                                            <ul class="list-group">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-left">
                                                    Attachment of your Documents<button
                                                        class="btn btn-falcon-primary btn-sm" type="button"
                                                        data-bs-toggle="modal" data-bs-target="#modal-document">Open
                                                        Attachment</button></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-container" data-bs-keyboard="false"
                                        data-bs-backdrop="static" tabindex="-1" aria-labelledby="modal-container"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg mt-6" role="document">
                                            <div class="modal-content border-0">
                                                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                                    <button
                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                        <h5 class="mb-1" id="modal-cargo-label">Detail
                                                            Container</h5>
                                                    </div>
                                                    <div class="p-4">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div id="tableExample"
                                                                    data-list='{"valueNames":["no","sizecontainer","typecontainer","totalcontainer"],"page":5,"pagination":true}'>
                                                                    <div class="table-responsive scrollbar">
                                                                        <table
                                                                            class="table table-bordered table-striped fs--1 mb-0">
                                                                            <thead class="bg-200 text-900">
                                                                                <tr>
                                                                                    <th class="sort"
                                                                                        data-sort="no">No</th>
                                                                                    <th class="sort"
                                                                                        data-sort="sizecontainer">
                                                                                        Size Container</th>
                                                                                    <th class="sort"
                                                                                        data-sort="typecontainer">
                                                                                        Type Container</th>
                                                                                    <th class="sort"
                                                                                        data-sort="totalcontainer">
                                                                                        Total Container</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="list">
                                                                                <tr>
                                                                                    <td class="no">1
                                                                                    </td>
                                                                                    <td class="sizecontainer">20
                                                                                    </td>
                                                                                    <td class="typecontainer">High
                                                                                        Cube</td>
                                                                                    <td class="totalcontainer">2
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="no">2
                                                                                    </td>
                                                                                    <td class="sizecontainer">40
                                                                                    </td>
                                                                                    <td class="typecontainer">
                                                                                        General Purpose</td>
                                                                                    <td class="totalcontainer">1
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-cargo" data-bs-keyboard="false"
                                        data-bs-backdrop="static" tabindex="-1" aria-labelledby="modal-cargo"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg mt-6" role="document">
                                            <div class="modal-content border-0">
                                                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                                    <button
                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                        <h5 class="mb-1" id="modal-cargo-label">Detail
                                                            Cargo</h5>
                                                    </div>
                                                    <div class="p-4">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div id="tableExample"
                                                                    data-list='{"valueNames":["no","cargoinformation","cargodescription","unitlength","unitheight","unitwidth","unitweight","totalunit","totalvolume","totalweight"],"page":5,"pagination":true}'>
                                                                    <div class="table-responsive scrollbar">
                                                                        <table
                                                                            class="table table-bordered table-striped fs--1 mb-0">
                                                                            <thead class="bg-200 text-900">
                                                                                <tr>
                                                                                    <th class="sort"
                                                                                        data-sort="no">No</th>
                                                                                    <th class="sort"
                                                                                        data-sort="cargoinformation">
                                                                                        Cargo Information</th>
                                                                                    <th class="sort"
                                                                                        data-sort="cargodescription">
                                                                                        Cargo Description</th>
                                                                                    <th class="sort"
                                                                                        data-sort="unitlength">Unit
                                                                                        Length (CM)</th>
                                                                                    <th class="sort"
                                                                                        data-sort="unitheight">Unit
                                                                                        Height (CM)</th>
                                                                                    <th class="sort"
                                                                                        data-sort="unitwidth">Unit
                                                                                        Width (CM)</th>
                                                                                    <th class="sort"
                                                                                        data-sort="unitweight">Unit
                                                                                        Weight (KG)</th>
                                                                                    <th class="sort"
                                                                                        data-sort="totalunit">Total
                                                                                        Unit (Units)</th>
                                                                                    <th class="sort"
                                                                                        data-sort="totalvolume">
                                                                                        Total Volume</th>
                                                                                    <th class="sort"
                                                                                        data-sort="totalweight">
                                                                                        Total Weight</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="list">
                                                                                <tr>
                                                                                    <td class="no">1
                                                                                    </td>
                                                                                    <td class="cargoinformation">
                                                                                        General</td>
                                                                                    <td class="cargodescription">
                                                                                        Keyboard</td>
                                                                                    <td class="unitlength">100
                                                                                    </td>
                                                                                    <td class="unitheight">200
                                                                                    </td>
                                                                                    <td class="unitwidth">300
                                                                                    </td>
                                                                                    <td class="unitweight">100
                                                                                    </td>
                                                                                    <td class="totalunit">10
                                                                                    </td>
                                                                                    <td class="totalvolume">
                                                                                        60000</td>
                                                                                    <td class="totalweight">1000
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="no">2
                                                                                    </td>
                                                                                    <td class="cargoinformation">
                                                                                        General</td>
                                                                                    <td class="cargodescription">
                                                                                        Mouse</td>
                                                                                    <td class="unitlength">100
                                                                                    </td>
                                                                                    <td class="unitheight">200
                                                                                    </td>
                                                                                    <td class="unitwidth">300
                                                                                    </td>
                                                                                    <td class="unitweight">100
                                                                                    </td>
                                                                                    <td class="totalunit">10
                                                                                    </td>
                                                                                    <td class="totalvolume">
                                                                                        60000</td>
                                                                                    <td class="totalweight">1000
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-document" data-bs-keyboard="false"
                                        data-bs-backdrop="static" tabindex="-1" aria-labelledby="modal-document"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg mt-6" role="document">
                                            <div class="modal-content border-0">
                                                <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                                    <button
                                                        class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body p-0">
                                                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                                        <h5 class="mb-1" id="modal-document-label">Detail
                                                            Document</h5>
                                                    </div>
                                                    <div class="p-4">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <ul class="nav nav-tabs" id="detail-document"
                                                                    role="tablist">
                                                                    <li class="nav-item"><a
                                                                            class="nav-link active"
                                                                            id="document-invoice-tab"
                                                                            data-bs-toggle="tab"
                                                                            href="#tab-document-invoice" role="tab"
                                                                            aria-controls="tab-document-invoice"
                                                                            aria-selected="true">Invoice</a></li>
                                                                    <li class="nav-item"><a
                                                                            class="nav-link"
                                                                            id="document-packinglist-tab"
                                                                            data-bs-toggle="tab"
                                                                            href="#tab-document-packinglist"
                                                                            role="tab"
                                                                            aria-controls="tab-document-packinglist"
                                                                            aria-selected="false">Packing List</a>
                                                                    </li>
                                                                    <li class="nav-item"><a
                                                                            class="nav-link"
                                                                            id="document-billoflading-tab"
                                                                            data-bs-toggle="tab"
                                                                            href="#tab-document-billoflading"
                                                                            role="tab"
                                                                            aria-controls="tab-document-billoflading"
                                                                            aria-selected="false">Bill of Lading</a>
                                                                    </li>
                                                                    <li class="nav-item"><a
                                                                            class="nav-link"
                                                                            id="document-certificateoforigin-tab"
                                                                            data-bs-toggle="tab"
                                                                            href="#tab-document-certificateoforigin"
                                                                            role="tab"
                                                                            aria-controls="tab-document-certificateoforigin"
                                                                            aria-selected="false">Certificate of
                                                                            Origin</a></li>
                                                                    <li class="nav-item"><a
                                                                            class="nav-link"
                                                                            id="document-otherdocuments-tab"
                                                                            data-bs-toggle="tab"
                                                                            href="#tab-document-otherdocuments"
                                                                            role="tab"
                                                                            aria-controls="tab-document-otherdocuments"
                                                                            aria-selected="false">Other
                                                                            Documents</a></li>
                                                                </ul>
                                                                <div class="tab-content border-x border-bottom p-3"
                                                                    id="detail-document">
                                                                    <div class="tab-pane fade show active"
                                                                        id="tab-document-invoice" role="tabpanel"
                                                                        aria-labelledby="document-invoice-tab"><img
                                                                            class="rounded-1 img-fluid"
                                                                            src="{{ asset('falcon/assets/img/detail-documents/document-1.png') }}"
                                                                            alt="" /></div>
                                                                    <div class="tab-pane fade"
                                                                        id="tab-document-packinglist"
                                                                        role="tabpanel"
                                                                        aria-labelledby="document-packinglist-tab">
                                                                        <img class="rounded-1 img-fluid"
                                                                            src="{{ asset('falcon/assets/img/detail-documents/document-2.png') }}"
                                                                            alt="" /></div>
                                                                    <div class="tab-pane fade"
                                                                        id="tab-document-billoflading"
                                                                        role="tabpanel"
                                                                        aria-labelledby="document-billoflading-tab">
                                                                        <img class="rounded-1 img-fluid"
                                                                            src="{{ asset('falcon/assets/img/detail-documents/document-3.png') }}"
                                                                            alt="" /></div>
                                                                    <div class="tab-pane fade"
                                                                        id="tab-document-certificateoforigin"
                                                                        role="tabpanel"
                                                                        aria-labelledby="document-certificateoforigin-tab">
                                                                        <img class="rounded-1 img-fluid"
                                                                            src="{{ asset('falcon/assets/img/detail-documents/document-4.png') }}"
                                                                            alt="" /></div>
                                                                    <div class="tab-pane fade"
                                                                        id="tab-document-otherdocuments"
                                                                        role="tabpanel"
                                                                        aria-labelledby="document-otherdocuments-tab">
                                                                        <img class="rounded-1 img-fluid"
                                                                            src="{{ asset('falcon/assets/img/detail-documents/document-5.png') }}"
                                                                            alt="" /></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light">
                <div class="px-sm-3 px-md-5">
                    <ul class="pager wizard list-inline mb-0">
                        <li class="previous"></li>
                        <li class="next">
                            <button class="btn btn-primary px-5 px-sm-6" type="submit">
                                Next
                                <span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"></span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
