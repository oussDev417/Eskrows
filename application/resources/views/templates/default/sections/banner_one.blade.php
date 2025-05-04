@php
    $bannerOne = getContent('banner_one.content', true);
    $categories = App\Models\Category::where('status', 1)->get();
@endphp

<!-- < Hero Section -->
<section class="hero">

    <div class="containerr">
        <div class="bg--blur"></div>
    </div>
    <div class="hero-content--wrap">
        <div class="container position-relative">
            <div class="row gy-5 justify-content-between">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="hero--content d-flex flex-column justify-content-start">
                        <h6 class="title text-start fw--600 fs--62 wow animate__animated animate__fadeInUp splite-text"
                            data-splitting data-wow-delay="0.2s">
                            <span class="text__first">
                                <span class="text__word">{{ __($bannerOne->data_values->heading) }}</span>
                                <span class="text__first-bg"></span>
                            </span>
                        </h6>

                        <p class="subtitle fs--18 w--80  wow animate__animated animate__fadeInUp splite-text"
                            data-splitting data-wow-delay="0.3s">{{ __($bannerOne->data_values->subheading) }}</p>
                        <div class="hero-btn--wrap d-flex justify-content-start w--100 flex-wrap gap--20 wow animate__animated animate__fadeInUp"
                            data-wow-delay="0.4s">
                            <a href="{{$bannerOne->data_values->button_one_url }}"
                                class="btn btn--base btn--lg text--black">{{ __($bannerOne->data_values->button_one) }}</a>
                            <a href="{{$bannerOne->data_values->button_two_url}}"
                                class="btn btn--base-two btn--lg">{{ __($bannerOne->data_values->button_two) }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 position-relative">

                    <div class="hero-form--wrap">

                        <div class="element--one position-absolute top_image_bounce">
                            <i class="fa-solid fa-fingerprint animation-img" data-value="-5"></i>
                        </div>
                        <div class="element--two position-absolute left_image_bounce">
                            <i class="fa-regular fa-handshake animation-img" data-value="-2"></i>
                        </div>
                        <div class="element--three position-absolute top_image_bounce_2">
                            <i class="fa-solid fa-lock animation-img" data-value="6"></i>
                        </div>

                        <div class="icon--wrap radius--50 d-flex justify-content-center align-items-center">
                            <img src="{{ getImage(getFilePath('banner_one') . '/' . $bannerOne->data_values->image) }}"
                                alt="...">
                        </div>
                        <form action="{{route('user.escrow.info')}}" autocomplete="off">
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-4">
                                        <select class="form--control form-select" name="type">
                                            <option selected="" value="1">@lang('I AM SELLING')</option>
                                            <option value="2">@lang('I AM BUYING')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4 form-group">
                                        <input class="form--control" name="amount" placeholder="For the Amount Of {{ $general->cur_text }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <select class="form--control form-select" name="category_id">
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ __($item->name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn--base btn--xl text--black w--100 fw--600">@lang('Continue')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--  Hero Section />-->
