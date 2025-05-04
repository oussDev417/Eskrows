@php
   $blogOneContent = getContent('blog_one.content',true);
   $blogOneElements = getContent('blog_one.element',false,6,true);
@endphp

<section class="news-section py-100">
    <div class="container">
        <div class="row gy-5 justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-content-4 d-flex justify-content-center flex-column align-items-center mb-60">
                    <div class="d-inline-flex heading--wrap">
                        <h6 class="heading text--base text-center text--upper">{{__($blogOneContent->data_values->heading)}}</h6>
                    </div>
                    <h6 class="title wow animate__animated animate__fadeInUp text-center fs--32 fw--700 splite-text"
                        data-splitting data-wow-delay="0.2s">{{__($blogOneContent->data_values->subheading)}}</h6>
                    <p class="subtitle wow animate__animated animate__fadeInUp text-center fs-16 fw--400 w--80"
                        data-wow-delay="0.3s">{{__(strWords($blogOneContent->data_values->description,30))}}</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center gy-4">
            @foreach ($blogOneElements ?? [] as $item)
                
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="blog-card">
                    <div class="thumb">
                        <img class="fit--img" src="{{getImage(getFilePath('blog_one').'/'."thumb_".$item->data_values->blog_image)}}" alt="...">
                        <img class="fit--img" src="{{getImage(getFilePath('blog_one').'/'."thumb_".$item->data_values->blog_image)}}" alt="...">
                    </div>
                    <div class="blog-content">
                        <a href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id])}}">
                            <h5 class="title fs--24 fw--600">{{__(strLimit($item->data_values->title,50))}}</h5>
                        </a>
                        <div class="fs--16 mb-30">
                            @php
                                echo (strLimit($item->data_values->description,140))
                            @endphp
                        </div>
                        <ul class="date--wrap radius--4 d-flex  justify-content-between align-items-center">
                            <li class="d-flex justify-content-start align-items-center gap--12">
                                <i class="fa-solid fa-calendar"></i>
                                <p class="text--white mb-0 fs--14 fw--400">@lang('Post On') {{showDateTime($item->created_at,"dM, Y")}}</p>
                            </li>
                            <li class="d-flex justify-content-start align-items-center gap--12">
                                <i class="fa-solid fa-user"></i>
                                <p class="text--white fs--14 fw--400">{{$item->data_values->author}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



