@php
    $serviceOne = getContent('service_one.content', true);
    $serviceOneElements = getContent('service_one.element', false);
@endphp


<section class="why-choose py-100">
    <span class="bg--blurr"></span>
    <span class="bg--element-one position-absolute"><img
            src="{{ asset($activeTemplateTrue . '/images/shape/serrvice-bg.png') }}" alt="..."></span>
    <div class="container">
        <div class="row gy-5 justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-content-4 d-flex justify-content-center flex-column align-items-center mb-60">
                    <div class="d-inline-flex heading--wrap">
                        <h6 class="heading text--base text-center text--upper">
                            {{ __($serviceOne->data_values->heading) }}</h6>
                    </div>

                    <h6 class="title wow animate__animated animate__fadeInUp text-center fs--32 fw--700 splite-text"
                        data-splitting data-wow-delay="0.2s">
                        {{ __($serviceOne->data_values->subheading) }}
                    </h6>
                    <p class="subtitle wow animate__animated animate__fadeInUp text-center fs-16 fw--400 w--80"
                        data-wow-delay="0.3s">{{ __(strWords($serviceOne->data_values->description,15)) }}</p>
                </div>
            </div>
        </div>

        <div class="row gy-5 justify-content-center">
            @foreach ($serviceOneElements ?? [] as $item)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="whychoose--card d-flex flex-column justify-content-center align-items-center gap--28"
                        data-aos="zoom-out" data-aos-delay="1100" data-aos-duration="1500">
                        <div class="el"></div>
                        <div class="item--wrap d-flex justify-content-center align-items-center flex-column">
                            <div class="icon--wrap d-flex justify-content-center align-items-center">
                                <img class="icon" src="{{getImage(getFilePath('service_one').'/'.$item->data_values->image)}}" alt="...">
                            </div>
                            <div
                                class="title--wrap d-flex flex-column justify-content-center align-items-center gap--12">
                                <h6 class="title fs--18 fw--600 text-center mb-0">{{__($item->data_values->title)}}</h6>
                                <p class="text-center fs--16">{{__(strWords($item->data_values->description,15))}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
