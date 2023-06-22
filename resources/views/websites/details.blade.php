@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pt-5">
                    <h2 class="w-100 text-center">{{ $website->url }}</h2>
                    <div class="d-flex justify-content-center mt-4 mb-2">
                        @if ($website->online_status)
                            <span class="badge badge-pill badge-soft-success fs-5">Online</span>
                        @else
                            <span class="badge badge-pill badge-soft-danger fs-5">Offline</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        Last Update: {{ $website->last_update }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">History</h4>
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
                                    <th class="align-middle">Time and Date</th>
                                    <th class="align-middle">Online Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($histories as $history)
                                    <tr>
                                        <td>{{ $loop->index + $histories->firstItem() }}</td>
                                        <td>{{ $history->check_time }}</td>
                                        <td>
                                            @if ($history->status)
                                                <span class="badge badge-pill badge-soft-success font-size-12">Online</span>
                                            @else
                                                <span class="badge badge-pill badge-soft-danger font-size-12">Offline</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                    {{ $histories->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
