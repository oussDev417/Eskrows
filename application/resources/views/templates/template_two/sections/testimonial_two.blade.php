@php
    $testimonialTwo = getContent('testimonial_two.content',true);
    $testimonialTwoElements    = getContent('testimonial_two.element',false,10);
@endphp

<section class="testimonials py-80 section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-heading  text-center">
                    <span class="section-heading__subtitle">{{__($testimonialTwo->data_values->subheading)}}</span>
                    <h2 class="section-heading__title ">{{__($testimonialTwo->data_values->heading)}} </h2>
                    <p class="section-heading__desc mb-30">{{__($testimonialTwo->data_values->description)}}</p>
                </div>
            </div>
        </div>
        <div class="testimonial-slider">

            @foreach ($testimonialTwoElements ?? [] as $element)
            <div class="testimonails-card">
                <div class="testimonial-item">
                    <div class="testimonial-item__quate"><i class="fa-solid fa-quote-right"></i></div>
                    <div class="testimonial-item__content">
                        <div class="testimonial-item__info">
                            <div class="testimonial-item__thumb">
                                <img src="{{getImage(getFilePath('frontend').'/testimonial/'.$element->data_values->client_img)}}" alt="">
                            </div>
                            <div class="testimonial-item__details">
                                <h5 class="testimonial-item__name">{{__($element->data_values->name)}}</h5>
                                <span class="testimonial-item__designation">{{__($element->data_values->designation)}}</span>
                            </div>
                        </div>
                    <p class="testimonial-item__desc">{{__($element->data_values->description)}}</p>


                    <div class="testimonial-item__rating">
                        <ul class="rating-list">
                            @if($element->data_values->rating == 1)
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            @endif

                            @if($element->data_values->rating == 2)
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            @endif

                            @if($element->data_values->rating == 3)
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            @endif
                            @if($element->data_values->rating == 4)
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            @endif
                            @if($element->data_values->rating == 5)
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            <li class="rating-list__item"><i class="fas fa-star"></i></li>
                            @endif

                        </ul>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
