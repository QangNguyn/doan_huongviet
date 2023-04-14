@extends('layouts.customer')


@section('title')
    Liên hệ
@endsection


@section('content')
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul class="d-flex">
                            <li>
                                <a href="#">Home<i class="fa-solid fa-chevron-right"></i></a>
                            </li>
                            <li><a href="#" class="active">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->

    <div class="map">
        <div class="container">
            <div class="address-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.780360133705!2d105.77931701473173!3d21.041472585991464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454cb37ccf2ef%3A0x9a3258ae096150ce!2zTmfDtSAyNjEgUC4gVHLhuqduIFF14buRYyBIb8OgbiwgROG7i2NoIFbhu41uZyBI4bqtdSwgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWkgMTAwMDAwLCBWaWV0bmFt!5e0!3m2!1sen!2sbd!4v1678073857640!5m2!1sen!2sbd"
                    width="100%" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 contact-mobile">
                    <div class="contact-info">
                        <h3 class="contact-h3">THÔNG TIN LIÊN HỆ</h3>
                        <ul>
                            <li class="contact-li">
                                <i class="fa fa-map-marker"></i>
                                <span class="contact-text">Address</span>
                                {{ $settings->where('key', 'location')->first()->value }}
                            </li>
                            <li class="contact-li">
                                <i class="fa fa-envelope"></i>
                                <span class="contact-text">Phone</span>
                                {{ $settings->where('key', 'phone_number')->first()->value }}
                            </li>
                            <li class="contact-li">
                                <i class="fa fa-mobile"></i>
                                <span class="contact-text">Email</span>
                                {{ $settings->where('key', 'email')->first()->value }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 contact-mobile">
                    <div class="contact-form">
                        <h3 class="contact-h3">
                            <i class="fa-regular fa-envelope contact-icon"></i>Để Lại Lời Nhắn
                        </h3>
                        <div class="row">
                            <form action="{{ route('contact.message') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-form-3">
                                            <input type="text" value="{{ old('name') }}" name="name"
                                                placeholder="Tên (bắt buộc)" class="contact-in" />
                                            @error('name')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-form-3">
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                placeholder="Email (bắt buộc)" class="contact-in" />
                                            @error('email')
                                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="single-form-3">
                                    <textarea name="message" placeholder="Massage" cols="30" rows="10" class="contact-massage">{{ old('massage') }}</textarea>
                                    @error('message')
                                        <div class="alert alert-danger my-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button style="font-size:1.3rem;" type="submit" class="btn btn-primary p-4">Gửi tin
                                    nhắn</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
