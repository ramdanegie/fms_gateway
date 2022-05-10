<div>
    <div class="row">
        <div class="col-12">
            @include('partial.alert-banner')
        </div>
    </div>
    <form wire:submit.prevent='upload' enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label" for="file_xls">File</label>
                    <input wire:model='file_xls' class="form-control" id="file_xls" type="file" />
                    @error('file_xls') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-6">
                <a href="{{ route("internal.master.import-transit") }}" class="btn btn-secondary btn-sm mt-4" type="submit">< Return</a>
                <button class="btn btn-primary btn-sm mt-4" type="submit" name="submit">Save</button>
            </div>
        </div>
    </form>
</div>
