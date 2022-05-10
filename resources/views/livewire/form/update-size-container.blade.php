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
                    <label class="form-label" for="value">Value</label>
                    <input wire:model='value' class="form-control" id="code" type="text" placeholder="Value" />
                    @error('value') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="display">Display</label>
                    <input wire:model='display' class="form-control" id="display" type="text" placeholder="Display" />
                    @error('display') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route("internal.master.size") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
        </div>
    </form>
</div>
