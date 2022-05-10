@extends('fms')
@section('content')
<div class="content">
    @include('partial.user-nav')
    @include('partial.alert')

    <div class="row g-3 mb-3">
        <div class="col-12">
            <div class="col-sm-12 col-lg-12 mb-4">
                <div class="card text-white" style="background-color: #1E367B">
                    <div class="card-body">
                        <h5 class="mb-0" style="color: #FFF02D">Tracking Shipment</h5>

                        <hr>

                        @if (isset($error) && !empty($error))
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            </div>
                        </div>
                        @endif

                        <form class="row needs-validation" method="GET">
                            <div class="col-4">
                                <select name="number_type" id="number_type" class="form-select">
                                    <option {{ request()->number_type == "S" ? "selected" : "" }} value="S">Shipment Number</option>
                                    <option {{ request()->number_type == "C" ? "selected" : "" }} value="C">Container Number</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input value="{{ request()->shipment_no }}" name="shipment_no" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-light" type="submit">Search</button>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="card h-100">
                <div class="card-body scrollbar ps-2">
                    <div class="row">
                        <div class="col-12">
                            @if ($number_type == "S")
                            @forelse ($tracking_datas as $item)
                            <div class="row g-3 timeline timeline-primary timeline-past pb-card">
                                <div class="col-auto ps-4 ms-2">
                                </div>
                                <div class="col">
                                    <div class="row gx-0 border-bottom pb-card">
                                        <div class="col">
                                            <h6 class="text-800 mb-1">{{ $item->shipment_status }}</h6>
                                            <p class="fs--1 text-600 mb-0">{{ Convert::dateFormat($item->shipment_date, "l, d-m-Y") }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            @endforelse
                            @endif

                            @if ($number_type == "C" && !empty(request()->shipment_no) && !empty($tracking_datas))

                            <div class="col-sm-12 col-lg-12 mb-4">
                                <div class="card border h-100 border-dark">
                                    <div class="card-body">
                                        <div class="card-title">Detailed Events</div>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="">Container Number</label>
                                                    <input type="text" value="{{ $tracking_datas->container_bookmark->cntr_no }}" disabled class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="">Carrier</label>
                                                    <input type="text" value="{{ $tracking_datas->container_bookmark->carrier_no }}" disabled class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="">Status</label>
                                                    <input type="text" value="{{ $tracking_datas->container_bookmark->status }}" disabled class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="">Last Update (UTC)</label>
                                                    <input type="text" value="{{ $tracking_datas->container_bookmark->updated }}" disabled class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12 col-lg-12 mb-4">
                                <div class="card border h-100 border-dark">
                                    <div class="card-body">
                                        <div class="card-title">Container Event Details</div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="overflow-hidden mt-4">
                                                    <div class="tab-pane fade show active" id="tab-event" role="tabpanel" aria-labelledby="event-tab">
                                                        <table class="table table-bordered">
                                                            <thead class="table" style="background-color: #1E367B">
                                                                <tr style="color: white">
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Detailed</th>
                                                                    <th scope="col">Scheduled</th>
                                                                    <th scope="col">Predicted</th>
                                                                    <th scope="col">Actual Time</th>
                                                                    <th scope="col">Location</th>
                                                                </tr>

                                                            </thead>

                                                            <tbody>
                                                                @foreach ($tracking_datas->container_event_list as $item)
                                                                <tr>
                                                                    <td>{{ $item->event_raw }}</td>
                                                                    <td>{{$item->event_type_name}} ({{ $item->event_type_code }})}}</td>
                                                                    <td>{{ !empty($item->event_time_estimated) ? \Carbon\Carbon::parse($item->event_time_estimated)->format("d/m/Y H:i") : "" }}</td>
                                                                    <td>{{ !empty($item->event_time_estimated) ? \Carbon\Carbon::parse($item->event_time_estimated)->format("d/m/Y H:i") : "" }}</td>
                                                                    <td>{{ !empty($item->event_time) ? \Carbon\Carbon::parse($item->event_time)->format("d/m/Y H:i") : "" }}</td>
                                                                    <td>{{$item->location_raw}} ({{ $item->port_name }} - {{ $item->port_code }})</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            </ul>
                            @endif

                            @if (!empty(request()->shipment_no) && empty($tracking_datas))
                            <p class="text-center">No record found</p>
                            @endif

                            @if (empty(request()->shipment_no))
                            <p class="text-center">Type {{ $number_type == "C" ? "container" : "shipment" }} number on search box</p>                           
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
