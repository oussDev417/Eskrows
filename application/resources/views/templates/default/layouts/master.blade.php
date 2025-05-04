<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ $general->siteName(__($pageTitle)) }}</title>

    @include('partials.seo')

    <link href="{{ asset('assets/global/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/global/css/all.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/global/css/line-awesome.min.css') }}" />

    <link rel="shortcut icon" type="image/png" href="{{ getImage(getFilePath('logoIcon') . '/default_favicon.png') }}">
    <!-- Bootstrap -->

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

    @include($activeTemplate . 'partials.user.loader')
    @stack('fbComment')

    <section class="dashboard-section bg--img"
        style="background-image: url({{ asset($activeTemplateTrue . '/' . 'images/shape/dashboard-bg2.png') }})">
        <div class="dashboard">
            <!-- < dashboard side bar -->
            @include($activeTemplate . 'partials.user.dashboard_sidebar_menu')
            <!-- dashboard side bar /> -->
            @yield('content')
        </div>
    </section>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('assets/global/js/jquery-3.7.1.min.js') }}"></script>

    <script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Slick js -->
    <script src="{{ asset($activeTemplateTrue . 'js/slick.min.js') }}"></script>

    <script src="{{ asset($activeTemplateTrue . 'js/popper.min.js') }}"></script>

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
    @include('partials.notify')
    @include('partials.plugins')
    @stack('script')

    <script>
        (function($) {
            "use strict";
            $(".language-select").on("change", function() {
                window.location.href = "{{ route('home') }}/change/" + $(this).val();
            });

        })(jQuery);
    </script>


    <script>
        (function($) {
            "use strict";



            // $('form').on('submit', function () {
            //     if ($(this).valid()) {
            //         $(':submit', this).attr('disabled', 'disabled');
            //     }
            // });

            var inputElements = $('[type=text],[type=password],select,textarea');
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


            $('.showFilterBtn').on('click', function() {
                $('.responsive-filter-card').slideToggle();
            });


            let headings = $('.table th');
            let rows = $('.table tbody tr');
            let columns
            let dataLabel;

            $.each(rows, function(index, element) {
                columns = element.children;
                if (columns.length == headings.length) {
                    $.each(columns, function(i, td) {
                        dataLabel = headings[i].innerText;
                        $(td).attr('data-label', dataLabel)
                    });
                }
            });

        })(jQuery);
    </script>

</body>

</html>
