<div>
    <div class="col-auto d-flex">
    @if ($paginator->hasPages())
        @if ($paginator->onFirstPage())
        <button wire:click="previousPage" wire:loading.attr="disabled" disabled class="btn btn-sm btn-default" type="button">
            <span>Previous</span>
        </button>
        @else
        <button wire:click="previousPage" wire:loading.attr="disabled" class="btn btn-sm btn-primary" type="button">
            <span>Previous</span>
        </button>
        @endif

        @if ($paginator->hasMorePages())
        <button wire:click="nextPage" wire:loading.attr="disabled" class="btn btn-sm btn-primary px-4 ms-2" type="button">
            <span>Next</span>
        </button>
        @else
        <button wire:click="nextPage" wire:loading.attr="disabled" disabled class="btn btn-sm btn-default px-4 ms-2" type="button">
            <span>Next</span>
        </button>
        @endif
    @endif
    </div>
</div>