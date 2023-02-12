<div class="section service-section-1">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 mb-4 mb-lg-0">
                <div class="heading-content" data-aos="fade-up">
                    <h2><span class="d-block">{{__('menu.services')}}</span></h2>
                    <p>{{__('content.services_text')}}</p>
                    <p class="my-4" data-aos="fade-up" data-aos-delay="300"><a href="/services" class="btn btn-primary">{{__('content.view_all')}}</a></p>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($Services as $Service)
                        <div class="col-6 col-md-6 col-lg-3 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-1">
                                <span class="icon">
                                    <img src="{{$Service->image}}" alt="Image" class="img-fluid">
                                </span>
                                <div>
                                    <h3>{{$Service->title}}</h3>
                                    <p>{{$Service->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
