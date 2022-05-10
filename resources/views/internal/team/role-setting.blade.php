@extends('fms-admin')
@section('content')
    <div class="content">
        @include('partial.admin-nav')
        <div class="card mb-3">
            <div class="card-header" style="background-color: #1E367B">
                <h5 class="mb-0" style="color: #FFF02D">Access for Role : <b>{{ strtoupper($team->title) }}</h5>                
            </div>
            <div class="card-body position-relative">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>TCODE</th>
                                <th>MENU</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($menus as $i => $menu)
                        <tr>
                            <td>{{ $menu['key'] }}</td>
                            <td>{{ $menu['title'] }}</td>
                            <td>
                                @livewire('form.access-role', ['team' => $team, "tcode" => $menu['key']], key($i))
                            </td>
                        </tr>
                        @if (isset($menu['childs']) && !empty($menu['childs']))
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>TCODE</th>
                                            <th>MENU</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($menu['childs'] as $n => $child)
                                    <tr>
                                        <td>{{ $child['key'] }}</td>
                                        <td>{{ $child['title'] }}</td>
                                        <td>
                                            @livewire('form.access-role', ['team' => $team, "tcode" => $child['key']], key($n . $child['key']))
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
