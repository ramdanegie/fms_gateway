<div>
    <div class="row">
        <div class="col-12">
            @include('partial.alert-banner')
        </div>
    </div>
    <form wire:submit.prevent='submit'>

        <div style="width: 50%; display: table;">
            <div style="display: table-row; height: 100px;">
                <div style="width: 50%; display: table-cell;">

                    <div class="col-sm-12 col-lg-11 mb-4">
                        <div class="card text-gray" style="background-color: #FFF02D">
                            <div class="card-body">
                                <div class="card-title">Info Cargo</div>
                                <div class="col-10">
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Cargo Description</label>
                                        <input wire:model='description' class="form-control" id="description" type="text" placeholder="Cargo Description" />
                                        @error('description') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="mb-3">
                                        <label class="form-label" for="type">Type of Cargo</label>
                                        <select class="form-control" id="type" wire:model='type'>
                                            <option value="">- Choose -</option>
                                            @foreach ($cargo_types as $i => $item)
                                            <option wire:key='type.{{ $i }}' value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('type') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="mb-3">
                                        <label class="form-label" for="hs_code">HS Code</label>
                                        <input wire:model='hs_code' class="form-control" id="hs_code" type="text" placeholder="HS Code" />
                                        @error('hs_code') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="display: table-cell;">
                    <div class="col-sm-12 col-lg-12 mb-4">
                        <div class="card text-white" style="background-color: #1E367B">
                            <div class="card-body">
                                <div class="card-title">Measurement</div>
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="length">Unit Length (CM)</label>
                                        <input wire:model='length' class="form-control" id="length" type="text" placeholder="Unit Length" />
                                        @error('length') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="height">Unit Height (CM)</label>
                                        <input wire:model='height' class="form-control" id="height" type="text" placeholder="Unit Height" />
                                        @error('height') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="depth">Unit Depth (CM)</label>
                                        <input wire:model='depth' class="form-control" id="depth" type="text" placeholder="Unit Depth" />
                                        @error('depth') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="weight">Unit Weight (KG)</label>
                                        <input wire:model='weight' class="form-control" id="weight" type="text" placeholder="Unit Weight" />
                                        @error('weight') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">            
                <a href="{{ route("master.cargo") }}" class="btn btn-secondary btn-sm" type="submit">< Return</a>
                <button class="btn btn-primary btn-sm" type="submit" name="submit">Update</button>
            </div>
        </div>
    </form>
</div>

@push('script')
<script>
    $("#hs_code").mask("9999.99.99", {clearIfNotMatch: true});
</script>
@endpush