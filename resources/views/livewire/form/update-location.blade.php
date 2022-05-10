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
            <div class="col-lg-6">
                <div class="col-sm-12 col-lg-12 mb-4">
                    <div class="card text-gray" style="background-color: #FFF02D">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label text-uppercase" for="name">Location Name</label>
                                <input wire:model='name' class="form-control" id="name" type="text" placeholder="Location Name" />
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-12 mb-4">
                    <div class="card text-white" style="background-color: #1E367B">
                        <div class="card-body">
                            <div class="card-title">Detail Location</div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="country">Country</label>
                                        <input wire:model='country' class="form-control" id="country" type="text" placeholder="Country" />
                                        @error('country') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="country_code">Country Code</label>
                                        <input wire:model='country_code' class="form-control" id="country_code" type="text" placeholder="Country Code" />
                                        @error('country_code') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-6">
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
                                        <input wire:model='lat' class="form-control" id="lat" type="text" disabled/>
                                        @error('lat') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label text-uppercase" for="lng">Longitude</label>
                                        <input wire:model='lng' class="form-control" id="lng" type="text" disabled/>
                                        @error('lng') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">            
                    <a href="{{ route("master.location") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
                    <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
                </div>
            </div>
            <div class="col-lg-6" wire:ignore>
                <div id="fms_map"></div>
            </div>
        </div>
    </form>
</div>