@extends('fms')
@section('content')
<div class="content">
    @include('partial.user-nav')
    <div class="card mb-3">
        <div class="card-header" style="background-color: #1E367B">
            <h5 class="mb-0" style="color: #FFF02D">Draft Document {{ $page_title }}</h5>
        </div>
    </div>

    <livewire:datatable.draft-document :page_title="$page_title" :draft_type="$draft_type" />
</div>
@endsection