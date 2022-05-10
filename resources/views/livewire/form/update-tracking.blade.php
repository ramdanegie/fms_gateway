<div>
    <div class="row">
        <div class="col-12">
            @include('partial.alert-banner')
        </div>
    </div>

    <form wire:submit.prevent='submit'>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="code">Shipment Number</label>
                    <input readonly class="form-control" value="{{ @$tracking->trackingable->quote_no }}" id="code" type="text" placeholder="Code" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="shipment_status">Shipment Status</label>
                    <input wire:model='shipment_status' class="form-control" id="shipment_status" type="text" placeholder="Shipment Status" />
                    @error('shipment_status') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="shipment_date">Issued At</label>
                    <input wire:model='shipment_date' class="form-control datepicker" id="shipment_date" type="text" placeholder="Issued At" />
                    @error('shipment_date') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route("internal.tracking.list") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Update</button>
        </div>
    </form>
</div>
