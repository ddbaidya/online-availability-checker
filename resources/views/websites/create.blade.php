@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-transparent">
                    <h4 class="mt-4">Add New Website</h4>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <x-error-messages />
                    <form id="formAccountSettings" method="POST" action="{{ route('admin.websites.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="url" class="required form-label">Website URL</label>
                                <input class="form-control" type="text" id="url" name="url" placeholder="debdulal.com" autofocus required />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="active_status" class="form-label">Status</label>
                                <select id="active_status" name="status" class="form-select">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2 float-end">
                            <button type="reset" class="btn btn-outline-secondary me-2 mt-1">Reset</button>
                            <button type="submit" class="btn btn-primary">Create New</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
@endsection
