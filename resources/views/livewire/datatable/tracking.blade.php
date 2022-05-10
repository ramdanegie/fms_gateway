<div>
    <div id="tableExample">
        <div class="table-responsive scrollbar">
            <table class="table table-bordered table-striped fs--1 mb-0">
                <thead class="table" style="background-color: #1E367B">
                    <tr style="color: white">
                        <th>No</th>
                        <th>Shipment No</th>
                        <th>Status</th>
                        <th>Issued Date</th>
                        <th>Created at</th>
                        <th class="text-end" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="list">
                  
                    @forelse ($items as $i => $item)
                    <tr>
                        <td>{{ ($i + 1) }}</td>
                        <td>{{ @$item->trackingable->quote_no }}</td>
                        <td>{{ $item->shipment_status }}</td>
                        <td>{{ Convert::dateFormat($item->shipment_date) }}</td>
                        <td>{{ $item->created_at->format("d/m/Y H:i") }}</td>
                        <td class="text-end">
                            <div>
                                <a class="btn p-0 ms-2" href="{{ route("internal.tracking.update", $item->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    <span class="text-500 fas fa-edit"></span>
                                </a>
                                <button data-delete-route="{{ route("internal.tracking.delete", $item->id) }}" class="btn p-0 ms-2" type="button"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                    <span class="text-500 fas fa-trash-alt"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No Data</td>
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
