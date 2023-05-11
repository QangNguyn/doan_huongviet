@extends('layouts.admin')


@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Chỉnh sửa sản phẩm</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url('update-product/' . $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="">Tên</label>
                        <input type="text" value="{{ $product->name }}" class="form-control border border-dark p-2"
                            name="name">
                        @error('name')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $product->slug }}" class="form-control border border-dark p-2"
                            name="slug">
                        @error('slug')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="small_description" rows="3" class="form-control border border-dark form-check">{{ $product->small_description }}</textarea>
                        @error('small_description')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Mô tả chi tiết</label>
                        <textarea id="my-editor" name="description" rows="3" class="form-control border border-dark form-check">{{ $product->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thumnail">Hình ảnh</label>
                        <div class="input-group row m-0">
                            <div class="pl-0 pr-4">

                                <input id="thumbnail" value="{{ $product->image }}"
                                    class="form-control @error('thumbnail') is-invalid @enderror" type="hidden"
                                    name="image">
                            </div>
                            <div class="col-3 p-0">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder"
                                        class="btn btn-primary btn-block">
                                        <i class="fas fa-images"></i> Chọn ảnh
                                    </a>
                                </span>

                                <div id="holder" style="margin-top:15px;max-height:100%;">
                                    @php
                                        $thumbnails = explode(',', $product->image);
                                    @endphp
                                    @foreach ($thumbnails as $thumbnail)
                                        <img src="{{ $thumbnail }}" alt=""
                                            style="margin-top:15px;max-width:100%;">
                                    @endforeach
                                </div>
                                <div class="col-12">
                                    @error('image')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Chọn danh mục cha</label>
                        <select class="form-select border border-dark p-2" name="category_id">
                            {{-- <option>Chọn danh mục</option> --}}
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" @if ($item->id == $product->category_id) selected @endif>
                                    {{ $item->name }}</option>
                                @if ($item->children->count() > 0)
                                    @include('layouts.inc.sub', [
                                        'categories' => $item->children,
                                        'text' => '--',
                                        'category' => '',
                                    ])
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Giá gốc</label>
                        <input type="number" value="{{ $product->original_price }}"
                            class="border form-control border-dark p-2" name="original_price">
                        @error('original_price')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Giá khuyến mại</label>
                        <input type="number" value="{{ $product->selling_price }}"
                            class="border form-control border-dark p-2" name="selling_price">
                        @error('selling_price')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Số lượng</label>
                        <input type="number" value="{{ $product->qty }}" class="border form-control border-dark p-2"
                            name="qty">
                        @error('number')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <p>Trạng thái</p>
                        <input type="radio" id="stocking" @if ($product->status == 'stocking') checked @endif name="status"
                            value="stocking">
                        <label for="stocking">Còn hàng</label><br>
                        <input type="radio" @if ($product->status == 'out_of_stock') checked @endif id="out_of_stock"
                            name="status" value="out_of_stock">
                        <label for="out_of_stock">Hết hàng</label><br>
                        @error('status')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Sản phẩm nổi bật</label>
                        <input type="checkbox" class="border border-dark p-2" value="1" name="trending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control border border-dark p-2" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control border border-dark p-2"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control border border-dark p-2"></textarea>
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
