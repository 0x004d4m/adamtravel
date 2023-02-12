<div class="section section-3" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="row align-items-center justify-content-between  mb-5">
            <div class="col-lg-5" data-aos="fade-up">
                <h2 class="heading mb-3">{{__('content.destinations_title')}}</h2>
                <p>{{__('content.destinations_text')}}</p>
            </div>
            <div class="col-lg-5 text-md-end" data-aos="fade-up" data-aos-delay="100">
                <div id="destination-controls">
                    <span class="prev me-3" data-controls="prev">
                        <span class="icon-chevron-left"></span>
                    </span>
                    <span class="next" data-controls="next">
                        <span class="icon-chevron-right"></span>

                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="destination-slider-wrap px-5">
        <div class="destination-slider">
            @foreach ($Destinations as $Destination)
                <div class="destination">
                    <div class="thumb">
                        <img src="{{$Destination->image}}" alt="Image" class="img-fluid">
                    </div>
                    <div class="mt-4">
                        <h3><a>{{$Destination->title}}</a></h3>
                        <span class="meta">{{$Destination->description}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
