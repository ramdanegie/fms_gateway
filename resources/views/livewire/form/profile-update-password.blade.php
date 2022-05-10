<div>
    <div class="row">
        <div class="col-lg-12">
            @include('partial.alert-banner')
        </div>
    </div>

    <form wire:submit.prevent='submit'>
        <div class="mb-3">
            <label class="form-label" for="old_password">Old Password</label>
            <input wire:model='old_password' class="form-control" id="old_password" type="password" />
            @error('old_password') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="new_password">New Password</label>
            <input wire:model='new_password' class="form-control" id="new_password" type="password" />
            @error('new_password') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="confirm_password">Confirm Password</label>
            <input wire:model='confirm_password' class="form-control" id="confirm_password" type="password" />
            @error('confirm_password') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button class="btn btn-primary d-block w-100" type="submit">Update Password </button>
    </form>
</div>
