
<div class="section section-2">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0">
                <div class="image-stack mb-5 mb-lg-0">
                    <div class="image-stack__item image-stack__item--bottom" data-aos="fade-up">
                        <img src="{{$Section3->image}}" alt="Image" class="img-fluid rellax ">
                    </div>
                    <div class="image-stack__item image-stack__item--top" data-aos="fade-up" data-aos-delay="100"
                        data-rellax-percentage="0.5">
                        <img src="{{$Section3->image2}}" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
            <div class="col-lg-4 order-lg-1">

                <div>
                    <h2 class="heading mb-3" data-aos="fade-up" data-aos-delay="100">{{$Section3->title}}</h2>

                    <p data-aos="fade-up" data-aos-delay="200">{!!$Section3->description!!}</p>

                    <p class="my-4" data-aos="fade-up" data-aos-delay="300"><a href="/about"
                            class="btn btn-primary">{{__('content.read_more')}}</a></p>
                </div>
            </div>

        </div>

    </div>
</div>
