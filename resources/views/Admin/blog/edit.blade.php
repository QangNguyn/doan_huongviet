@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Chỉnh sửa bài viết</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="">Tiêu đề bài viết</label>
                        <input value="{{ $blog->name }}" type="text" class="form-control border border-dark form-check"
                            name="name">
                        @error('name')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input value="{{ $blog->slug }}" type="hidden" class="form-control border border-dark form-check"
                            name="slug">
                        @error('slug')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thumnail">Hình ảnh</label>
                        <div class="input-group row m-0">
                            <div class=" pl-0 pr-4">
                                <input id="thumbnail" value="{{ $blog->image }}"
                                    class="form-control @error('thumbnail') is-invalid @enderror" type="hidden"
                                    name="image">
                            </div>
                            <div class="col-3 p-0">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-primary btn-block">
                                        <i class="fas fa-images"></i></i> Chọn ảnh
                                    </a>
                                </span>
                                <div id="holder" style="margin-top:15px;max-height:100%;">
                                    <img src="{{ $blog->image }}" alt="" style="margin-top:15px;max-width:100%;">
                                </div>
                            </div>
                            <div class="col-12">
                                @error('image')
                                    <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Mô tả</label>
                        <textarea name="description" rows="3" class="form-control border border-dark form-check">{{ $blog->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Nội dung bài viết</label>
                        <textarea id="my-editor" name="content" rows="3" class="form-control border border-dark form-check">{{ $blog->content }}</textarea>
                        @error('content')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Tag</label>
                        <select class="form-select form-control js-example-placeholder-single  js-example-templating"
                            multiple="multiple" name="tag_id[]">
                            @foreach ($tags as $tag)
                                <option
                                    @foreach ($blog->tags as $selected)
                                    @if ($tag->id == $selected->id)
                                         selected
                                    @endif @endforeach
                                    value="{{ $tag->id }}"> {{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Lưu bản nháp</label>
                        <input type="checkbox" class="border border-dark p-2" name="is_draft">
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
    <script src="{{ asset('js/tag.js') }}"></script>

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
