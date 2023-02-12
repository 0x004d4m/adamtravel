@extends('website.layout.main')
@section('title', __('menu.sites'))
@section('content')
<div class="hero overlay">
    <div class="img-bg rellax">
        <img src="{{url('template/images/hero_2.jpg')}}" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6 mx-auto text-center">
                <h1 class="heading" data-aos="fade-up">{{__('menu.sites')}}</h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto text-center">
                <div class="heading-content" data-aos="fade-up">
                    <h2 class="heading">{{__('content.sites')}}</h2>
                    <p>{{__('content.sites_text')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($Sites as $Site)
                <div class="col-lg-3 text-center">
                    <a class="person">
                        <img src="{{$Site->image}}" alt="Image" class="img-fluid mb-4">
                        <span class="subheading d-inline-block">{{$Site->location}}</span>
                        <h3 class="mb-3">{{$Site->name}}</h3>
                        <p class="my-4" data-aos="fade-up" data-aos-delay="300"><a class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal{{$Site->id}}" >{{__('content.read_more')}}</a></p>
                    </a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$Site->id}}" tabindex="-1" aria-labelledby="site_name" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="site_name">{{$Site->name}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">{!!$Site->description!!}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
