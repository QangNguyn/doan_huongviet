@extends('layouts.customer')


@section('title')
    Về chúng tôi
@endsection


@section('content')
    <div class="py-5"></div>
    <div class="container p-2 my-2">
        {!! $aboutUs->content !!}
    </div>
    <div class="py-5"></div>
@endsection
