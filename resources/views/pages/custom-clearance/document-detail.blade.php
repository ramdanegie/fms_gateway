@extends('fms-basic')
@section('content')
    <div class="content">
        <div class="card mt-5">
            <div class="card-body position-relative">
                <h6 class="fw-semi-bold ls mb-3 text-uppercase">List Documents</h6>
                <ul class="list-group">
                    @if (!empty($flt->file_documents))
                        @foreach (json_decode($flt->file_documents) as $key => $value)
                            <li class="list-group-item d-flex justify-content-between align-items-left">
                                {{ isset(config('fcl-lang')[$key]) ? config('fcl-lang')[$key] : $key }}
                                <a target="_blank" href="{{ asset("files/{$value}") }}"
                                    class="btn btn-falcon-primary btn-sm">Open Attachment</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
