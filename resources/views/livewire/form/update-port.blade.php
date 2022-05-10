<div>
    <style>
        #fms_map {
            height:100%; margin: 0; padding: 0;
        }
    </style>
    <div class="row">
        <div class="col-12">
            @include('partial.alert-banner')
        </div>
    </div>
    <form wire:submit.prevent='submit'>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label text-uppercase" for="name">Port Name</label>
                        <input wire:model='name' class="form-control" id="name" type="text" placeholder="Truck Name" />
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-uppercase" for="type">Type</label>
                        <select class="form-control" id="type" wire:model='type'>
                        <option wire:key='ops-empt' value="">- Choose -</option>
                        <option wire:key='ops-SEA' value="SEA">SEA FREIGHT</option>
                        <option wire:key='ops-AIR' value="AIR">AIR FREIGHT</option>
                        </select>
                        @error('type') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label text-uppercase" for="country">Country</label>
                            <input wire:model='country' class="form-control" id="country" type="text" placeholder="Country" />
                            @error('country') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label text-uppercase" for="country_code">Country Code</label>
                            <input wire:model='country_code' class="form-control" id="country_code" type="text" placeholder="Country Code" />
                            @error('country_code') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label class="form-label text-uppercase" for="city">City</label>
                            <input wire:model='city' class="form-control" id="city" type="text" placeholder="City" />
                            @error('city') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label text-uppercase" for="address">Address</label>
                            <textarea onchange="changeMapCenter(this)" wire:model='address' class="form-control" id="address" type="text" placeholder="Address" rows="5"></textarea>
                            @error('address') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label text-uppercase" for="lat">Latitude</label>
                            <input wire:model='lat' class="form-control" id="lat" type="text" />
                            @error('lat') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label class="form-label text-uppercase" for="lng">Longitude</label>
                            <input wire:model='lng' class="form-control" id="lng" type="text" />
                            @error('lng') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6" wire:ignore>
                <div id="fms_map"></div>
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route("internal.master.port") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
        </div>
    </form>
</div>