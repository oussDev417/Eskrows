@php

    $pages = App\Models\Page::where('tempname',$activeTemplate)->get();
    $languages = App\Models\Language::all();
@endphp

<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasExample">
    <div class="offcanvas-header">
        <div class="logo">
            <div class="align-items-center d-flex">
                <div class="logo-wrapper">
                    <a href="{{ route('home') }}" class="normal-logo" id="offcanvas-logo-normal">
                        <img src="{{ getImage('assets/images/logoIcon/default_logo_white.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @auth
            <div class="user-info">
                <div class="user-thumb">
                    <a href="{{ route('user.home') }}">
                        <img src="{{ getImage(getFilePath('userProfile') . '/' . auth()->user()->image) }}"
                            alt="user-thumb">
                    </a>
                </div>
                <a href="{{ route('user.home') }}">
                    <h4>{{ auth()->user()->username }}</h4>
                </a>
            </div>
        @endauth

        <ul class="side-Nav">
            @foreach ($pages as $page)
                <li>
                    <a class="{{ request()->route()->uri == route('pages', $page->slug) ? 'active' : '' }}"
                        href="{{ route('pages', $page->slug) }}">
                        {{ __($page->name) }}
                    </a>
                </li>
            @endforeach

            @auth
                <li>
                    <a href="{{ route('user.home') }}" class="login-btn">@lang('Dashboard')</a>
                </li>
            @endauth

            @guest
                <li>
                    <a href="{{ route('user.login') }}">
                        @lang('Login')
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.register') }}" class="login-btn">@lang('SignUp')</a>
                </li>
                <li class="language py-3">
                    <div class="language-box">
                        <i class="fa-solid fa-globe"></i>
                        <select class="select language-select form--control p-0 border-0 ">
                            @foreach ($languages as $lang)
                                <option value="{{ $lang->code }}"
                                    @if (Session::get('lang') == $lang->code) selected @endif> {{ __($lang->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</div>
