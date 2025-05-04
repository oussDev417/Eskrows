@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="blog-details--section pb-100">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-details">
                        <div class="blog-item">
                            <div class="blog-item--thumb">
                                <img class="fit--img"
                                    src="{{ getImage(getFilePath('blog_one') . '/' . $blog->data_values->blog_image) }}"
                                    alt="blog-img">
                            </div>
                            <div class="blog-item--content pt-3">
                                <ul class="text-list d-flex gap--16">
                                    <li class="text-list__item">
                                        <div class="text-list__item-icon d-flex align-items-center gap--8">
                                            <i class="fas fa-calendar-alt"></i>
                                            <p>{{ showDateTime($blog->created_at, 'd M, Y') }}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-details--content">
                            <h3 class="blog-details--title">{{ __($blog->data_values->title) }}</h3>
                            <div class="blog-details--desc">
                                @php
                                    echo $blog->data_values->description;
                                @endphp
                            </div>
                            <div class="blog-details--share mt-4 d-flex align-items-center flex-wrap mb-5">
                                <h5 class="social-share--title mb-0 me-sm-3 me-1 d-inline-block">@lang('Share This'):</h5>
                                <ul class="social-list blog-details d-flex gap--12">

                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"
                                        class="social-list--item">
                                        <a class="social-list__link d-flex justify-content-center align-items-center"
                                            target="_blank"
                                            href="https://www.facebook.com/share.php?u={{ Request::url() }}&title={{ slug(@$element->data_values->title) }}">
                                            <i class="lab la-facebook-f"></i></a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Linkedin"
                                        class="social-list--item"> <a
                                            class="social-list__link d-flex justify-content-center align-items-center"
                                            target="_blank"
                                            href="https://www.linkedin.com/shareArticle?mini=true&url={{ Request::url() }}&title={{ slug(@$element->data_values->title) }}&source=behands"><i
                                                class="lab la-linkedin-in"></i></a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter"
                                        class="social-list--item"> <a
                                            class="social-list__link d-flex justify-content-center align-items-center"
                                            target="_blank"
                                            href="https://twitter.com/intent/tweet?status={{ slug(@$element->data_values->title) }}+{{ Request::url() }}">
                                            <i class="lab la-twitter"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <!--  Blog Details Sidebar Start  -->
                    <div class="blog-sidebar-wrapper">
                        <div class="blog-sidebar base--card radius--12 mb-5">
                            <h5 class="blog-sidebar--title fs--24 fw--600 d-inline-block position-relative">
                                @lang('Search')</h5>
                            <div class="blog-search-box w-100">
                                <form>
                                    <div class="input--group d-flex flex-nowrap position-relative">
                                        <input type="text" name="search" class="form--control search-input searchTerm"
                                            placeholder="@lang('Search')" id="search">
                                        <button type="submit" class="search-btn">
                                            <i class="las la-search text--base"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="search-result-box">
                                <div class="search-wrap2" id="search-results"></div>
                            </div>
                        </div>



                        <div class="blog-sidebar base--card radius--12">
                            <h5 class="blog-sidebar--title fs--24 fw--600 d-inline-block position-relative">
                                @lang('Latests')</h5>
                            @foreach ($latests as $item)
                                <div class="latest-blog d-flex flex-wrap">
                                    <div class="latest-blog--thumb">
                                        <a
                                            href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id]) }}">
                                            <img src="{{ getImage(getFilePath('blog_one') . '/' . 'thumb_' . $item->data_values->blog_image) }}"
                                                alt="..."></a>
                                    </div>
                                    <div class="latest-blog--content">
                                        <a href="{{ route('blog.details', ['slug' => slug($item->data_values->title), 'id' => $item->id]) }}"
                                            class="latest-blog--title fs--16 fw--600">{{ __(strLimit($item->data_values->title, 50)) }}</a>
                                        <span
                                            class="latest-blog--date fs--14">{{ showDateTime($item->created_at, 'dM, Y') }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Blog Details Sidebar End-->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('style')
    <style>
        .blog-details--share ul li a:hover {
            background: hsl(var(--base));                                               
            i{
                color: hsl(var(--white)) !important;
            }
        }

        .lds-spinner {
            color: hsl(var(--white));
            display: inline-block;
            position: relative;
            width: 80px;
            height: 112px;
            padding: 10px 0px;
            left: 50%;
            transform: translateX(-50%);
        }

        .lds-spinner_home {
            left: 0 !important;
        }

        .lds-spinner div {
            transform-origin: 40px 40px;
            animation: lds-spinner 1.2s linear infinite;
        }

        .lds-spinner div:after {
            content: " ";
            display: block;
            position: absolute;
            top: 15px;
            left: 37px;
            width: 2px;
            height: 11px;
            border-radius: 20%;
            background: hsl(var(--white));
        }

        .lds-spinner div:nth-child(1) {
            transform: rotate(0deg);
            animation-delay: -1.1s;
        }

        .lds-spinner div:nth-child(2) {
            transform: rotate(30deg);
            animation-delay: -1s;
        }

        .lds-spinner div:nth-child(3) {
            transform: rotate(60deg);
            animation-delay: -0.9s;
        }

        .lds-spinner div:nth-child(4) {
            transform: rotate(90deg);
            animation-delay: -0.8s;
        }

        .lds-spinner div:nth-child(5) {
            transform: rotate(120deg);
            animation-delay: -0.7s;
        }

        .lds-spinner div:nth-child(6) {
            transform: rotate(150deg);
            animation-delay: -0.6s;
        }

        .lds-spinner div:nth-child(7) {
            transform: rotate(180deg);
            animation-delay: -0.5s;
        }

        .lds-spinner div:nth-child(8) {
            transform: rotate(210deg);
            animation-delay: -0.4s;
        }

        .lds-spinner div:nth-child(9) {
            transform: rotate(240deg);
            animation-delay: -0.3s;
        }

        .lds-spinner div:nth-child(10) {
            transform: rotate(270deg);
            animation-delay: -0.2s;
        }

        .lds-spinner div:nth-child(11) {
            transform: rotate(300deg);
            animation-delay: -0.1s;
        }

        .lds-spinner div:nth-child(12) {
            transform: rotate(330deg);
            animation-delay: 0s;
        }

        @keyframes lds-spinner {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            "use strict";
            let searchTimeout;
            $('.searchTerm').on('keyup', function() {
                clearTimeout(searchTimeout);
                $('.search-result-box').addClass('show');
                var searchTerm = $(this).val();
                if (searchTerm.length >= 1) {
                    $('#search-results').html(
                        '<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>'
                    );
                    searchTimeout = setTimeout(function() {
                        $.ajax({
                            url: "{{ route('blog.search') }}",
                            type: "GET",
                            data: {
                                searchTerm: searchTerm
                            },
                            success: function(response) {

                                var results = '';
                                var websiteUrl = "{{ url('/') }}/";
                                const slugify = str => str
                                    .toLowerCase()
                                    .trim()
                                    .replace(/[^\w\s-]/g, '')
                                    .replace(/[\s_-]+/g, '-')
                                    .replace(/^-+|-+$/g, '');
                                if (response.blogs.length > 0) {
                                    $.each(response.blogs, function(index, value) {
                                        let slug = slugify(value.data_values
                                            .title);
                                        var date = new Date(value.created_at);
                                        var monthNames = ["Jan", "Feb", "Mar",
                                            "Apr", "May", "Jun", "Jul",
                                            "Aug", "Sep", "Oct", "Nov",
                                            "Dec"
                                        ];
                                        var month = monthNames[date.getMonth()];
                                        var day = date.getDate();
                                        var year = date.getFullYear();
                                        var formattedDate = month + ' ' + day +
                                            ', ' + year;
                                        results +=
                                            '<div class="new mb-3 mt-3 border border--base rounded px-3 py-2 text--white">';
                                        results += '<a href="' + websiteUrl +
                                            'blog/' + slug + '/' + value.id +
                                            '">';
                                        results +=
                                            '<p class="mb-1 text--white"><u>' +
                                            value
                                            .data_values.title + "..." +
                                            '</u></p>';
                                        results +=
                                            '<ul class="text-list inline">';
                                        results +=
                                            '<li class="text-list__item text-dark text--white"><span class="text-list__item-icon"><i class="fas fa-calendar-alt"></i> </span>' +
                                            formattedDate + '</li>';
                                        results += '</ul>';
                                        results += '</a>';
                                        results += '</div>';
                                    });
                                } else {
                                    results += '<div class="new">';
                                    results += '<p class="text-center mt-2">' +
                                        "@lang('No blogs found')" + '</p>';
                                    results += '</div>';
                                }
                                $('#search-results').html(results);
                            }
                        });
                    }, 2000);
                } else {
                    $('.search-result-box').removeClass('show');
                    $('#search-results').empty();
                }
            });
        });
    </script>
@endpush
