<div class="section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto text-center">
                <div class="heading-content" data-aos="fade-up">
                    <h2 class="heading">{{__('content.team')}}</h2>
                    <p>{{__('content.team_text')}}</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($Members as $Member)
                <div class="col-lg-3">
                    <a class="person">
                        <img src="{{$Member->image}}" alt="Image" class="img-fluid mb-4">
                        <span class="subheading d-inline-block">{{$Member->position}}</span>
                        <h3 class="mb-3">{{$Member->name}}</h3>
                        <p class="text-muted">{{$Member->about}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
