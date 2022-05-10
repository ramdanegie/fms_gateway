<div>
    @include('partial.alert-banner')
    <div id="actions">
        <div class="row mb-3">

            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label" for="f_quote_type">Type of Quotation</label>
                    <select wire:model='f_quote_type' class="form-select" id="trade_type" id="f_quote_type">
                        <option value="">ALL</option>
                        @foreach (config("quotation_types") as $k => $v)
                        <option wire:key='quotation_types.{{ $k }}' value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-5">

            </div>
            <div class="col-3">
                <div class="mb-3">
                    <label class="form-label" for="name">Search</label>
                    <input wire:model='text_filter' class="form-control" id="text_filter" type="text" placeholder="Search" />
                    @error('text_filter') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>
    <div id="tableExample">
        <div class="table-responsive scrollbar">
            <table class="table table-bordered table-striped fs--1 mb-0">
                <thead class="table" style="background-color: #1E367B">
                    <tr style="color: white">
                        @if ($issued_status == "COMP")
                        <th>Shipment Number</th>
                        @else
                        <th>Quote Number</th>
                        @endif

                        <th class="sort" data-sort="quotedate">Quote Type</th>
                        <th class="sort" data-sort="quotedate">Quote Date</th>
                        <th class="sort" data-sort="tradetype">Type of Trade</th>
                        <th class="sort" data-sort="origincountry">Origin Country</th>
                        <th class="sort" data-sort="origincity">Origin City</th>
                        <th class="sort" data-sort="destinationcountry">Destination Country</th>
                        <th class="sort" data-sort="destinationcity">Destination City</th>
                        <!-- <th class="sort" data-sort="quotationdetail">Quotation Detail</th>
                         <th class="sort" data-sort="cargodescription">Cargo Description</th> 
                        <th class="sort" data-sort="document">Document</th> -->                       
                        
                        <th class="sort" data-sort="Shipping Instruction">Shipping Instruction</th>
                        <th class="text-start" scope="col">Actions</th>
                        <th class="sort" data-sort="status">Status</th>
                        <th class="sort" data-sort="issued_reason">Reason</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @forelse ($items as $item)
                    <tr style="color: #2c2e30">
                        @if ($issued_status == "COMP")
                        <td>{{ $item->shipment_no }}</td>
                        @else
                        <td>{{ $item->quote_no }}</td>
                        @endif

                        <td>{{ isset(config("quotation_types")[$item->quote_type]) ? config("quotation_types")[$item->quote_type] : $item->quote_type }}</td>
                        <td>{{ $item->created_at->format("d/m/Y H:i") }}</td>
                        <td>{{ $item->trade_type }}</td>
                        <td>{{ @$item->origin->country }}</td>
                        <td>{{ @$item->origin->city }}</td>
                        <td>{{ @$item->destination->country }}</td>
                        <td>{{ @$item->destination->city }}</td>
                <!--<td>
                    <a target="_blank" href="{{ route("internal.req-quote", $item->id) }}" class="btn btn-primary me-1 mb-1 btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Quotation Detail">View</a>
                </td>
                <td>
                    <button class="btn btn-primary me-1 mb-1 btn-sm" type="button" onclick="window.open('{{ route('internal.fcl_cargos', ['fcl', $item->id]) }}', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=250,width=800,height=800');">
                        View
                    </button>
                </td>
                <td>
                    <button class="btn btn-primary me-1 mb-1 btn-sm" type="button" onclick="window.open('{{ route('internal.fcl_documents', ['fcl', $item->id]) }}', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=250,width=800,height=800');">
                        View
                    </button>
                </td> -->
                        
                        
                        <td>
                            <a target="_blank" href="{{ route("internal.fcl_shipping", $item->id) }}" class="btn btn-primary me-1 mb-1 btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Shipping Instruction">View</a>
                        </td>
                        <td class="text-end">
                            <div>
                                @if (empty($issued_status))
                                <a class="btn btn-primary me-1 mb-1 btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" href="{{ route("internal.req-quote", ["quote_type" => $item->quote_type, "page" => "page-1", "fcl_id" => $item->id, "edit_mode" => 1]) }}" class="btn btn-success me-1 mb-1 btn-sm" type="button">
                                    <span class="far fa-edit" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">Edit</span>
                                </a>

                                <button class="btn btn-danger me-1 mb-1 btn-sm" type="button"><span class="far fa-edit" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">Delete</span>
                                </button>

                                @if ($item->getCurrentStatus(false) == 101)
                                <button class="btn btn-secondary me-1 mb-1 btn-sm" wire:click="selectUpload({{ $item->id }})" data-bind="{{ $item }}" id='showUploadPerforma' class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload Proforma Invoice/Quotation">
                                    <span class="far fa-money-bill-alt" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">Upload Proforma Invoice</span>
                                </button>
                                @endif

                                @if ($item->getCurrentStatus(false) == 102)
                                <button class="btn btn-success me-1 mb-1 btn-sm" wire:click='agreeQuote({{ $item->id }})' class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Agree Quote">
                                    <span class="far fa-check-circle"></span><span class="d-none d-sm-inline-block ms-1">Approve Quotation</span>
                                </button>
                                <button onclick="window.open('{{ route('internal.fcl_rejection', $item->id) }}', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=250,width=800,height=800');" class="btn btn-danger me-1 mb-1 btn-sm" class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Reject Quote">
                                    <span class="far fa-window-close"></span><span class="d-none d-sm-inline-block ms-1">Reject Quotation</span>
                                </button>
                                @endif
                                @endif

                                @if ($issued_status == "PRO")
                                <a class="btn btn-primary me-1 mb-1 btn-sm" href="{{ route("internal.fcl_tracking", $item->id) }}" class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Input Tracking">
                                    <span class="fas fa-search-location"></span><span class="d-none d-sm-inline-block ms-1">Input Tracking</span>
                                </a>
                                <button class="btn btn-success me-1 mb-1 btn-sm" wire:click='completeShipment({{ $item->id }})' class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Complete Shipment">
                                    <span class="far fa-check-circle"></span><span class="d-none d-sm-inline-block ms-1">Complete Shipment</span>
                                </button>
                                <button class="btn btn-danger me-1 mb-1 btn-sm" wire:click='cancelQuote({{ $item->id }})' class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel Shipment">
                                    <span class="far fa-window-close"></span><span class="d-none d-sm-inline-block ms-1">Cancel Shipment</span>
                                </button>
                                @endif

                                @if ($issued_status == "COMP")
                                <button class="btn btn-primary me-1 mb-1 btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="View Tracking">
                                    <span class="fas fa-search-location"></span><span class="d-none d-sm-inline-block ms-1">View Tracking</span>
                                </button>
                                @endif
                            </div>
                        </td>
                        <td>
                            <span class="badge badge rounded-pill d-block p-2 badge-soft-info">
                                {{ $item->getCurrentStatus() }} <span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span>
                            </span>
                        </td>
                        <td>{{ $item->issued_reason }} </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11">No Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="row align-items-center mt-3">
            <div class="pagination d-none"></div>
            <div class="col">
                <p class="mb-0 fs--1">
                    <span class="d-none d-sm-inline-block" data-list-info="data-list-info">
                        {{ $data_from }} to {{ $data_to }} of {{ $data_all }}
                    </span>
                </p>
            </div>

            <div class="col-auto d-flex">
                {{ $items->links('partial.simple-paginate') }}
            </div>
        </div>
    </div>

    <div wire:ignore class="modal fade" id="modalUploadPerforma" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form class="modal-dialog" wire:submit.prevent='uploadFilePerforma'>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Proforma Invoice - <span id="titleUpload"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="upload-performa">Upload Proforma Invoice/Quotation</label>
                                <input type="file" class="form-control" wire:model='file_performa_invoice'/>
                            </div>
                            @error('file_performa_invoice') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="pi_currency">Currency</label>
                                <select wire:model='pi_currency' class="form-select" id="pi_currency" data-options='{"placeholder":true}'>
                                    <option value="">- Choose -</option>
                                    <option value="IDR">IDR</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                            @error('pi_currency') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="pi_value">Value</label>
                                <input type="text" class="form-control" wire:model='pi_value'/>
                            </div>
                            @error('pi_value') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="pi_valid_until">Valid Until</label>
                                <input type="text" class="form-control datetimepicker" wire:model='pi_valid_until'/>
                            </div>
                            @error('pi_valid_until') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </form>
    </div>

    <div wire:loading.delay><div id="cover-spin"></div></div>
</div>

<script>
    $(document).ready(function(){
    var modalUploadPerforma = new bootstrap.Modal(document.getElementById('modalUploadPerforma'));
    $("button#showUploadPerforma").off().on("click", function(){
    let _this = $(this),
            bind = _this.data("bind");
    $("#titleUpload").text(bind.quote_no);
    modalUploadPerforma.toggle();
    });
    flatpickr($("input.datetimepicker"), {"enableTime":true, "dateFormat":"d/m/y H:i", "disableMobile":true, minDate: "today"});
    });
</script>
</div>