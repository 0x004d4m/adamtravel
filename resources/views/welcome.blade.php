@extends('website.layout.main')
@section('styles')
    <style>
        .image-stack__item--bottom{
            position: absolute;
            right: 10%;
            top: -100%;
            width: 65%;
            z-index: -1;
        }
    </style>
@endsection
@section('title', __('menu.home'))
@section('content')
    @include('website.partials.hero')

    @include('website.partials.section2')

    @include('website.partials.services')

    @include('website.partials.destinations')

    @include('website.partials.section3')

    @include('website.partials.testimonials')

    @include('website.partials.fqa')

    @include('website.partials.blogs')

    @include('website.partials.get_started')
@endsection
