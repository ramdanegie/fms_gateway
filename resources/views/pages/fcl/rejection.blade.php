@extends('fms-basic')
@section('content')
    <div class="content">
        <div class="card mt-5">
            <div class="card-body position-relative">
                <form class="row" method="POST">
                    <div class="col-12">
                        <h3>Proforma Invoice/Quotation</h3>
                        <div class="mb-3">
                            <label class="form-label text-uppercase" for="issued_reason">Reject Reason</label>
                            <textarea required name="issued_reason" class="form-control" id="issued_reason" cols="30" rows="10" placeholder="reason"></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-right">
                        @csrf
                        <a href="{{ route("edit-quote.quotation", ["quote_type" => $fcl->quote_type, "fcl" => $fcl->id]) }}" class="btn btn-default">< Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
