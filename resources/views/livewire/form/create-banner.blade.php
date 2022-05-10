<div>
    <div class="row">
        <div class="col-12">
            @include('partial.alert-banner')
        </div>
    </div>
    <form enctype="multipart/form-data" wire:submit.prevent='submit'>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label text-uppercase" for="file_banner">Banner</label>
                    <input wire:model='file_banner' class="form-control" id="file_banner" type="file" />
                    @error('file_banner') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label text-uppercase" for="title">Title</label>
                    <input wire:model='title' class="form-control" id="title" type="text" placeholder="Title" />
                    @error('title') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <a href="{{ route("internal.master.banner") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
            <button class="btn btn-primary btn-sm" type="submit" name="submit">Save</button>
        </div>
    </form>
</div>
