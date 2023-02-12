<div class="section">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <img src="{{$FQA->image}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                <h2 class="heading mb-5">{{$FQA->title}}</h2>
                <div class="custom-accordion" id="accordion_1">
                    @foreach ($Fqas as $Fqa)
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne{{$Fqa->id}}" aria-expanded="false" aria-controls="collapseOne{{$Fqa->id}}">{{$Fqa->question}}</button>
                            </h2>
                            <div id="collapseOne{{$Fqa->id}}" class="collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordion_1">
                                <div class="accordion-body">{{$Fqa->answer}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
