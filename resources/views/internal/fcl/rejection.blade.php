@extends('fms-basic')
@section('content')
    <div class="content">
        <div class="card mt-5">
            <div class="card-body position-relative">
                <form class="row" method="POST">
                    <div class="col-12">
                        <h3>Quotation</h3>
                        <div class="mb-3">
                            <label class="form-label text-uppercase" for="issued_reason">Reject Reason</label>
                            <textarea {{ request()->read_only == 1 ? "disabled" : "required" }} name="issued_reason" class="form-control" id="issued_reason" cols="30" rows="10" placeholder="reason">{{ $fcl->issued_reason }}</textarea>
                        </div>
                    </div>
                    <div class="col-12 text-right">
                        @csrf
                        <button onclick="window.close()" class="btn btn-default">Close</button>
                        <button {{ request()->read_only == 1 ? "disabled" : "" }}  type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection