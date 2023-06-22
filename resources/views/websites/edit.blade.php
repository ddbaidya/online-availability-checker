@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header bg-transparent">
                    <h4 class="mt-4">Edit Website</h4>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <x-error-messages />
                    <form id="formAccountSettings" method="POST" action="{{ route('admin.websites.update', $website->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="url" class="required form-label">Website URL</label>
                                <input class="form-control" type="text" id="url" name="url" placeholder="debdulal.com" autofocus required value="{{ $website->url }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="active_status" class="form-label">Status</label>
                                <select id="active_status" name="status" class="form-select">
                                    <option value="1" {{ $website->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $website->status == '0' ? 'selected' : '' }}>Deactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <x-delete-alert buttonId='delete-alert' deleteRoute="{{ route('admin.websites.delete', $website->id) }}" redirectRoute="{{ route('admin.websites') }}" />
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary float-end">Save Change</button>
                                    <button type="reset" class="btn btn-outline-secondary me-2 float-end">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
