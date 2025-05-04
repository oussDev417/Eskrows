<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>
    @include('partials.seo')
    <link rel="stylesheet" href="{{ asset('assets/global/css/line-awesome.min.css') }}">
    <link href="{{ asset('assets/global/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ getImage(getFilePath('logoIcon') . '/default_favicon.png') }}">
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/fontawesome-all.min.css') }}">
    <!-- Custom Animation -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/custom-animation.css') }}">
    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/slick.css') }}">
    <!-- line awesome -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/line-awesome.min.css') }}">
    <!-- line awesome -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/animate.min.css') }}">
    <!-- Splitting css -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/splitting.css') }}">
    <!-- aos css -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/aos.css') }}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/main.css') }}">
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/custom.css') }}">
    @stack('style-lib')

    @stack('style')
    <link rel="stylesheet"
        href="{{ asset($activeTemplateTrue . 'css/color.php') }}?color={{ $general->default_color }}&secondColor={{ $general->secondary_default_color }}">
</head>

<body>
    <!--==================== Preloader Start ====================-->
    @include($activeTemplate . 'partials.loader')
    <!--==================== Preloader End ====================-->

    <!-- header wrap Start-->
    @include($activeTemplate . 'partials.header')
    <!-- Header section End -->

    <!-- Breadcrumb Start Here -->
    @if (request()->route()->uri != '/')
        @include($activeTemplate . 'partials.breadcumb')
    @endif
    <!-- Breadcrumb End Here -->

    <!-- Sidebar mobile menu wrap Start-->
    @include($activeTemplate . 'partials.sidebar_mobile_menu')
    <!-- Sidebar mobile menu wrap End -->
    @yield('content')
    @include($activeTemplate . 'partials.footer')

    <!-- Jquery js -->
    <script src="{{ asset('assets/global/js/jquery-3.7.1.min.js') }}"></script>

    <script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Slick js -->
    <script src="{{ asset($activeTemplateTrue . 'js/slick.min.js') }}"></script>

    <!-- Viewport js -->
    <script src="{{ asset($activeTemplateTrue . 'js/viewport.jquery.js') }}"></script>

    <!-- Wow js -->
    <script src="{{ asset($activeTemplateTrue . 'js/wow.min.js') }}"></script>

    <!-- Splitting js -->
    <script src="{{ asset($activeTemplateTrue . 'js/splitting.min.js') }}"></script>

    <!-- aos js -->
    <script src="{{ asset($activeTemplateTrue . 'js/aos.js') }}"></script>


    <script src="{{ asset($activeTemplateTrue . 'js/gsap.min.js') }}"></script>

    <script src="{{ asset($activeTemplateTrue . 'js/gsap-scroll-trigger.js') }}"></script>


    <!-- main js -->
    <script src="{{ asset($activeTemplateTrue . 'js/main.js') }}"></script>

    @stack('script-lib')
    @stack('script')
    @include('partials.plugins')
    @include('partials.notify')

    <script>
        (function($) {
            "use strict";
            $(".language-select").on("change", function() {
                window.location.href = "{{ route('home') }}/change/" + $(this).val();
            });

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
                matched = event.matches;
                if (matched) {
                    $('body').addClass('dark-mode');
                    $('.navbar').addClass('navbar-dark');
                } else {
                    $('body').removeClass('dark-mode');
                    $('.navbar').removeClass('navbar-dark');
                }
            });

            let matched = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (matched) {
                $('body').addClass('dark-mode');
                $('.navbar').addClass('navbar-dark');
            } else {
                $('body').removeClass('dark-mode');
                $('.navbar').removeClass('navbar-dark');
            }

            var inputElements = $('input,select');
            $.each(inputElements, function(index, element) {
                element = $(element);
                element.closest('.form-group').find('label').attr('for', element.attr('name'));
                element.attr('id', element.attr('name'))
            });

            $('.policy').on('click', function() {
                $.get('{{ route('cookie.accept') }}', function(response) {
                    $('.cookies-card').addClass('d-none');
                });
            });

            setTimeout(function() {
                $('.cookies-card').removeClass('hide')
            }, 2000);

            var inputElements = $('[type=text],select,textarea');
            $.each(inputElements, function(index, element) {
                element = $(element);
                element.closest('.form-group').find('label').attr('for', element.attr('name'));
                element.attr('id', element.attr('name'))
            });

            $.each($('input, select, textarea'), function(i, element) {
                if (element.hasAttribute('required')) {
                    $(element).closest('.form-group').find('label').addClass('required');
                }
            });

        })(jQuery);
    </script>

</body>

</html>
