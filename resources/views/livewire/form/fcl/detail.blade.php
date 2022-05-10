<div>
    @include('partial.alert-banner')
    <form wire:submit.prevent='submit'>
        <div class="tab-pane {{ ($form_page == "page-2" ? "active" : "") }} px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab2" id="bootstrap-wizard-validation-tab2">
            <div id="form_details">
                <div class="row g-2">
                    @if (in_array($quote_type, ["ftl"]))
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div
                                    style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Truck</span>
                                </div>
                                <div class="row g-2">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="truck_id">Truck Type</label>
                                            <select wire:model='truck_id' class="form-select" id="truck_id">
                                                <option value="">- Choose -</option>
                                                @foreach ($trucks as $truck)
                                                <option value="{{ $truck->id }}">{{ $truck->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="qty_unit"> Total Unit
                                                <span class="badge rounded-pill bg-secondary">Units</span>
                                            </label>
                                            <input wire:model='qty_unit' class="form-control" type="number" min="0" placeholder="Total Unit" id="qty_unit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (in_array($quote_type, ["fcl"]) || ($quote_type == "ftl" && $fullContainerLoad->trade_type != "DOM"))
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Container</span>
                                </div>

                                @foreach ($frm_container as $i => $val)
                                <div id="root_party.{{ $val }}">
                                    <div class="row g-2" id="party.{{ $val }}">
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="size.{{ $val }}">Size Container</label>
                                                <select wire:model='size.{{ $val }}' class="form-select" aria-label="Size Container" id="size.{{ $val }}">
                                                    <option value="">- Choose -</option>
                                                @foreach ($size_containers as $item)
                                                    <option wire:key='size.{{ $val }}{{ $item->value }}' value="{{ $item->value }}">{{ $item->display }}</option>
                                                @endforeach
                                                </select>
                                                @error('size.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="type.{{ $val }}">Type Container</label>
                                                <select wire:model='container_type.{{ $val }}' class="form-select" aria-label="Type Container" id="type.{{ $val }}">
                                                    <option value="">- Choose -</option>
                                                @foreach ($type_containers as $item)
                                                    <option wire:key='container_type.{{ $val }}{{ $item->title }}' value="{{ $item->title }}">{{ $item->description }}</option>
                                                @endforeach
                                                </select>
                                                @error('container_type.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="qty.{{ $val }}">Total Container</label>
                                                <input wire:model='qty.{{ $val }}' class="form-control" type="number" min="0" name="totalcontainer" placeholder="Total Container" id="qty.{{ $val }}" />
                                                @error('qty.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        @if ($edit_mode != 2)                                            
                                        <div class="col-12 text-right" id="area_rem_multiple_container.{{ $val }}">
                                            <button wire:click='removeFormContainer({{$i}})' type="button" id="rem_multiple_container.{{ $val }}" class="btn btn-sm btn-danger">Remove Container</button>
                                            <hr>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach

                                @if (!empty($frm_container) && $edit_mode != 2)
                                <div class="d-flex justify-content-left">
                                    <button wire:click='addFormContainer({{ $frm_cidx }})' type="button" id="add_multiple_container" class="btn btn-sm btn-primary">Add Multiple Container</button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (in_array($quote_type, ["ccl"]))
                    <div class="col-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Cargo Value</span>
                                </div>
                                <div class="row g-2">
                                    <label class="form-label">Cargo Value</label>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <select wire:model='cargo_cur' class="form-select" id="insurance"  data-options='{"placeholder":true}'>
                                                <option value="">- Choose -</option>
                                                <option value="IDR">IDR</option>
                                                <option value="USD">USD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <input wire:model='cargo_amount' id="amount" class="form-control" type="text" placeholder="Value" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Freight Value</span>
                                </div>
                                <div class="row g-2">
                                    <label class="form-label">Freight Value</label>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <select wire:model='freight_cur' class="form-select" id="insurance"  data-options='{"placeholder":true}'>
                                                <option value="">- Choose -</option>
                                                <option value="IDR">IDR</option>
                                                <option value="USD">USD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <input wire:model='freight_amount' id="amount" class="form-control" type="text" placeholder="Value" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if (!in_array($quote_type, ["ftl"]))
                    <div class="col-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div
                                    style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                    <span class="badge bg-dark dark__bg-dark">Insurance</span>
                                </div>
                                <div class="row g-2">
                                    <label
                                        class="form-label">Insurance&nbsp;<small>(Optional)</small></label>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <select wire:model='insurance_cur' class="form-select" id="insurance" data-options='{"placeholder":true}'>
                                                <option value="">- Choose -</option>
                                                <option value="IDR">IDR</option>
                                                <option value="USD">USD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <input wire:model='insurance_amount' id="amount" class="form-control" type="text" placeholder="Value" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                @foreach ($frm_cargo as $i => $val)
                <div id="form_area.{{ $i }}">
                    <div class="row g-2">
                        <div class="col-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div style="width: 100%; height: 24px; margin-bottom: 10px; margin-top 5px; border-bottom: 2px solid gray; text-align: left">
                                        <span class="badge bg-dark dark__bg-dark">Cargo</span>
                                    </div>

                                    <div class="col-10">
                                        <div class="mb-3">
                                            <label for="cargo-description">Cargo Description</label>&nbsp;
                                            <select wire:model='cargo_id.{{ $val }}' wire:change='changeCargo($event.target.value, {{ $val }})' class="form-select" id="cargo-description.{{ $val }}">
                                                <option value="">Select</option>
                                                @foreach ($cargos as $cargo)
                                                <option wire:key='cargo_id.{{ $val }}{{ $cargo->id }}' value="{{ $cargo->id }}">{{ $cargo->description }}</option>
                                                @endforeach
                                            </select>
                                            @error('cargo_id.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="mb-3">
                                            <label class="form-label" for="cargo_type.{{ $val }}">Type of Cargo</label>
                                            <input wire:model='cargo_type.{{ $val }}' class="form-control" type="text" placeholder="Cargo type" id="cargo_type.{{ $val }}" />
                                            @error('cargo_type.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="mb-3">
                                            <label class="form-label" for="cargo_hs_code.{{ $val }}">HS Code</label>
                                            <input wire:model='cargo_hs_code.{{ $val }}' class="form-control" type="text" placeholder="HS Code" id="cargo_hs_code.{{ $val }}" />
                                            @error('cargo_hs_code.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    @if (isset($cargo_type[$val]) && $cargo_type[$val] == "Dangerous Goods")
                                    <div class="col-10">
                                        <div class="mb-3">
                                            <label class="form-label" for="file_msds.{{ $val }}">MSDS (Material Safety Data Sheet)</label>
                                            <input wire:model='file_msds.{{ $val }}' class="form-control" type="file" placeholder="File MSDS" id="file_msds.{{ $val }}" />
                                            @error('file_msds.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    @endif

                                    @if ($quote_type == "breakbulk")
                                    <div class="col-10">
                                        <div class="mb-3">
                                            <label class="form-label" for="file_cargo_image.{{ $val }}">Cargo Image</label>
                                            <input id="file_cargo_image.{{ $val }}" type="file" class="form-control" name="file" wire:model='file_cargo_image.{{ $val }}'/>
                                        </div>
                                        @error('file_cargo_image.{{ $val }}') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-8">
                            <div class="card mb-3" id="card_measurement.{{ $i }}">
                                <div class="card-body">
                                    <div
                                        style="width: 100%; height: 24px; margin-bottom: 10px; border-bottom: 2px solid gray; text-align: left">
                                        <span class="badge bg-dark dark__bg-dark">Measurement</span>
                                    </div>
                                    <div class="row g-2">
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="unit-length.{{ $val }}">Unit Length</label>&nbsp;<span class="badge rounded-pill bg-secondary">CM</span>
                                                <input {{ isset($is_volume[$val]) && $is_volume[$val] == 1 ? "readonly" : "" }} wire:model='cargo_length.{{ $val }}' class="form-control" type="number" min="0" placeholder="Unit Length" id="unit-length.{{ $val }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="unit-height.{{ $val }}">Unit Height</label>&nbsp;
                                                <span class="badge rounded-pill bg-secondary">CM</span>
                                                <input {{isset($is_volume[$val]) &&  $is_volume[$val] == 1 ? "readonly" : "" }} wire:model='cargo_height.{{ $val }}' class="form-control" type="number" min="0" placeholder="Unit Height" id="unit-height.{{ $val }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="unit-depth.{{ $val }}">Unit Depth</label>&nbsp;
                                                <span class="badge rounded-pill bg-secondary">CM</span>
                                                <input {{ isset($is_volume[$val]) && $is_volume[$val] == 1 ? "readonly" : "" }} wire:model='cargo_depth.{{ $val }}' class="form-control" type="number" min="0" placeholder="Unit Depth" id="unit-depth.{{ $val }}" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="total-volume.{{ $val }}">Total Volume</label>&nbsp;
                                                <span class="badge rounded-pill bg-secondary">M3</span>
                                                <input {{ isset($is_volume[$val]) && $is_volume[$val] == 1 ? "" : "readonly" }} wire:model="cargo_volume.{{ $val }}" class="form-control" type="text" min="0" placeholder="Total Volume" id="total-volume.{{ $val }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="total-unit.{{ $val }}">Total Unit</label>&nbsp;
                                                <span class="badge rounded-pill bg-secondary">Units</span>
                                                <input wire:model='cargo_total_unit.{{ $val }}' class="form-control" type="number" min="0" placeholder="Total Unit" id="total-unit.{{ $val }}" />
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="unit-weight.{{ $val }}">Unit Weight</label>&nbsp;
                                                <span class="badge rounded-pill bg-secondary">KG</span>
                                                <input {{ isset($is_volume[$val]) && $is_volume[$val] == 1 ? "readonly" : "" }} wire:model='cargo_weight.{{ $val }}' class="form-control" type="number" min="0" placeholder="Unit Weight" id="unit-weight.{{ $val }}" />
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="total-weight.{{ $val }}">Total Weight</label>&nbsp;
                                                <span class="badge rounded-pill bg-secondary">KG</span>
                                                <input {{ isset($is_weight[$val]) && $is_weight[$val] == 1 ? "" : "readonly" }} wire:model="cargo_total_weight.{{ $val }}" class="form-control" type="number" min="0" placeholder="Total Weight" id="cargo_total_weight.{{ $val }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2">
                                        <div class="col-4">
                                            <div class="form-check form-switch">
                                                <input wire:model='is_volume.{{ $val }}' class="form-check-input" id="chk_volume_only.{{ $val }}" type="checkbox" />
                                                <label class="form-check-label" for="chk_volume_only.{{ $val }}">Enter Total Volume Only</label>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-check form-switch">
                                                <input wire:model='is_weight.{{ $val }}' class="form-check-input" id="is_weight.{{ $val }}" type="checkbox" />
                                                <label class="form-check-label" for="is_weight.{{ $val }}">Enter Total Weight Only</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($edit_mode != 2)
                        <div class="col-12 text-right" id="area_rem_cargo.{{ $val }}">
                            <button wire:click='removeFormCargo({{ $i }})' type="button" id="rem_cargo.{{ $val }}" class="btn btn-sm btn-danger">Remove Cargo</button>
                        </div>
                        @endif
                        <hr>
                    </div>
                </div>
                @endforeach
            </div>

            @if (!empty($frm_cargo) && $edit_mode != 2)
            <div class="d-flex justify-content-center">
                <button wire:click='addFormCargo({{ $frm_cargo_i }})' type="button" id="add_cargo" class="btn btn-sm btn-primary">Add More Cargo</button>
            </div>
            @endif
        </div>

        @if ($edit_mode != 2)
        <div class="card-footer bg-light">
            <div class="px-sm-3 px-md-5">
                <ul class="pager wizard list-inline mb-0">
                    <li class="previous"></li>
                    <li class="next">
                        <button id="btn_next" class="btn btn-primary px-5 px-sm-6" type="submit">
                        @if (empty($redir))
                        Update
                        @else
                        Next <span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"></span>
                        @endif
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        @endif

        {{-- <div wire:loading.delay.long><div id="cover-spin"></div></div> --}}
    </form>
</div>

@push('script')
<script>
document.addEventListener("DOMContentLoaded", () => {
    $("input[id^='cargo_hs_code']").mask("9999.99.99", {clearIfNotMatch: true});
    Livewire.hook('element.updated', (el, component) => {
        $("input[id^='cargo_hs_code']").mask("9999.99.99", {clearIfNotMatch: true});
    });

    @if($edit_mode == 2)
    setTimeout(() => {
        $("input, select").prop("disabled", true);
    }, 60);
    @endif
});
</script>
@endpush