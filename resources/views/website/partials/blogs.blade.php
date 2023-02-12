<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12"data-aos="fade-up" data-aos-delay="0">

                <h2 class="heading mb-5">Recent Posts</h2>
            </div>
        </div>
        <div class="row align-items-stretch">
            @foreach ($Posts as $Post)
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="media-entry">
                        <a href="/blog/{{$Post->id}}">
                            <img src="{{$Post->image}}" alt="Image" class="img-fluid">
                        </a>
                        <div class="bg-white m-body">
                            <span class="date">{{$Post->created_at}}</span>
                            <h3><a href="/blog/{{$Post->id}}">{{$Post->name}}</a></h3>
                            <p>{{$Post->description}}</p>
                            <a href="/blog/{{$Post->id}}" class="more d-flex align-items-center float-start">
                                <span class="label">{{__('content.read_more')}}</span>
                                <span class="arrow"><span class="icon-keyboard_arrow_right"></span></span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
