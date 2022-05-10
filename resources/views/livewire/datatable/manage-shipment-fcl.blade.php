<div>
    <div class="card mb-3">
        <div class="card-body position-relative">
            <ul class="nav nav-pills" id="pill-myTab" role="tablist">
                <li class="nav-item" style="width:50% !important; text-align: center;">
                    <a wire:click='setFilterStatus("{{ \App\Models\FullContainerLoad::PROGRESS }}")' class="nav-link {{ $filter_status == \App\Models\FullContainerLoad::PROGRESS ? "active" : "" }}" href="#" aria-controls="pill-tab-quote" aria-selected="true" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight: bold;">ON PROGRESS</a>
                </li>
                <li class="nav-item" style="width:50% !important; text-align: center;">
                    <a wire:click='setFilterStatus("{{ \App\Models\FullContainerLoad::COMPLETE }}")' class="nav-link {{ $filter_status == \App\Models\FullContainerLoad::COMPLETE ? "active" : "" }}" href="#" aria-controls="pill-tab-rejected" aria-selected="false" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight: bold;">COMPLETED</a>
                </li>
            </ul>
            <div id="actions">
                <hr>
                <div class="row mb-3">                    
                    <div class="col-3">
                        <div class="mb-3">
                            <label class="form-label" for="f_quote_type">Type of Shipment</label>
                            <select wire:model='f_quote_type' class="form-select" id="trade_type" id="f_quote_type">
                                <option value="">ALL</option>
                                @foreach (config("quotation_types") as $k => $v)
                                <option wire:key='quotation_types.{{ $k }}' value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3">
                        <div class="mb-3">
                            <label class="form-label" for="name">Search</label>
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
                                <th class="sort" data-sort="quotenumber">Shipment Type</th>
                                <th class="sort" data-sort="quotenumber">Shipment Number</th>
                                <th class="sort" data-sort="quotenumber">Shipment Date</th>
                                <th class="sort" data-sort="quotedate">Quote Number</th>
                                <th class="sort" data-sort="quotedate">Quote Date</th>
                                <th class="sort" data-sort="tradetype">Type of Trade</th>
                                <th class="sort" data-sort="origincountry">Origin Country</th>
                                <th class="sort" data-sort="origincity">Origin City</th>
                                <th class="sort" data-sort="destinationcountry">Destination Country</th>
                                <th class="sort" data-sort="destinationcity">Destination City</th>
                                <th class="sort" data-sort="quotationdetail">Shipment Detail</th>
                                <!-- <th class="sort" data-sort="cargodescription">Cargo Description</th>
                                <th class="sort" data-sort="document">Document</th> -->
                                <th class="sort" data-sort="booking_confirmation">Booking Confirmation</th>
                                <th class="sort" data-sort="status">Status</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($items as $item)
                            <tr style="color: #2c2e30">
                                <td>{{ (isset(config("quotation_types")[$item->quote_type]) ? config("quotation_types")[$item->quote_type] : $item->quote_type) }}</td>
                                <td class="quotenumber">{{ $item->quote_no }}</td>
                                <td class="quotedate">{{ $item->created_at->format("d/m/Y H:i") }}</td>
                                <td class="quotenumber">{{ $item->quote_no }}</td>
                                <td class="quotedate">{{ $item->created_at->format("d/m/Y H:i") }}</td>
                                <td class="tradetype">{{ $item->trade_type }}</td>
                                <td class="origincountry">{{ $item->origin->country }}</td>
                                <td class="origincity">{{ $item->origin->city }}</td>
                                <td class="destinationcountry">{{ $item->destination->country }}</td>
                                <td class="destinationcity">{{ $item->destination->city }}</td>
                                <td>
                                    <a href="{{ route("manage-shipment.detail-shipment", [$item->quote_type, $item->id]) }}" target="_blank" class="btn btn-primary me-1 mb-1 btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">View</a>
                                </td>
                                <!-- <td>
                                    <button class="btn btn-primary me-1 mb-1 btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cargo">View</button>
                                </td>
                                <td>
                                    <button class="btn btn-primary me-1 mb-1 btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Document">View</button>
                                </td> -->
                                <td>
                                    <a href="{{ route("manage-shipment.booking-confirm", [$item->quote_type, $item->id]) }}" class="btn btn-sm btn-primary">View</a>
                                </td>
                                <td class="status">
                                    <span class="badge badge rounded-pill d-block p-2 badge-soft-info">
                                        {{ Convert::issuedStatus($item->issued_status) }} <span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span>
                                    </span>
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
</div>

@push('script')
<script>
    $("button[title=\"Delete\"]").click(function () {
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