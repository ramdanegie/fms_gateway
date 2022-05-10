@extends('fms-basic')
@section('content')
<div class="content mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="fw-semi-bold ls mb-3 text-uppercase">List Cargo</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped fs--1 mb-0">
                            <thead class="bg-400 text-900">
                                <tr>
                                    <th class="sort" data-sort="no">No</th>
                                    <th class="sort" data-sort="cargoinformation">Cargo Information</th>
                                    <th class="sort" data-sort="cargodescription">Cargo Description</th>
                                    <th class="sort" data-sort="cargodescription">HS Code</th>
                                    <th class="sort" data-sort="unitlength">Unit Length (CM)</th>
                                    <th class="sort" data-sort="unitheight">Unit Height (CM)</th>
                                    <th class="sort" data-sort="unitweight">Unit Weight (KG)</th>
                                    <th class="sort" data-sort="totalunit">Total Unit (Units)</th>
                                    <th class="sort" data-sort="totalvolume">Total Volume</th>
                                    <th class="sort" data-sort="totalweight">Total Weight</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                            @foreach ($cargos as $i => $item)
                            <tr>
                                <td class="no">{{ ($i + 1) }}</td>
                                <td class="cargoinformation">{{ $item->cargo_type }}</td>
                                <td class="cargodescription">{{ $item->cargo_description }}</td>
                                <td class="cargodescription">{{ $item->cargo->hs_code }}</td>
                                <td class="unitlength">{{ $item->cargo_length }}</td>
                                <td class="unitheight">{{ $item->cargo_height }}</td>
                                <td class="unitwidth">{{ $item->cargo_weight }}</td>
                                <td class="unitweight">{{ $item->cargo_total_unit }}</td>
                                <td class="totalunit">{{ $item->cargo_volume }}</td>
                                <td class="totalvolume">{{ $item->cargo_total_weight }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if (!empty($containers))
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="fw-semi-bold ls mb-3 text-uppercase">List Container</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped fs--1 mb-0">
                            <thead class="bg-400 text-900">
                                <tr>
                                    <th class="sort" data-sort="no" style="width: 5%">No</th>
                                    <th class="sort" data-sort="sizecontainer" style="width: 10%">Size Container</th>
                                    <th class="sort" data-sort="typecontainer" style="width: 70%">Type Container</th>
                                    <th class="sort" data-sort="totalcontainer">Total Container</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                            @foreach ($containers as $i => $item)
                            <tr>
                                <td class="no">{{ ($i + 1) }}</td>
                                <td class="sizecontainer">{{ $item->size }}</td>
                                <td class="sizecontainer">{{ $item->type }}</td>
                                <td class="sizecontainer">{{ $item->qty }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection