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
                    <label class="form-label" for="destination">Destination</label>
                    <input wire:model='destination' class="form-control" id="destination" type="text" placeholder="Destination" />
                    @error('destination') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="vessel">Vessel</label>
                    <input wire:model='vessel' class="form-control" id="vessel" type="text" placeholder="Vessel" />
                    @error('vessel') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="voyage">Voyage</label>
                    <input wire:model='voyage' class="form-control" id="voyage" type="text" placeholder="Voyage" />
                    @error('voyage') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="stf_cls">STF/CLS</label>
                    <input wire:model='stf_cls' class="form-control datetimepicker" id="stf_cls" type="text" placeholder="d/m/Y" data-options='{"enableTime":false,"dateFormat":"d/m/Y","disableMobile":true}' />
                    @error('stf_cls') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="etd_origin">ETD Origin</label>
                    <input wire:model='etd_origin' class="form-control datetimepicker" id="etd_origin" type="text" placeholder="d/m/Y" data-options='{"enableTime":false,"dateFormat":"d/m/Y","disableMobile":true}' />
                    @error('etd_origin') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="eta_destination">ETA Destination</label>
                    <input wire:model='eta_destination' class="form-control datetimepicker" id="eta_destination" type="text" placeholder="d/m/Y" data-options='{"enableTime":false,"dateFormat":"d/m/Y","disableMobile":true}' />
                    @error('eta_destination') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route("internal.master.import-direct") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>            
        </div>
    </form>
</div>
