@extends('layouts.customer')


@section('title')
    Trang không tồn tại
@endsection

@section('content')
    <div class="error">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="error-container text-center">
                        <img src="/images/error.jpg" alt="" />
                        <h3>
                            Ối! Không thể tìm thấy trang bạn tìm kiếm.</h3>
                        <p>
                            Xin lỗi, nhưng trang bạn đang tìm kiếm không được tìm thấy.
                            Vui lòng đảm bảo rằng bạn đã nhập đúng URL hiện tại.
                        </p>
                        <a href="{{route('home')}}">Trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
