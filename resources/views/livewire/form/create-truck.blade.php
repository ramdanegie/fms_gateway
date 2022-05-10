<div>
    <div class="row">
        <div class="col-12">
            @include('partial.alert-banner')
        </div>
    </div>
    <form wire:submit.prevent='submit'>
        <div class="mb-3">
            <label class="form-label text-uppercase" for="name">Truck Name</label>
            <input wire:model='name' class="form-control" id="name" type="text" placeholder="Truck Name" />
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label text-uppercase" for="type">Truck type</label>
            <input wire:model='type' class="form-control" id="type" type="text" placeholder="Truck type" />
            @error('type') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">            
            <a href="{{ route("internal.master.truck") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
        </div>
    </form>
</div>
