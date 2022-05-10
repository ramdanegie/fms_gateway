<div>
    @include('partial.alert-banner')
    <form enctype="multipart/form-data" wire:submit.prevent='submit'>
        <div class="tab-pane {{ $form_page == 'page-3' ? 'active' : '' }} px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab4" id="bootstrap-wizard-validation-tab4">

            <div class="row g-2">
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="upload-invoice">Invoice <small>(Optional)</small></label>
                        <input type="file" class="form-control" name="file" wire:model='file_invoice'/>
                    </div>
                    @error('file_invoice') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="upload-packing-list">Packing List <small>(Optional)</small></label>
                        <input type="file" name="file" class="form-control" wire:model='file_packaging_list'/>
                    </div>
                    @error('file_packaging_list') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="row g-2">
                @if ($quote_type == "ftl")
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="upload-invoice">Delivery Order</label>
                        <input type="file" class="form-control" name="file" wire:model='file_deliveryorder' />
                    </div>
                    @error('file_invoice') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="file_deliverynote">Delivery Note/Surat Jalan</label>
                        <input id="file_deliverynote" type="file" class="form-control" wire:model='file_deliverynote' />
                    </div>
                    @error('file_deliverynote') <span class="error">{{ $message }}</span> @enderror
                </div>
                @else
                    @if ($fullContainerLoad->trade_type == "IM")
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="upload-certificate-origin">Certificate of Origin</label>
                            <input type="file" name="file" class="form-control" wire:model='file_cert_origin'/>
                        </div>
                        @error('file_cert_origin') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="upload-bl">Bill of Lading</label>
                            <input type="file" name="file" class="form-control" wire:model='file_bill_lading'/>
                        </div>
                        @error('file_bill_lading') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    @endif
                @endif

                <div class="col-6">
                    <div class="mb-3">
                        <label class="form-label" for="upload-other-documents">Other Documents <small>(Optional)</small></label>
                        <input type="file" name="file" class="form-control" wire:model='file_others'/>
                    </div>
                    @error('file_others') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="card-footer bg-light">
            @if ($edit_mode != 2)
            <div class="px-sm-3 px-md-5">
                <ul class="pager wizard list-inline mb-0">
                    <li class="previous"></li>
                    <li class="next">
                        <button class="btn btn-primary px-5 px-sm-6" type="submit">
                            Next <span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"></span>
                        </button>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </form>
</div>
