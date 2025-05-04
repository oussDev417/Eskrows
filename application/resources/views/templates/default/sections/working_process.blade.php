@php
    $workProcess = getContent('working_process.content', true);
    $workProcessElements = getContent('working_process.element', false);
@endphp

<section class="how-it--work pb-100 position-relative"> 
    <div class="container">
        <div class="row gy-5 justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-content-4 d-flex justify-content-center flex-column align-items-center mb-60">
                    <div class="d-inline-flex heading--wrap">

                        <h6 class="heading text--base text-center text--upper">
                            {{ __($workProcess->data_values->heading) }}</h6>
                    </div>

                    <h6 class="title wow animate__animated animate__fadeInUp text-center fs--32 fw--700 splite-text"
                        data-splitting data-wow-delay="0.2s">{{ __($workProcess->data_values->subheading) }}</h6>
                    <p class="subtitle wow animate__animated animate__fadeInUp text-center fs-16 fw--400 w--80"
                        data-wow-delay="0.3s">{{ __(strWords($workProcess->data_values->description,50)) }}</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center justify-content-lg-between gy-4">
            @foreach ($workProcessElements ?? [] as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="how-work--box d-flex flex-column justify-content-center align-items-center position-relative"
                        data-aos="fade-left" data-aos-delay="400" data-aos-duration="1500">
                        <div class="icon-wrap d-flex justify-content-center align-items-center flex-shrink-0 mb-30">
                            @php
                                echo $item->data_values->icon
                            @endphp
                            <span
                                class="steps fs--16 text--black d-flex justify-content-center align-items-center">0{{$loop->iteration}}</span>
                        </div>
                        <div class="content-wrap">
                            <h6 class="title fs--18 fw--600 text-center body--font">{{__($item->data_values->title)}}</h6>
                            <p class="text-center">{{__(strLimit($item->data_values->description,60))}}</p>
                        </div>
                        <div class="bar--wrap">
                            <span></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
