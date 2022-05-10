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
                    <label class="form-label" for="title">Title</label>
                    <input wire:model='title' class="form-control" id="code" type="text" placeholder="Title" />
                    @error('title') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="description">Description</label>
                    <input wire:model='description' class="form-control" id="description" type="text" placeholder="Description" />
                    @error('description') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route("internal.master.type") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
        </div>
    </form>
</div>
