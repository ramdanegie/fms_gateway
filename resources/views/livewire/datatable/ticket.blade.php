<div>

    @if (!$admin)
    <div class="row mb-3">
        <div class="col-8">
            <div id="actions">
                <a class="btn btn btn-dark me-1 mb-1 btn-sm" href="{{ route("ticket.create") }}">
                    <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ms-1">New</span>
                </a>
            </div>
        </div>
    </div>
    @endif

    <div id="tableExample">
        <div class="table-responsive scrollbar">
            <table class="table table-bordered table-striped fs--1 mb-0">
                <thead class="table" style="background-color: #1E367B">
                    <tr style="color: white">
                        <th>No</th>
                        <th>Quote No</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Department</th>
                        <th>Attachment</th>
                        <th>Created At</th>
                        <th class="text-end" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="list">
                    @forelse ($items as $i => $item)
                    <tr style="color: #2c2e30">
                        <td>{{ ($i+1) }}</td>
                        <td>{{ @$item->ticketable->quote_no }}</td>
                        <td>{{ $item->subject }}</td>
                        <td>{{ $item->message }}</td>
                        <td>{{ Convert::toDept($item->dept) }}</td>
                        <td>
                            <button class="btn btn-primary me-1 mb-1 btn-sm" type="button" onclick='window.open("{{ asset("files/{$item->attachment}") }}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=250,width=800,height=800");'>
                                View
                            </button>
                        </td>
                        <td>{{ $item->created_at->format("d/m/Y H:i") }}</td>
                        <td class="text-end">
                            <div>
                                <a class="btn btn-primary me-1 mb-1 btn-sm" href="{{ route(auth()->user()->isAdmin() ? "internal.ticket.detail" : "ticket.detail", $item->id) }}">
                                    <span class="fas fa-edit" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">Reply</span>
                                </a>
                                <button class="btn btn-danger me-1 mb-1 btn-sm" data-delete-route="{{ route("ticket.delete", $item->id) }}"
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
                        <td colspan="5">No Data</td>
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
