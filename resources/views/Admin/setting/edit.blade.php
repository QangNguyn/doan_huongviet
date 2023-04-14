@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thêm mới cấu hình</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('setting.update', $setting->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="">Key</label>
                        <input value="{{ $setting->key }}" type="text" class="form-control border border-dark p-2"
                            name="key">
                        @error('key')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Value</label>
                        <input value="{{ $setting->value }}" type="text" class="form-control border border-dark p-2"
                            name="value">
                        @error('value')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
