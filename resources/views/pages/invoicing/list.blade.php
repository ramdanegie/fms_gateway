@extends('fms')
@section('content')
<div class="content">
    @include('partial.user-nav')
    <div class="card-header" style="background-color: #1E367B">
        <h5 class="mb-0" style="color: #FFF02D">Commercial Invoice</h5>
    </div>

    <livewire:datatable.invoicing :page_title="$page_title" />
</div>
@endsection