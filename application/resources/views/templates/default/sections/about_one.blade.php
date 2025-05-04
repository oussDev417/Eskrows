@php
    $aboutOne = getContent('about_one.content', true);
    $aboutOneElements = getContent('about_one.element', false, 3);
    $pages = App\Models\Page::get();
@endphp

<section class="about-us py-100">
    <div class="container">
        <div class="row gy-5 flex-wrap-reverse">
            <div class="col-lg-6 col-md-12 d-flex flex-column justify-content-center">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-content mb-40">
                            <div class="title-wrap">
                                <div class="row justify-content-between">
                                    <div class="col-xl-10 col-lg-12">
                                        <div class="d-inline-flex heading--wrap">
                                            <h6 class="heading fs--18 text--upper fw--700 text--base">
                                                {{ __($aboutOne->data_values->title) }}</h6>
                                        </div>

                                        <h2 class="title mb-3 fs--32 fw--800 wow animate__animated animate__fadeInUp splite-text"
                                            data-splitting data-wow-delay="0.2s">
                                            {{ __($aboutOne->data_values->heading) }}
                                        </h2>
                                        <div class="subtitle w--90 wow animate__animated animate__fadeInUp"
                                            data-wow-delay="0.3s">@php
                                                echo $aboutOne->data_values->description;
                                            @endphp</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gy-4 mb-5">
                    @foreach ($aboutOneElements ?? [] as $item)
                        <div class="col-xxl-8 col-lg-12 col-md-6">
                            <div class="service-key--box d-flex flex-column gap--16" data-aos="fade-right"
                                data-aos-delay="400" data-aos-duration="1500">
                                <div class="d-flex align-items-baseline gap--16">
                                    <div
                                        class="icon--wrap position-relative d-flex justify-content-center align-items-center radius--50 flex-shrink-0">
                                        @php
                                            echo $item->data_values->icon;
                                        @endphp
                                    </div>
                                  
                                    <div class="title--wrap">
                                        <h6 class="title fs--18 fw--400 mb-1">{{ __($item->data_values->heading) }}</h6>
                                        <p>{{ __($item->data_values->subheading) }}</p>
                                    </div>
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
                    <div class="thumb--one" data-aos="zoom-out" data-aos-delay="400" data-aos-duration="1500">
                        <img class="fit--img" src="{{getImage(getFilePath('about_one').'/'.$aboutOne->data_values->about_image)}}" alt="@lang('about-image')">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
