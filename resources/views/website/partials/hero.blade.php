<div class="hero overlay">
    <div class="img-bg rellax">
        <img src="{{$Hero->image}}" alt="Image" class="img-fluid">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-5">
                <h1 class="heading" data-aos="fade-up">{{$Hero->title}}</h1>
                <p class="mb-5" data-aos="fade-up">{{$Hero->description}}</p>
                <div data-aos="fade-up">
                    <a href="{{$Hero->video}}"
                        class="play-button align-items-center d-flex glightbox3">
                        <span class="icon-button me-3">
                            <span class="icon-play"></span>
                        </span>
                        <span class="caption">{{__('content.watch_video')}}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
