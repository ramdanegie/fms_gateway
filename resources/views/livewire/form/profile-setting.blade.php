<div>
    <div class="row">
        <div class="col-lg-12">
            @include('partial.alert-banner')
        </div>
    </div>

    <form enctype="multipart/form-data" class="row g-3" wire:submit.prevent='submit'>

        <div class="col-sm-12 col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Info Company</div>
                    <div class="col-lg-12">
                        <label class="form-label" for="name">First Name</label>
                        <input class="form-control" id="name" type="text" wire:model='name' />
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="last_name">Last Name</label>
                        <input class="form-control" id="last_name" type="text" wire:model='last_name' />
                        @error('last_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" type="text" wire:model='email' />
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="phone">Phone</label>
                        <input class="form-control" id="phone" type="text" wire:model='phone' />
                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label" for="address">Address</label>
                            <textarea  wire:model='address' class="form-control" id="address" rows="4"></textarea>
                            @error('address') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Info Document</div>
                    <div class="col-lg-12">
                        <label class="form-label" for="npwp">NPWP</label>
                        <input class="form-control" id="npwp" type="text" wire:model='npwp' maxlength="20"/>
                        @error('npwp') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label" for="file_npwp">Photo of NPWP</label>
                            @isset($o_file_npwp)
                            &nbsp;
                            <a target="_blank" href="{{ $o_file_npwp }}" class="badge rounded-pill badge-soft-info">Open Attachment</a>
                            @endisset
                            <input class="form-control" id="file_npwp" type="file" wire:model='file_npwp' />
                            @error('file_npwp') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="nib">NIB Number</label>
                        <input class="form-control" id="nib" type="text" wire:model='nib' />
                        @error('nib') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label" for="file_legality">Photo of NIB</label>
                            @isset($o_file_legality)
                            &nbsp;
                            <a target="_blank" href="{{ $o_file_legality }}" class="badge rounded-pill badge-soft-info">Open Attachment</a>
                            @endisset
                            <input class="form-control" id="file_legality" type="file" wire:model='file_legality' />
                            @error('file_legality') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-primary" type="submit">Update Profile</button>
        </div>
    </form>
</div>
