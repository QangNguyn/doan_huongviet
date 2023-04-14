@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Cập nhật logo</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('logo.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3 d-none">
                        <label for="">Mô tả chi tiết</label>
                        <textarea id="my-editor" type="hidden" rows="3" class="form-control border border-dark form-check">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group  mb-3">

                        <div class="input-group row m-0">
                            <div class="pl-0 pr-4">
                                <input id="thumbnail"
                                    value="@if (isset($setting->logo)) {{ $setting->logo }} @else '' @endif"
                                    class="form-control @error('thumbnail') is-invalid @enderror" type="hidden"
                                    name="logo">
                            </div>
                            <div class="col-3 p-0">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-primary btn-block">
                                        <i class="fas fa-images"></i> Chọn ảnh
                                    </a>
                                </span>

                                <div id="holder" style="margin-top:15px;max-height:100%;">
                                    @if (isset($setting->logo))
                                        <img src="{{ $setting->logo }}" alt=""
                                            style="margin-top:15px;max-width:100%;">
                                    @endif
                                </div>
                                <div class="col-12">
                                    @error('image')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 mt-6">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('js/slug.js') }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: "/laravel-filemanager?type=Images",
            filebrowserImageUploadUrl: "/laravel-filemanager/upload?type=Images&_token=",
            filebrowserBrowseUrl: "/laravel-filemanager?type=Files",
            filebrowserUploadUrl: "/laravel-filemanager/upload?type=Files&_token=",
        };
        CKEDITOR.replace("my-editor", options);

        $("#lfm").filemanager("image");
        var route_prefix = "url-to-filemanager";
    </script>
@endsection
