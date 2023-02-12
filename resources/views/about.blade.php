@extends('website.layout.main')
@section('styles')
<style>
    .image-stack__item--bottom{
        position: absolute;
        right: 10%;
        top: -75%;
        width: 65%;
        z-index: -1;
    }
</style>
@endsection
@section('title', __('menu.about'))
@section('content')
<div class="hero overlay">
    <div class="img-bg rellax">
        <img src="{{$Hero->image}}" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="heading" data-aos="fade-up">{{$Hero->title}}</h1>
            </div>
        </div>
    </div>
</div>
@include('website.partials.section4')
@include('website.partials.services')
@include('website.partials.team')
{{-- @include('website.partials.open_positions') --}}
@endsection
