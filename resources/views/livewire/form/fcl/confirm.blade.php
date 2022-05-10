<div>
    <div class="tab-pane {{ ($form_page == "page-4" ? "active" : "") }} text-left px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab5" id="bootstrap-wizard-validation-tab5">
        <div class="card mb-3">
            @if ($isComfirmable)
            <div class="card-header">
                <div class="row align-items-left">
                    <div class="col">
                        <h5 class="mb-0">Your data is all set! Please check again before submit</h5>
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
                                <div id="tableExample">
                                    <div class="table-responsive scrollbar">
                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="table" style="background-color: #1E367B">
                                                <tr style="color: white">
                                                    <th class="sort" data-sort="tradetype">Type of Trade</th>
                                                    <th class="sort" data-sort="incoterms">Incoterms</th>
                                                    <th class="sort" data-sort="shipmenttype">Type of Shipment</th>
                                                    <th class="sort" data-sort="pickupdate">Pickup Date</th>
                                                    <th class="sort" data-sort="unloadingdate">Unloading Date</th>
                                                    <th class="sort" data-sort="estshipmentdate">Est Shipment Date</th>
                                                    <th class="sort" data-sort="customclearance">Custom Clearance</th>
                                                    <th class="sort" data-sort="reqcoo">Request Certificate of Origin</th>
                                                    <th class="sort" data-sort="insurance">Insurance</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                <tr>
                                                    <td class="tradetype">{{ $fullContainerLoad->trade_type }}</td>
                                                    <td class="incoterms">{{ $fullContainerLoad->incoterm }}</td>
                                                    <td class="incoterms">{{ $fullContainerLoad->shipment_type }}</td>
                                                    <td class="incoterms">{{ $fullContainerLoad->date_pickup }}</td>
                                                    <td class="incoterms">{{ $fullContainerLoad->date_unloading }}</td>
                                                    <td class="incoterms">{{ $fullContainerLoad->date_est_shipment }}</td>
                                                    <td class="incoterms">{{ Convert::toYesNoString($fullContainerLoad->is_custom_clearance) }}</td>
                                                    <td class="incoterms">{{ Convert::toYesNoString($fullContainerLoad->is_request_cert_origin) }}</td>
                                                    <td class="incoterms">{{ $fullContainerLoad->insurance_cur }} {{ $fullContainerLoad->insurance_amount }}</td>
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
                                <div id="tableExample">
                                    <div class="table-responsive scrollbar">
                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="table" style="background-color: #1E367B">
                                                <tr style="color: white">
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
                                                <tr>
                                                    <td class="tradetype">{{ @$fullContainerLoad->origin->name }}</td>
                                                    <td class="incoterms">{{ @$fullContainerLoad->origin->city }}</td>
                                                    <td class="incoterms">{{ @$fullContainerLoad->origin->address }}</td>
                                                    <td class="incoterms">{{ @$fullContainerLoad->destination->name }}</td>
                                                    <td class="incoterms">{{ @$fullContainerLoad->destination->city }}</td>
                                                    <td class="incoterms">{{ @$fullContainerLoad->destination->address }}</td>
                                                </tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Container -->
                        @if (!$fullContainerLoad->containers->isEmpty())
                        <hr>
                        <div class="card mb-3">
                            <div class="card-body position-relative">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase">List Container</h6>
                                <div id="tableExample" data-list='{"valueNames":["no","sizecontainer","typecontainer","totalcontainer"],"page":5,"pagination":true}'>
                                    <div class="table-responsive scrollbar"> 
                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="table" style="background-color: #1E367B">
                                                <tr style="color: white">
                                                    <th class="sort" data-sort="no" style="width: 5%">No</th>
                                                    <th class="sort" data-sort="sizecontainer" style="width: 10%">Size Container</th>
                                                    <th class="sort" data-sort="typecontainer" style="width: 70%">Type Container</th>
                                                    <th class="sort" data-sort="totalcontainer">Total Container</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($fullContainerLoad->containers as $i => $item)
                                                <tr>
                                                    <td class="no">{{ ($i + 1) }}</td>
                                                    <td class="sizecontainer">{{ $item->size }}</td>
                                                    <td class="sizecontainer">{{ $item->type }}</td>
                                                    <td class="sizecontainer">{{ $item->qty }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Cargo -->
                        <hr>
                        <div class="card mb-3">
                            <div class="card-body position-relative">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase">List Cargo</h6>
                                <div id="tableExample" data-list='{"valueNames":["no","cargoinformation","cargodescription","unitlength","unitheight","unitwidth","unitweight","totalunit","totalvolume","totalweight"],"page":5,"pagination":true}'>
                                    <div class="table-responsive scrollbar"> 
                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="table" style="background-color: #1E367B">
                                                <tr style="color: white">
                                                    <th class="sort" data-sort="no">No</th>
                                                    <th class="sort" data-sort="cargoinformation">Cargo Information</th>
                                                    <th class="sort" data-sort="cargodescription">Cargo Description</th>
                                                    <th class="sort" data-sort="cargodescription">HS Code</th>
                                                    <th class="sort" data-sort="unitlength">Unit Length (CM)</th>
                                                    <th class="sort" data-sort="unitheight">Unit Height (CM)</th>
                                                    <th class="sort" data-sort="unitweight">Unit Weight (KG)</th>
                                                    <th class="sort" data-sort="totalunit">Total Unit (Units)</th>
                                                    <th class="sort" data-sort="totalvolume">Total Volume</th>
                                                    <th class="sort" data-sort="totalweight">Total Weight</th>
                                                    <th class="sort" data-sort="totalweight">MSDS</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @foreach ($fullContainerLoad->cargos as $i => $item)
                                                <tr>
                                                    <td class="no">{{ ($i + 1) }}</td>
                                                    <td class="cargoinformation">{{ $item->cargo_type }}</td>
                                                    <td class="cargodescription">{{ $item->cargo_description }}</td>
                                                    <td class="cargodescription">{{ $item->cargo_hs_code }}</td>
                                                    <td class="unitlength">{{ $item->cargo_length }}</td>
                                                    <td class="unitheight">{{ $item->cargo_height }}</td>
                                                    <td class="unitwidth">{{ $item->cargo_weight }}</td>
                                                    <td class="unitweight">{{ $item->cargo_total_unit }}</td>
                                                    <td class="totalunit">{{ $item->cargo_volume }}</td>
                                                    <td class="totalvolume">{{ $item->cargo_total_weight }}</td>
                                                    <td class="totalvolume">
                                                        @if (!empty($item->file_msds))
                                                        <button class="btn btn-sm" type="button" 
                                                                onclick='window.open("{{ asset("files/{$item->file_msds}") }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=250,width=800,height=800");'>
                                                            Open Popup
                                                        </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pickup/Delivery location -->
                        @if ($fullContainerLoad->is_pickup == 1 || $fullContainerLoad->is_delivery == 1)
                        <hr>
                        <div class="card mb-3">
                            <div class="card-body position-relative">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase">Location</h6>
                                <div id="tableExample">
                                    <div class="table-responsive scrollbar"> 
                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="table" style="background-color: #1E367B">
                                                <tr style="color: white">
                                                    <th class="sort" data-sort="no">Type</th>
                                                    <th class="sort" data-sort="">Location Name</th>
                                                    <th class="sort" data-sort="">County</th>
                                                    <th class="sort" data-sort="">City</th>
                                                    <th class="sort" data-sort="">Address</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">
                                                @if ($fullContainerLoad->pickup)                                                    
                                                <tr>
                                                    <td class="">Pickup Location</td>
                                                    <td class="">{{ $fullContainerLoad->pickup->name }}</td>
                                                    <td class="">{{ $fullContainerLoad->pickup->country }}</td>
                                                    <td class="">{{ $fullContainerLoad->pickup->city }}</td>
                                                    <td class="">{{ $fullContainerLoad->pickup->address }}</td>
                                                </tr>
                                                @endif

                                                @if ($fullContainerLoad->delivery)                                                    
                                                <tr>
                                                    <td class="">Delivery Location</td>
                                                    <td class="">{{ $fullContainerLoad->delivery->name }}</td>
                                                    <td class="">{{ $fullContainerLoad->delivery->country }}</td>
                                                    <td class="">{{ $fullContainerLoad->delivery->city }}</td>
                                                    <td class="">{{ $fullContainerLoad->delivery->address }}</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Documents -->
                        <hr>
                        <div class="card mb-3">
                            <div class="card-body position-relative">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase">List Documents</h6>
                                <ul class="list-group">
                                    @if (!empty($fullContainerLoad->file_documents))
                                    @foreach (json_decode($fullContainerLoad->file_documents) as $key => $value)
                                    @if (!is_array($value))
                                    <li class="list-group-item d-flex justify-content-between align-items-left">
                                        {{ (isset(config("fcl-lang")[$key]) ? config("fcl-lang")[$key] : $key) }}
                                        <a target="_blank" href="{{ asset("files/{$value}") }}" class="btn btn-falcon-primary btn-sm">Open Attachment</a>
                                    </li>
                                    @else
                                    @foreach ($value as $n => $file)
                                    <li class="list-group-item d-flex justify-content-between align-items-left">
                                        {{ (isset(config("fcl-lang")[$key]) ? config("fcl-lang")[$key] : $key) }} ({{ ($n + 1) }})
                                        <a target="_blank" href="{{ asset("files/{$file}") }}" class="btn btn-falcon-primary btn-sm">Open Attachment</a>
                                    </li>
                                    @endforeach
                                    @endif
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="card-body bg-light border-top">
                <div class="alert alert-warning">
                    Tidak ada data
                </div>
            </div>
            @endif
        </div>
    </div>

    @include('partial.alert-banner')

    @if (($isComfirmable && $this->fullContainerLoad->is_temp == 1) || request()->edit_mode == 1)
    <div class="card-footer bg-light">
        <div class="px-sm-3 px-md-5 text-center">
            <button wire:click='confirmFcl' class="btn btn-primary px-5 px-sm-6" type="submit">
                Submit Your Quotation
            </button>
        </div>
    </div>
    @endif
</div>
