<div>
    <div class="p-4 p-md-5 flex-grow-1">
        @include('partial.alert-banner')
        <h3>Register</h3>
        <form enctype="multipart/form-data" wire:submit.prevent='submit'>
            <hr>
            <div class="mb-3">
                <label class="form-label" for="company-name">Company Name</label>
                <input wire:model='name' class="form-control" type="text" autocomplete="on" id="company-name" />
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="company-pic">Person in Charge</label>
                <input wire:model='pic_name' class="form-control" type="text" autocomplete="on" id="company-pic" />
                @error('pic_name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="file_npwp">NPWP</label>
                <input wire:model='file_npwp' class="form-control" id="file_npwp" type="file" />
                @error('file_npwp') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="permit">Company Legality (NIB)</label>
                <input wire:model='company_legality' class="form-control" id="permit" type="file" />
                @error('company_legality') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="card-email">Email address</label>
                <input wire:model='email' class="form-control" type="email" autocomplete="on" id="card-email" />
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="row gx-2">
                <div class="mb-3 col-sm-6">
                    <label class="form-label" for="card-password">Password</label>
                    <input wire:model='password' class="form-control" type="password" autocomplete="on" id="card-password" />
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3 col-sm-6">
                    <label class="form-label" for="card-confirm-password">Confirm Password</label>
                    <input wire:model='confirm_password' class="form-control" type="password" autocomplete="on" id="card-confirm-password" />
                    @error('confirm_password') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <hr>
            <div class="mb-3">
                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
            </div>
        </form>
    </div>
</div>
