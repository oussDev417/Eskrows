@php
    $headerLinksElements = getContent('header_links.element', false, null, true);
    $languages = App\Models\Language::all();
@endphp

<!-- header -->
<!-- Header Start -->
<div class="header-main-area">
    <div class="header" id="header">
        <div class="container position-relative">
            <div class="header-wrapper">
                <!-- ham menu -->
                <i class="fa-sharp fa-solid fa-bars-staggered ham__menu" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"></i>

                <!-- logo -->
                <div class="header-menu-wrapper align-items-center d-flex">
                    <div class="logo-wrapper">
                        <a href="{{ route('home') }}" class="normal-logo" id="normal-logo"> <img
                                src="{{ getImage('assets/images/logoIcon/default_logo_white.png') }}" alt="logo">
                        </a>

                    </div>
                </div>
                <!-- / logo -->

                <div class="menu--wrap d-flex align-items-center gap--72">
                    <div class="menu-list-wrapper">
                        <ul class="main-menu">
                            @foreach ($headerLinksElements as $item)
                                <li>
                                    <a class="{{ request()->route()->uri == route('pages', [$item->data_values->slug]) ? 'active' : '' }}"
                                        href="{{ route('pages', [$item->data_values->slug]) }}">{{ __($item->data_values->name) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <ul class="login-lng d-flex align-items-center gap-3">
                        <li class="language">
                            <div class="language-box">
                                <i class="fa-solid fa-globe"></i>
                                <select class="select language-select form--control p-0 border-0 text--white">
                                    @foreach ($languages as $lang)
                                        <option value="{{ $lang->code }}"
                                            @if (Session::get('lang') == $lang->code) selected @endif> {{ __($lang->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        @auth
                            <li class="loin-btn--wrap">
                                <a class="btn btn--base text--black" href="{{ route('user.home') }}">@lang('Dashboard')</a>
                            </li>
                        @else
                            <li class="loin-btn--wrap">
                                <a class="btn btn--base text--black" href="{{ route('user.login') }}">
                                    <i class="fa-solid fa-arrow-right-to-bracket"></i> @lang('Sign in')</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header section End -->
