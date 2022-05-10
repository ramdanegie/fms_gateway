<div>
    <div class="card mb-3">
        <div class="card-body position-relative">
            <div id="actions">
                <button class="btn btn-primary me-1 mb-1 btn-sm" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ms-1">Filter</span>
                </button>
            </div>
            <hr>
            <div id="tableExample">
                <div class="table-responsive scrollbar">
                    <table class="table table-bordered table-striped fs--1 mb-0">
                        <thead class="table" style="background-color: #1E367B">
                            <tr style="color: white">
                                <th>Quote Type</th>
                                <th class="sort" data-sort="quotenumber">Shipment Number</th>
                                <th class="sort" data-sort="quotenumber">Shipment Date</th>
                                <th class="sort" data-sort="quotedate">Quote Number</th>
                                <th class="sort" data-sort="quotedate">Quote Date</th>
                                <th class="sort" data-sort="tradetype">Type of Trade</th>
                                <!-- <th class="sort" data-sort="origincountry">Origin Country</th>
                                <th class="sort" data-sort="origincity">Origin City</th>
                                <th class="sort" data-sort="destinationcountry">Destination Country</th>
                                <th class="sort" data-sort="destinationcity">Destination City</th> -->
                                <th class="sort" data-sort="status">Upload Draft</th>
                                <th class="sort" data-sort="status">Download Draft</th>
                                <th class="sort" data-sort="status">History Draft</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @forelse ($items as $item)
                            <tr style="color: #2c2e30">
                                <td>{{ (isset(config("quotation_types")[$item->quote_type]) ? config("quotation_types")[$item->quote_type] : $item->quote_type) }}</td>
                                <td>{{ $item->quote_no }}</td>
                                <td>{{ $item->created_at->format("d/m/Y H:i") }}</td>
                                <td>{{ $item->quote_no }}</td>
                                <td>{{ $item->created_at->format("d/m/Y H:i") }}</td>
                                <td>{{ $item->trade_type }}</td>
                                <!-- <td>{{ @$item->origin->country }}</td>
                                <td>{{ @$item->origin->city }}</td>
                                <td>{{ @$item->destination->country }}</td>
                                <td>{{ @$item->destination->city }}</td> -->
                                <td>
                                    @if (request()->user()->isAdmin())
                                        @if (!$item->drafDocument()->exists())
                                        <span class="badge rounded-pill bg-secondary">{{ $page_title }} not uploaded</span>
                                        @else
                                        <a href="{{ route("internal.draft-doc.create", [$item->drafDocument->draft_type, $item->id]) }}" class="btn btn-sm btn-primary">
                                            Update {{ $page_title }}
                                        </a>
                                        @endif
                                    @else
                                    <a href="{{ route("draft-doc.create", [$draft_type, $item->id]) }}" class="btn btn-sm btn-primary">
                                        Update {{ $page_title }}
                                    </a>
                                    @endif
                                </td>
                                <td class="status">
                                    @if ($item->drafDocument()->exists())
                                        <a target="_blank" href="{{ route(request()->user()->isAdmin() ? "internal.draft-doc.download" : "draft-doc.download", [$item->drafDocument->draft_type, $item->drafDocument->id]) }}" class="btn btn-sm btn-primary">
                                            Download {{ $page_title }}
                                        </a>
                                    @else
                                        <span class="badge rounded-pill bg-secondary">Not Uploaded</span>
                                    @endif
                                </td>
                                <td class="status">                                    
                                    <button 
                                        class="btn btn-sm btn-primary" 
                                        onclick="window.open('{{ route((request()->user()->isAdmin() ? "internal.draft-doc.history" : "draft-doc.history"), [$item->id]) }}', '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes')">
                                        History
                                    </button>
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

    <div wire:ignore class="modal fade" id="modalUploadPerforma" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form class="modal-dialog" wire:submit.prevent='uploadFile'>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload {{ $page_title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('partial.alert')
                    <div class="row g-2">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="file_attachments">Upload {{ $page_title }}</label>
                                <input id="file_attachments" type="file" class="form-control" wire:model='file_attachments'/>
                                <input id="fcl_id" type="hidden" class="form-control" wire:model='fcl_id'/>
                            </div>
                            @error('file_attachments') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        @if ($is_admin)
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="file_attachments">Draft Type</label>
                                <select required class="form-control" wire:model='draft_type'>
                                    <option value="">- Choose -</option>
                                @foreach (config("draft_types") as $key => $type)
                                    <option value="{{ $key }}">{{ $type }}</option>
                                @endforeach
                                </select>
                            </div>
                            @error('draft_type') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        @endif

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label" for="remark">Remark</label>
                                <input id="remark" type="text" class="form-control" wire:model='remark'/>
                            </div>
                            @error('remark') <span class="error">{{ $message }}</span> @enderror
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

@push('script')
<script>
    $(document).ready(function(){
        var modalUploadPerforma = new bootstrap.Modal(document.getElementById('modalUploadPerforma'));
        $("button#showUploadPerforma").off().on("click", function(){
            let _this = $(this),
            bind = _this.data("bind");
            modalUploadPerforma.toggle();

            console.log(bind);
            $("input#fcl_id").val(bind.id).change();
        });
    });
</script>
@endpush