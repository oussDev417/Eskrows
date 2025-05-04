@php
    $pages = App\Models\Page::where('tempname', $activeTemplate)->get();
    $contact = getContent('contact_us_one.content', true);
    $socialIcons = getContent('social_icon.element', false,null, true);
    $policyPages = getContent('policy_pages.element', false, null, true);
    $cookie = getContent('cookie.data', true);
    $importantLinks = getContent('footer_important_links.element', false, null, true);
    $companyLinks = getContent('footer_company_links.element', false, null, true);
@endphp


<!-- Footer Start Here -->
<footer class="footer-area bg--dark overflow--hidden ">
    <div class="footer-top py-100">
        <div class="container">
            <div class="row gy-4 justify-content-start">
                <div class="col-xl-3 col-sm-6">
                    <div class="footer-item">
                        <div class="footer-item--logo">
                            <a href="{{ route('home') }}" class="footer-logo-normal" id="footer-logo-normal">
                                <img src="{{ getImage('assets/images/logoIcon/default_logo_white.png') }}" alt="logo">
                            </a>
                        </div>
                        <p class="footer-item--desc">{{ __($contact->data_values->description) }}</p>
                        <ul class="social-list z--9 position-relative">
                            @foreach ($socialIcons as $item)
                                <li class="social-list--item">
                                    <a href="{{ $item->data_values->url }}" class="social-list__link icon-wrapper {{ $loop->iteration == 2 ? 'active' : '' }}">
                                        <div class="icon">
                                            @php echo $item->data_values->social_icon; @endphp
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-xl-2 col-sm-6">
                    <div class="footer-item">
                        <h5 class="footer-item--title">@lang('Useful link')</h5>
                        <ul class="footer-menu">
                            @foreach ($importantLinks as $item)
                                <li class="menu--item">
                                    <a href="{{ url('/') . $item->data_values->url }}" class="menu--link">
                                        {{ __(@$item->data_values->title) }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6">
                    <div class="footer-item">
                        <h5 class="footer-item--title">@lang('Quick Link')</h5>
                        <ul class="footer-menu">
                            @foreach ($companyLinks as $link)
                                <li class="menu--item">
                                    <a href="{{ url('/') . $link->data_values->url }}"
                                        class="menu--link">
                                        {{ __(@$link->data_values->title) }}</a></li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6">
                    <div class="footer-item">
                        <h5 class="footer-item--title">@lang('Policy Page')</h5>
                        <ul class="footer-menu">
                            @foreach ($policyPages as $key => $data)
                                <li class="menu--item">
                                    <a href="{{ route('policy.pages', [slug($data->data_values->title), $data->id]) }}"
                                        class="menu--link">
                                        {{ __($data->data_values->title) }}</a>
                                </li>
                            @endforeach
                            <li class="menu--item">
                                <a href="{{ route('cookie.policy') }}" class="menu--link">
                                    @lang('Cookie & Policy')
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="footer-item">
                        <h5 class="footer-item--title">@lang('Contact Us')</h5>
                        <div class="footer-contact-info mb-3 d-flex justify-content-start gap-3">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="d-flex justify-content-start flex-column align-items-center">
                                <p class="fw--400 text--white">{{ __($contact->data_values->address) }}</p>
                                <p class="text--white">{{ __($contact->data_values->email_address) }}</p>
                            </div>
                        </div>
                        <div class="footer-contact-info mb-3 d-flex justify-content-start gap-3">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="d-flex justify-content-start flex-column align-items-center">
                                <p class="fw--400 text--white">@lang('Call Us')</p>
                                <p>
                                    <a class="text--white" href="tel:{{ str_replace(' ', '', @$contact->data_values->contact_number) }}">{{ @$contact->data_values->contact_number }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End-->

    <!-- bottom Footer -->
    <div class="bottom-footer pt-4 pb-3">
        <div class="container">
            <div class="row text-center gy-2">
                <div class="col-lg-12">
                    <div class="bottom-footer-text"> @php echo $contact->data_values->copyright_text;  @endphp</div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ==================== Footer End Here ==================== -->
