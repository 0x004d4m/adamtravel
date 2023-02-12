@extends('website.layout.main')
@section('title', __('menu.blogs'))
@section('content')
<div class="hero overlay">
    <div class="img-bg rellax">
        <img src="{{url('template/images/hero_2.jpg')}}" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="heading" data-aos="fade-up">{{__('menu.blog')}}</h1>
            </div>
        </div>
    </div>
</div>
@include('website.partials.blogs')
@endsection
