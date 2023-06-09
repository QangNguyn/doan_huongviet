@extends('layouts.admin')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Cập nhật danh mục</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('update-category/' . $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control border border-dark p-2" value="{{ $category->name }}"
                            name="name">
                    </div>
                    @error('name')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="hidden" class="form-control border border-dark p-2" value="{{ $category->slug }}"
                            name="slug">
                    </div>
                    @error('slug')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea id="my-editor" name="description" rows="3" class="form-control p-2 border border-dark">{!! $category->description !!} </textarea>
                        @error('description')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Danh mục cha</label>
                        <select class="form-select border border-dark p-2" name="parent_id">
                            <option value='0' @if ($category->parent_id == 0) selected @endif>Chọn danh mục cha
                            </option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @selected(old('category_id') == $item->id) @if ($item->id == $category->parent_id)
                                    selected
                            @endif>
                            {{ $item->name }}</option>
                            @if ($item->children->count() > 0)
                                @include('layouts.inc.sub', [
                                    'categories' => $item->children,
                                    'text' => '--',
                                    'category' => $category,
                                ])
                            @endif
                            @endforeach
                        </select>
                    </div>
                    @error('parent_id')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="thumnail">Hình ảnh</label>
                        <div class="input-group row m-0">
                            <div class=" pl-0 pr-4">
                                <input id="thumbnail" value="{{ $category->image }}"
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
                                    <img src="{{ $category->image }}" alt=""
                                        style="margin-top:15px;max-width:100%;">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
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
