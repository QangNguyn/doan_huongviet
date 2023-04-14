@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Thêm mới Slider</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="title">Tiêu đề</label>
                        <input type="text" class="form-control border border-dark form-check" value="{{ old('title') }}"
                            id="title" name="title" placeholder="Nhập tiêu đề..." />
                        @error('title')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="col-md-12 mb-3">
                            <label for="">Nội dung slider</label>
                            <textarea id="my-editor" name="content" rows="3" class="form-control border border-dark form-check">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2 mb-6">
                        <label for="text_color">Màu chữ</label>
                        <input type="color" class="form-control border border-dark px-2 h-75"
                            value="{{ old('text_color') }}" id="text_color" name="text_color"
                            placeholder="Nhập màu chữ..." />
                        @error('text_color')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="thumnail">Hình ảnh</label>
                        <div class="input-group row m-0">
                            <div class="pl-0 pr-4">
                                <input id="thumbnail"
                                    class="form-control border border-dark form-check @error('thumbnail') is-invalid @enderror"
                                    type="hidden" name="image">
                            </div>
                            <div class="col-3 p-0">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-primary btn-block">
                                        <i class="fa fa-picture-o"></i> Chọn ảnh
                                    </a>
                                </span>

                                <div id="holder" class="mx-auto" style="margin-top:15px;max-height:100%;"></div>

                            </div>
                            <div class="col-12">
                                @error('image')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="url_btn">Link button</label>
                        <input type="text" class="form-control border border-dark form-check"
                            value="{{ old('url_btn') }}" id="url_btn" name="url_btn" placeholder="Nhập link..." />
                        @error('url_btn')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="content_btn">Nội dung button</label>
                        <input type="text" class="form-control border border-dark form-check"
                            value="{{ old('content_btn') }}" id="content_btn" name="content_btn"
                            placeholder="Nhập nội dung..." />
                        @error('content_btn')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
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
