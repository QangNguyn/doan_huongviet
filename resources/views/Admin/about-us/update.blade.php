@extends('layouts.admin')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Cập nhật nội dung trang về chúng tôi</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('about-us.update', 1) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Nội dung</label>
                        <textarea id="my-editor" name="content" rows="3" class="form-control p-2 border border-dark">
                            @isset($aboutUs)
{!! $aboutUs->content !!}
@endisset
                        </textarea>
                        @error('content')
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
