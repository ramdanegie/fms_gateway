<div>
    <div class="row">
        <div class="col-12">
            @include('partial.alert-banner')
        </div>
    </div>
    <form enctype="multipart/form-data" wire:submit.prevent='submit'>
        <div style="width: 75%; display: table;">
            <div style="display: table-row; height: 100px;">
                <div style="width: 50%; display: table-cell;">
                    <div class="col-sm-12 col-lg-11 mb-4">
                        <div class="card text-gray" style="background-color: #FFF02D">
                            <div class="card-body">
                                <div class="card-title">Info Company</div>
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="name">Company Name</label>
                                    <input wire:model='name' class="form-control" type="text" autocomplete="on" id="name" />
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="pic_name">Person in Charge</label>
                                    <input wire:model='pic_name' class="form-control" type="text" autocomplete="on" id="pic_name" />
                                    @error('pic_name') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="email">Email address</label>
                                    <input wire:model='email' class="form-control" type="email" autocomplete="on" id="email" />
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="npwp">NPWP</label>
                                    <input wire:model='npwp' class="form-control" type="text" autocomplete="on" id="npwp" />
                                    @error('npwp') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="nib">NIB Number</label>
                                    <input wire:model='nib' class="form-control" type="text" autocomplete="on" id="nib" />
                                    @error('nib') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="file_npwp">Photo of NPWP</label>
                                    <input wire:model='file_npwp' class="form-control" id="file_npwp" type="file" />
                                    @error('file_npwp') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label text-uppercase" for="file_legality">Company Legality (NIB)</label>
                                    <input wire:model='file_legality' class="form-control" id="file_legality" type="file" />
                                    @error('file_legality') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display: table-cell;">
                    <div class="col-sm-12 col-lg-10 mb-4">
                        <div class="card text-white" style="background-color: #1E367B">
                            <div class="card-body">
                                <div class="card-title">Info Access</div>
                                <div class="row gx-2">
                                    <div class="mb-3 col-sm-12">
                                        <label class="form-label text-uppercase" for="password">Password</label>
                                        <input wire:model='password' class="form-control" type="password" autocomplete="on" id="password" />
                                        @error('password') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3 col-sm-12">
                                        <label class="form-label text-uppercase" for="confirm-password">Confirm Password</label>
                                        <input wire:model='confirm_password' class="form-control" type="password" autocomplete="on" id="confirm-password" />
                                        @error('confirm_password') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <a href="{{ route("internal.master.user") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
                <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
            </div>
        </div>

    </form>
</div>
