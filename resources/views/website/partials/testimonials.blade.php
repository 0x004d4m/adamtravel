<div class="section bg-light">
    <h2 class="heading mb-5 text-center">{{__('sidebar.testimonials')}}</h2>
    <div class="text-center mb-5">
        <div id="prevnext-testimonial">
            <span class="prev me-3" data-controls="prev">
                <span class="icon-chevron-left"></span>
            </span>
            <span class="next" data-controls="next">
                <span class="icon-chevron-right"></span>
            </span>
        </div>
    </div>

    <div class="wide-slider-testimonial-wrap">
        <div class="wide-slider-testimonial">
            @foreach ($Testimonials as $Testimonial)
                <div class="item">
                    <blockquote class="block-testimonial">
                        <div class="author">
                            <img src="{{$Testimonial->image}}" alt="Free template by TemplateUX">
                            <h3>{{$Testimonial->name}}</h3>
                            <p class="position mb-5">{{$Testimonial->position}}</p>
                        </div>
                        <p>
                        <div class="quote">&ldquo;</div>
                        &ldquo;{{$Testimonial->description}}&rdquo;</p>
                    </blockquote>
                </div>
            @endforeach
        </div>
    </div>
</div>
