<div>
    <div id="tableExample">
        <div class="table-responsive scrollbar">
            <table class="table table-bordered table-striped fs--1 mb-0">
                <thead class="table" style="background-color: #1E367B">
                    <tr style="color: white">
                        <th>Destination</th>
                        <th>Vessel</th>
                        <th>Voyage</th>
                        <th>STF/CLS</th>
                        <th>ETD Origin</th>
                        <th>Ves Connecting</th>
                        <th>Voy Connecting</th>
                        <th>ETA Destination</th>
                        <th>Connecting City</th>
                        <th>ETD Destination</th>
                        <th class="text-start" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->destination }}</td>
                        <td>{{ $item->vessel }}</td>
                        <td>{{ $item->voyage }}</td>
                        <td>{{ Convert::dateFormat($item->stf_cls, "d/m/Y") }}</td>
                        <td>{{ Convert::dateFormat($item->etd_origin, "d/m/Y") }}</td>
                        <td>{{ $item->ves_connecting }}</td>
                        <td>{{ $item->voy_connecting }}</td>
                        <td>{{ Convert::dateFormat($item->eta_destination, "d/m/Y") }}</td>
                        <td>{{ $item->city_connecting }}</td>
                        <td>{{ Convert::dateFormat($item->etd_destination, "d/m/Y") }}</td>
                        <td class="text-end">
                            <div>
                                <a class="btn btn-primary me-1 mb-1 btn-sm" href="{{ route('internal.master.import-transit-update', $item->id) }}">
                                    <span class="fas fa-edit" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">Edit</span>
                                </a>

                                <button class="btn btn-danger me-1 mb-1 btn-sm" data-delete-route="{{ route('internal.master.import-transit-delete', $item->id) }}"
                                        class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete">
                                    <span class="far fa-trash-alt" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">Delete</span>
                                </button>
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
                    <span class="d-none d-sm-inline-block" data-list-info="data-list-info">{{ $data_from }} to
                        {{ $data_to }} of {{ $data_all }}</span>
                </p>
            </div>

            <div class="col-auto d-flex">
                {{ $items->links('partial.simple-paginate') }}
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
