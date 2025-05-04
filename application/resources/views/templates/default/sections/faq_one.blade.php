@php
    $faqOneContent = getContent('faq_one.content', true);
    $faqOneElements = getContent('faq_one.element', false, 6, true);

@endphp

<!-- < faq-section -->
<section class="faq-section pb-100 position-relative">
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <div class="section-content mb-40">
                    <div class="title-wrap">
                        <div class="d-inline-flex heading--wrap">
                            <h6 class="heading fs--18 text--upper fw--700 text--base">
                                {{ __($faqOneContent->data_values->heading) }}</h6>
                        </div>
                        <h2 class="title mb-3 fs--32 fw--800 wow animate__animated animate__fadeInUp splite-text"
                            data-splitting data-wow-delay="0.2s">{{ __($faqOneContent->data_values->subheading) }}</h2>
                        <p class="subtitle w--90">{{ __(strWords($faqOneContent->data_values->description, 15)) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gy-5 justify-content-between">


            <div class="col-lg-5">
                <div class="accordion custom--accordion1 accordion-flush" id="accordionFlushExample">

                    @php
                        $delay = 300;
                    @endphp
                    @foreach ($faqOneElements ?? [] as $item)
                        <div class="accordion-item" data-aos="fade-right" data-aos-delay="{{ $delay = $delay + 100 }}"
                            data-aos-duration="1500">

                            <div class="accordion-header">
                                <div class="bar"></div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{ $loop->iteration }}"
                                    aria-expanded="{{ $loop->iteration == 1 ? 'true' : 'false' }}"
                                    aria-controls="flush-collapse1">
                                    {{ __($item->data_values->question) }}
                                </button>
                            </div>
                            <div id="flush-collapse{{ $loop->iteration }}"
                                class="accordion-collapse collapse {{ $loop->iteration == 1 ? 'show' : '' }}"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    @php
                                        echo $item->data_values->answer;
                                    @endphp

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="about--thumb">
                    <div class="thumb-wrap d-flex justify-content-center align-items-center position-relative">
                        <div class="reveal">
                            <div
                                class="element one position-absolute radius--50 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                        </div>
                        <div class="reveal">
                            <div
                                class="element two position-absolute radius--50 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                        </div>
                        <div class="reveal">
                            <div
                                class="element three position-absolute radius--50 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                        </div>

                        <div class="reveal">
                            <div
                                class="element four position-absolute radius--50 d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-check"></i>
                            </div>
                        </div>

                    </div>
                    <div class="thumb--three" data-aos="zoom-out" data-aos-delay="400" data-aos-duration="1500">
                        <img class="fit--img"
                            src="{{ getImage(getFilePath('faq_one') . '/' . $faqOneContent->data_values->image) }}"
                            alt="...">
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--  faq-section /> -->
