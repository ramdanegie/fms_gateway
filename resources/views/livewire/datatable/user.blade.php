<div>
    <div class="row mb-3">
        <div class="col-8">
            <div id="actions">
                <a class="btn btn-dark me-1 mb-1 btn-sm" href="{{ route('internal.master.user-create') }}">
                    <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ms-1">New</span>
                </a>
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
                        <th>Nama Perusahaan</th>
                        <th>Role</th>
                        <th>PIC</th>
                        <th>Email</th>
                        <th>NIB</th>
                        <th>File Legalitas (NIB)</th>
                        <th>NPWP</th>                        
                        <th>File NPWP</th>
                        <th>Created At</th>
                        <th class="text-end" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->team->title }}</td>
                        <td>{{ $item->pic_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->nib }}</td>
                        <td>
                            @isset($item->file_legality)
                            <a href="{{ asset("files/{$item->file_legality}") }}" target="_blank" class="btn btn-primary me-1 mb-1 btn-sm">
                                <span class="fas fa-folder-open"></span>
                                View
                            </a>
                            @endisset
                        </td>                        
                        <td>{{ $item->npwp }}</td>
                        <td>
                            @isset($item->file_npwp)
                            <a href="{{ asset("files/{$item->file_npwp}") }}" target="_blank" class="btn btn-primary me-1 mb-1 btn-sm">
                                <span class="fas fa-folder-open"></span>
                                View
                            </a>
                            @endisset
                        </td>
                        <td>{{ $item->created_at->format("d/m/Y H:i") }}</td>
                        <td class="text-end">
                            <div>                                
                                <a class="btn btn-primary me-1 mb-1 btn-sm" href="{{ route("internal.master.user-update", $item->id) }}">
                                    <span class="fas fa-edit" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">Edit</span>
                                </a>

                                <button class="btn btn-danger me-1 mb-1 btn-sm"  data-delete-route="{{ route("internal.master.user-delete", $item->id) }}"
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
