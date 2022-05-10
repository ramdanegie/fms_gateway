<div>
    <div class="d-flex">
        <div class="form-check me-3">
            <input wire:model="can_view" wire:click='setCanView' class="form-check-input" id="{{ $tcode }}_can_view" type="checkbox" value="" />
            <label class="form-check-label" for="{{ $tcode }}_can_view">View</label>
        </div>
        <div class="form-check me-3">
            <input wire:model="can_create" wire:click='setCanCreate' class="form-check-input" id="{{ $tcode }}_can_create" type="checkbox" value="" />
            <label class="form-check-label" for="{{ $tcode }}_can_create">Create</label>
        </div>
        <div class="form-check me-3">
            <input wire:model="can_edit" wire:click='setCanEdit' class="form-check-input" id="{{ $tcode }}_can_edit" type="checkbox" value="" />
            <label class="form-check-label" for="{{ $tcode }}_can_edit">Edit</label>
        </div>
        <div class="form-check">
            <input wire:model="can_delete" wire:click='setCanDelete' class="form-check-input" id="{{ $tcode }}_can_delete" type="checkbox" value="" />
            <label class="form-check-label" for="{{ $tcode }}_can_delete">Delete</label>
        </div>
    </div>
</div>
