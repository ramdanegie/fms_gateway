<div>
    <div class="p-4 p-md-5 flex-grow-1">
        @include('partial.alert-banner')

        <div class="row flex-between-center">
            <div class="col-auto">
                <h3>Account Login</h3>
            </div>
        </div>

        <form wire:submit.prevent="submit">
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="card-email">Email</label>
                </div>
                <input wire:model='email' class="form-control" id="card-email" type="text" />
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="card-password">Password</label>
                </div>
                <input wire:model='password' class="form-control" id="card-password" type="password" />
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="row flex-between-center">
                <div class="col-auto">
                    <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" id="card-checkbox" checked="checked" />
                        <label class="form-check-label mb-0" for="card-checkbox">Remember me</label>
                    </div>
                </div>
                <div class="col-auto">
                    <a class="fs--1" href="/../forgot-password.html">Forgot Password?</a>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary d-block w-100 mt-3" href="dashboard.html" name="submit">Log in</button>
            </div>
        </form>
    </div>
</div>
