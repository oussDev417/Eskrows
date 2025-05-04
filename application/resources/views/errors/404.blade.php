<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>@lang('Escrow')</title>
    <!-- Favicon -->
    <link rel="stylesheet" href="{{ asset('assets/global/css/line-awesome.min.css') }}" />

    <link href="{{ asset('assets/global/css/bootstrap.min.css') }}" rel="stylesheet">
    @if ($general->active_template == 'default')
        <link rel="shortcut icon" type="image/png"
            href="{{ getImage(getFilePath('logoIcon') . '/default_favicon.png') }}">
    @else
        <link rel="shortcut icon" href="{{ getImage('assets/images/logoIcon/favicon.png') }}">
    @endif
    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/main.css') }}">

</head>

<body>
    <section class="error--page">
        <div class="container">
            <div class="row gy-5 justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="error-wrap text-start">
                        <div class="error--text">
                            <span>4</span>
                            <span>0</span>
                            <span>4</span>
                        </div>
                        <h2 class="title mb-3">@lang('NOT FOUND')</h2>
                        <p class="desc">@lang("Couldn't find that.")
                            <a href="{{ route('home') }}">@lang('Try something else?')</a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="thumb--wrap">
                        <img src="{{ getImage(getFilePath('common') . '/' . '404.png') }}" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery js -->
    <script src="{{ asset('assets/global/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Popper js -->
    <script src="{{ asset($activeTemplateTrue . 'js/popper.min.js') }}"></script>

    <!-- main js -->
    <script src="{{ asset($activeTemplateTrue . 'js/main.js') }}"></script>
</body>

</html>
