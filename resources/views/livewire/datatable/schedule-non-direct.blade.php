<div>
    <div class="card-body position-relative">
        <ul class="nav nav-pills" id="pill-myTab-2" role="tablist">
            <li class="nav-item" style="width:50% !important; text-align: center;">
                <a wire:click='setFilterStatus("EX")' class="nav-link {{ $filter_status == 'EX' ? 'active' : '' }}"
                    href="#" aria-controls="pill-tab-quote" aria-selected="true" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight: bold;">EXPORT</a>
            </li>
            <li class="nav-item" style="width:50% !important; text-align: center;">
                <a wire:click='setFilterStatus("IM")' class="nav-link {{ $filter_status == 'IM' ? 'active' : '' }}"
                    href="#" aria-controls="pill-tab-rejected" aria-selected="false" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); font-weight: bold;">IMPORT</a>
            </li>
        </ul>

        <div class="card mb-3 mt-3">
            <div class="card-body position-relative">
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="">Destination / Origin</label>
                            <input wire:model='filter_dest' class="form-control" id="filter_dest" type="text" placeholder="Destination / Origin" />
                            @error('filter_dest') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="mb-3">
                            <label for="filter_etd">ETD</label>
                            <input wire:model='filter_etd' class="form-control datetimepicker" id="filter_etd" type="text" placeholder="d/m/Y" data-options='{"enableTime":false,"dateFormat":"d/m/Y","disableMobile":true}'/>
                            @error('filter_etd') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div id="tableExample">
                    <div class="table-responsive scrollbar">
                        <table class="table table-hover table-striped fs--1 mb-0">
                            <thead class="table" style="background-color: #1E367B">
                                <tr style="color: white">
                                    <th class="sort" data-sort="destination">DESTINATION</th>
                                    <th class="sort" data-sort="vessel">VESSEL</th>
                                    <th class="sort" data-sort="voyage">VOYAGE</th>
                                    <th class="sort" data-sort="stfcls">STF/CLS</th>
                                    <th class="sort" data-sort="etdorigin">ETD ORIGIN</th>
                                    <th class="sort" data-sort="vesconnecting">VES CONNECTING</th>
                                    <th class="sort" data-sort="voyconnecting">VOY CONNECTING</th>
                                    <th class="sort" data-sort="etddestination">ETD DESTINATION</th>
                                    <th class="sort" data-sort="connectingcity">CONNECTING CITY</th>
                                    <th class="sort" data-sort="eta">ETA DESTINATION</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($items as $i => $item)
                                    <tr>
                                        <td>{{ $item->destination }}</td>
                                        <td>{{ $item->vessel }}</td>
                                        <td>{{ $item->voyage }}</td>
                                        <td>{{ $item->stf_cls }}</td>
                                        <td>{{ $item->etd_origin }}</td>
                                        <td>{{ $item->ves_connecting }}</td>
                                        <td>{{ $item->voy_connecting }}</td>
                                        <td>{{ $item->eta_destination }}</td>
                                        <td>{{ $item->city_connecting }}</td>
                                        <td>{{ $item->etd_destination }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">No Data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="row align-items-center mt-3">
                        <div class="pagination d-none"></div>
                        <div class="col">
                            <p class="mb-0 fs--1">
                                <span class="d-none d-sm-inline-block"
                                    data-list-info="data-list-info">{{ $data_from }} to {{ $data_to }} of
                                    {{ $data_all }}</span>
                            </p>
                        </div>
                        <div class="col-auto d-flex">
                            {{ $items->links('partial.simple-paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>