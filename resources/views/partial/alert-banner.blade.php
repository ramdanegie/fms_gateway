@if (session()->has('fms_info'))
    <div class="alert alert-info border-2 d-flex align-items-center" role="alert">
        <div class="bg-info me-3 icon-item"><span class="fas fa-info-circle text-white fs-3"></span></div>
        <p class="mb-0 flex-1">{{ session('fms_info') }}</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('fms_error'))
    <div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
        <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
        <p class="mb-0 flex-1">{{ session('fms_error') }}</p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-2 d-flex align-items-center" role="alert">
    <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
    <p class="mb-0 flex-1">
    @foreach ($errors->all() as $error)
        &bull;{{ $error }} <br>
    @endforeach
    </p><button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif