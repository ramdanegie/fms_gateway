@extends('fms-basic')
@section('content')
    <div class="content">
        <div class="card mt-5">
            <div class="card-body position-relative">
                <h6 class="fw-semi-bold ls mb-3 text-uppercase">Agreement Quotation</h6>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Selling Price</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Item Service</th>
                                                <th>Qty</th>
                                                <th>Unit Price</th>
                                                <th>Price</th>
                                                <th>Condition</th>
                                                <th>Item Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse (\App\Models\SellingPrice::all() as $item)
                                        <tr>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->itemSevice }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->unitPrice }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->condition }}</td>
                                            <td>{{ $item->itemType }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7">No Data</td>
                                        </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="list-group mt-5">
                    @if (!empty($fcl->file_documents))
                    <li class="list-group-item d-flex justify-content-between align-items-left">
                        Attachment Quotation
                        <a target="_blank" href="{{ asset("files/{$fcl->file_performa_invoice}") }}" class="btn btn-falcon-primary btn-sm">Open Attachment</a>
                    </li>
                    @endif
                    <!-- <li class="list-group-item d-flex justify-content-between align-items-left">
                        Proforma Invoice/Quotation
                        <a href="#" class="btn btn-link btn-sm"><b>{{ $fcl->value_performa }}</b></a>
                    </li> -->
                    <li class="list-group-item d-flex justify-content-between align-items-left">
                        Status
                        <a href="#" class="btn btn-link btn-sm"><b>
                        @if ($fcl->pi_status == "WR")
                            Waiting User Review
                        @elseif($fcl->pi_status == "OK")
                            Approved
                        @elseif($fcl->pi_status == "RJ")
                            Rejected
                        @endif
                        </b></a>
                    </li>

                    @if (!empty($fcl->issued_reason))
                    <li class="list-group-item d-flex justify-content-between align-items-left">
                        Reason
                        <p>{{ $fcl->issued_reason }}</p>
                    </li>
                    @endif

                    @if ($fcl->pi_status == "WR")
                    <li class="list-group-item d-flex justify-content-between align-items-left">
                        Agree ?
                        <a href="{{ route("edit-quote.quotation-reject", ["quote_type" => $fcl->quote_type, "fcl" => $fcl->id]) }}" class="btn btn-danger btn-sm">Reject</a>
                        <a href="{{ route("edit-quote.quotation-agree", ["quote_type" => $fcl->quote_type, "fcl" => $fcl->id]) }}" class="btn btn-primary btn-sm">Agree</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection
