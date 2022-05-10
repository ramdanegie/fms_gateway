<div>
    <div class="card mb-3">
        <div class="card-body position-relative">
            <div id="actions">
                <div class="row mb-3">                    
                    <div class="col-3">
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
                    <div class="col-6">

                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label class="form-label" for="name">Find Quotation</label>
                            <input wire:model='text_filter' class="form-control" id="text_filter" type="text" placeholder="Search" />
                            @error('text_filter') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div id="tableExample">
                <div class="table-responsive scrollbar">
                    <table class="table table-bordered table-striped fs--1 mb-0">
                        <thead class="table" style="background-color: #1E367B">
                            <tr style="color: white">
                                <th>Type of Quotation</th>
                                <th>Quote Number</th>
                                <th>Quote Date</th>
                                <th>Type of Trade</th>
                                <th>Origin Country</th>
                                <th>Origin City</th>
                                <th>Destination Country</th>
                                <th>Destination City</th>
                                <th>Detail</th>
                                <th>Quotation</th>
                                <th>Status</th>
                                <th>Reason</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($items as $item)
                            <tr style="color: #2c2e30">
                                <td>{{ (isset(config("quotation_types")[$item->quote_type]) ? config("quotation_types")[$item->quote_type] : $item->quote_type) }}</td>
                                <td>{{ $item->quote_no }}</td>
                                <td>{{ $item->created_at->format("d/m/Y H:i") }}</td>
                                <td>{{ $item->trade_type }}</td>
                                <td>{{ @$item->origin->country }} {{ !empty($item->admin_update) ? "(Changed)" : "" }}</td>
                                <td>{{ @$item->origin->city }} {{ !empty($item->admin_update) ? "(Changed)" : "" }}</td>
                                <td>{{ @$item->destination->country }} {{ !empty($item->admin_update) ? "(Changed)" : "" }}</td>
                                <td>{{ @$item->destination->city }} {{ !empty($item->admin_update) ? "(Changed)" : "" }}</td>
                                <td>
                                    <a target="_blank" class="btn btn-primary me-1 mb-1 btn-sm" href="{{ route("req-quote", ["quote_type" => $item->quote_type, "page" => "page-1", "fcl_id" => $item->id, "edit_mode" => 2]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">View</a>
                                </td>
                                <td>
                                    @if (!empty($item->file_performa_invoice))
                                    <button class="btn btn-primary me-1 mb-1 btn-sm" onclick="window.open('{{ route("edit-quote.quotation", ["quote_type" => $item->quote_type, "fcl" => $item->id]) }}', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');" class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="See Proforma Inv/Quot">
                                        View
                                    </button>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge rounded-pill d-block p-2 badge-soft-info">
                                        {{ $item->getCurrentStatus() }} <span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span>
                                    </span>
                                </td>
                                <td>{{ $item->issued_reason }}</td>

                                <td class="text-end">
                                    <div>
                                        @if (empty($item->issued_status) && $item->pi_status == "WR")
                                        <a class="btn btn-primary me-1 mb-1 btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" href="{{ route("req-quote", ["quote_type" => $item->quote_type, "page" => "page-1", "fcl_id" => $item->id, "edit_mode" => 1]) }}" class="btn btn-success me-1 mb-1 btn-sm" type="button">
                                            <span class="far fa-edit" data-fa-transform="shrink-3 down-2"></span>
                                            <span class="d-none d-sm-inline-block ms-1">Edit</span>
                                        </a>
                                        <button class="btn btn-danger me-1 mb-1 btn-sm" type="button" data-delete-route="{{ route("edit-quote.delete", ["quote_type" => $item->quote_type, "id" => $item->id]) }}" class="btn p-0 ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <span class="far fa-trash-alt" data-fa-transform="shrink-3 down-2"></span>
                                            <span class="d-none d-sm-inline-block ms-1">Delete</span>
                                        </button>
                                        @endif

                                        <!-- <a class="btn btn-secondary me-1 mb-1 btn-sm" href="{{ route("edit-quote.ask", ["quote_type" => $item->quote_type, "fcl" => $item->id]) }}" class="btn p-0 ms-2">
                                            <span class="far fa-handshake" data-fa-transform="shrink-3 down-2"></span>
                                            <span class="d-none d-sm-inline-block ms-1">Ask Quotation</span>
                                        </a> -->

                                        @if ($item->pi_status == "OK")
                                        <a class="btn btn-secondary me-1 mb-1 btn-sm" href="{{ route("edit-quote.shipping-instruction", ["quote_type" => $item->quote_type, "fcl" => $item->id]) }}" class="btn p-0 ms-2">
                                            <span class="far fa-handshake" data-fa-transform="shrink-3 down-2"></span>
                                            <span class="d-none d-sm-inline-block ms-1">Shipping Instruction</span>
                                        </a>
                                        @endif
                                    </div>
                                </td>
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
                            <span class="d-none d-sm-inline-block" data-list-info="data-list-info">{{ $data_from }} to {{ $data_to }} of {{ $data_all }}</span>
                        </p>
                    </div>
                    <div class="col-auto d-flex">
                        {{ $items->links('partial.simple-paginate') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:loading.delay><div id="cover-spin"></div></div>
</div>

@push('script')
<script>
    $("button[title=\"Delete\"]").click(function() {
    let _this = $(this);
    Swal.fire({
    title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
    window.location.assign(_this.data("delete-route"));
    }
    });
    });
</script>
@endpush
