@php
    $testimonialOneContent = getContent('testimonial_one.content', true);
    $testimonialOneElements = getContent('testimonial_one.element', false, 10);
@endphp

<!-- < testimonial-section -->
<section class="testimonial-section pb-60">
    <span class="bg--blurr-two"></span>
    <div class="container">
        <div class="row gy-5 justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-content-4 d-flex justify-content-center flex-column align-items-center mb-60">
                    <div class="d-inline-flex heading--wrap">
                        <h6 class="heading text--base text-center text--upper">
                            {{ __($testimonialOneContent->data_values->heading) }}</h6>
                    </div>
                    <h6 class="title wow animate__animated animate__fadeInUp text-center fs--32 fw--700 splite-text"
                        data-splitting data-wow-delay="0.2s">{{ __($testimonialOneContent->data_values->subheading) }}
                    </h6>
                    <p class="subtitle wow animate__animated animate__fadeInUp text-center fs-16 fw--400 w--80"
                        data-wow-delay="0.3s">{{ __(strWords($testimonialOneContent->data_values->description,15)) }}</p>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row testimonial-slider">
                    @foreach ($testimonialOneElements ?? [] as $item)
                        <div class="card--wrap">
                            <div class="testimonial-card d-flex">
                                <div
                                    class="item--wrap d-flex flex-column justify-content-center align-items-center position-relative">
                                    <div class="d-flex justify-content-center align-items-center w--100">
                                        <div class="d-flex flex-column align-items-center gap--16">
                                            <div class="user--thumb position-relative d-flex">
                                                <img class="fit--img"
                                                    src="{{ getImage(getFilePath('testimonial_one') . '/' . $item->data_values->client_img) }}"
                                                    alt="...">
                                            </div>
                                            <div
                                                class="user--info d-flex flex-column justify-content-center align-items-center">
                                                <h6 class="fs--20 text-start fw--700 mb-0">
                                                    {{ $item->data_values->name }}</h6>
                                                <p class="fs--16 mb-3">{{ $item->data_values->location }}</p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="content-wrap">
                                        <p class="description text-center fs--18 fw--500 mb-2">
                                            {{ __(strWords($item->data_values->description,15)) }}</p>
                                    </div>

                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <img src="{{ asset($activeTemplateTrue . '/' . 'images/shape/testemonial-icon.png') }}"
                                            alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--  testimonial-section /> -->
