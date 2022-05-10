@extends(auth()->user()->isAdmin() ? 'fms-admin' : 'fms')
@section('content')
<div class="content">
    @include('partial.user-nav')
    <div class="card mb-3">
        <div class="card-header">
            <div class="card-header" style="background-color: #1E367B">
                <h5 class="mb-0" style="color: #FFF02D">List Open Ticket</h5>
            </div>

            @include('partial.alert')
        </div>
        <div class="card-body position-relative">
            <livewire:datatable.ticket :admin="auth()->user()->isAdmin()"/>
        </div>
    </div>
</div>
@endsection
