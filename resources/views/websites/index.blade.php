@extends('master')
@section('content')
    <x-action-message />
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Website List</h4>

                <div class="page-title-right">
                    <a href="{{ route('admin.websites.create') }}" class="btn btn-primary d-flex align-items-center"><i class='bx bx-plus-circle me-1'></i> Add New</a>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive mb-4">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">SL.</th>
                                    <th class="align-middle">Website</th>
                                    <th class="align-middle">Online Status</th>
                                    <th class="align-middle">Last Offline</th>
                                    <th class="align-middle">Last Update</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($websites as $website)
                                    <tr>
                                        <td>{{ $loop->index + $websites->firstItem() }}</td>
                                        <td>{{ $website->url }}</td>
                                        <td>
                                            @if ($website->online_status)
                                                <span class="badge badge-pill badge-soft-success font-size-12">Online</span>
                                            @else
                                                <span class="badge badge-pill badge-soft-danger font-size-12">Offline</span>
                                            @endif

                                        </td>
                                        <td>
                                            {{ $website->last_offline }}
                                        </td>
                                        <td>
                                            {{ $website->last_update }}
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                    {{ $websites->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
