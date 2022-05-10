@extends('fms-basic')
@section('content')
    <div class="content">
        <div class="card mt-5">
            <div class="card-body position-relative">
                <div class="card-header" style="background-color: #1E367B">
                <h5 class="mb-0" style="color: #FFF02D">Draft Document History</h5>
            </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Doc Status</th>
                                <th>Draft Type</th>
                                <th>File</th>
                                <th>Remark</th>
                                <th>File Upload at</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $i => $item)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ @$item->user->name }} ({{ $item->is_admin == 1 ? "Admin" : "User" }})</td>
                                <td>{{ $item->is_update == 1 ? "Update" : "New" }}</td>
                                <td>{{ json_decode($item->detail)->draft_type }}</td>
                                <td>
                                    <a href="{{ asset("files/" . @json_decode($item->detail)->file_attachments) }}" target="_blank">Open File</a>
                                </td>
                                <td>
                                    {{ @json_decode($item->detail)->remark }}
                                </td>
                                <td>{{ @json_decode($item->detail)->created_at }}</td>
                                <td>{{ $item->created_at }}</td>
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
@endsection
