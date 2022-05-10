<div>
    <div class="row mb-3">
        <div class="col-8">
            <div id="actions">
                <a class="btn btn-dark me-1 mb-1 btn-sm" href="{{ route("master.cargo-create") }}">
                    <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ms-1">New</span>
                </a>
                <button class="btn btn-dark me-1 mb-1 btn-sm" type="button">
                    <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ms-1">Export</span>
                </button>
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <input wire:model='text_filter' class="form-control" id="text_filter" type="text" placeholder="Search" />
                @error('text_filter') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div id="tableExample">
        <div class="table-responsive scrollbar">
            <table class="table table-bordered table-striped fs--1 mb-0">
                <thead class="table" style="background-color: #1E367B">
                    <tr style="color: white">
                        <th>Cargo Description</th>
                        <th>Type of Cargo</th>
                        <th>HS Code</th>
                        <th>Unit Length (CM)</th>
                        <th>Unit Height (CM)</th>
                        <th>Unit Depth (CM)</th>
                        <th>Unit Weight (KG)</th>
                        <th class="text-center" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->hs_code }}</td>
                        <td>{{ $item->length }}</td>
                        <td>{{ $item->height }}</td>
                        <td>{{ $item->depth }}</td>
                        <td>{{ $item->weight }}</td>
                        <td class="text-center">
                            <div>
                                <a class="btn btn-primary me-1 mb-1 btn-sm" href="{{ route('master.cargo-update', $item->id) }}">
                                    <span class="fas fa-edit" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">Edit</span>
                                </a>

                                <button class="btn btn-danger me-1 mb-1 btn-sm"  data-delete-route="{{ route('master.cargo-delete', $item->id) }}"
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
