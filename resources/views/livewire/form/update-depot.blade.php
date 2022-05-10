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
                    <label class="form-label" for="name">Depot Name</label>
                    <input wire:model='name' class="form-control" id="name" type="text" placeholder="Depot Name" />
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="city">City</label>
                    <input wire:model='city' class="form-control" id="city" type="text" placeholder="City" />
                    @error('city') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <textarea wire:model='address' class="form-control" id="address" cols="30" rows="10" placeholder="Address"></textarea>
                    @error('address') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route("internal.master.depot") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>            
        </div>
    </form>
</div>
    