<div class="section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0 order-lg-2" data-aos="fade-up">
                <img src="{{$Section1->image}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">
                <h2 class="heading mb-4">{{$Section1->title}}</h2>
                <p>{!!$Section1->description!!}</p>
                <p class="my-4" data-aos="fade-up" data-aos-delay="200"><a href="/about"
                        class="btn btn-primary">{{__('content.read_more')}}</a></p>
            </div>
        </div>
    </div>
</div>
