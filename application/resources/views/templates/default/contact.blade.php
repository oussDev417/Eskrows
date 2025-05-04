@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $contactUsOne = getContent('contact_us_one.content', true);
    @endphp

    <section class="contact-section pb-100">
        <div class="container">
            <div class="row gy-4 justify-content-center mb-100">
                <div class="col-xxl-3 col-lg-4 col-md-6">
                    <div
                        class="contact--box radius--8 d-flex flex-column justify-content-start align-items-center position-relative">
                        <div class="icon-wrap d-flex justify-content-center align-items-center position-absolute">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="content-wrap d-flex flex-column justify-content-start align-items-start w--100">
                            <p class="text-start fw--600">@lang('Phone Number')</p>
                            <a class="text-start fs--20  fw--500 d-block text--white"
                                href="tel:{{ str_replace(' ', '', $contactUsOne->data_values->contact_number) }}">
                                {{ $contactUsOne->data_values->contact_number }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-md-6">
                    <div
                        class="contact--box radius--8 d-flex flex-column justify-content-start align-items-center position-relative">
                        <div class="icon-wrap d-flex justify-content-center align-items-center position-absolute">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="content-wrap d-flex flex-column justify-content-start align-items-start w--100">
                            <p class="text-start fw--600">@lang('Email Address')</p>
                            <a class="text-start fs--20  fw--500 d-block text--white"
                                href="mailto:{{ $contactUsOne->data_values->email_address }}">{{ $contactUsOne->data_values->email_address }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-md-6">
                    <div
                        class="contact--box radius--8 d-flex flex-column justify-content-start align-items-center position-relative">
                        <div class="icon-wrap d-flex justify-content-center align-items-center position-absolute">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <div class="content-wrap d-flex flex-column justify-content-start align-items-start w--100">
                            <p class="text-start fw--600">@lang('Address')</p>
                            <p class="text-start fs--20  fw--500 d-block text--white">
                                {{ $contactUsOne->data_values->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-md-6">
                    <div
                        class="contact--box radius--8 d-flex flex-column justify-content-start align-items-center position-relative">
                        <div class="icon-wrap d-flex justify-content-center align-items-center position-absolute">
                            <i class="fas fa-headphones-alt"></i>
                        </div>
                        <div class="content-wrap d-flex flex-column justify-content-start align-items-start w--100">
                            <p class="text-start fw--600">@lang('Support Team')</p>
                            <a class="text-start fs--20  fw--500 d-block text--white"
                                href="tel:{{ str_replace(' ', '', $contactUsOne->data_values->support_team) }}">{{ $contactUsOne->data_values->support_team }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-12 mb-5 mb-xl-0">
                    <div class="contact-card radius--12">
                        <div class="content--wrap mb-4">
                            <h6 class="fs--32 mb-1 fw--600">{{__($contactUsOne->data_values->text)}}</h6>
                        </div>
                        <form method="POST" autocomplete="off">
                            @csrf
                            <div class="row gy-3 mb-4">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form--label text--white">@lang('Full Name')</label>
                                        <input class="form--control" name="name"
                                            value="@if (auth()->user()){{ auth()->user()->fullname }}@else{{ old('name') }}@endif"@if (auth()->user())readonly @endif required
                                            placeholder="@lang('Enter Full Name')">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form--label text--white">@lang('Email Address')</label>
                                        <input class="form--control" name="email"
                                            value="@if(auth()->user()){{auth()->user()->email}}@else{{old('email')}}@endif"@if(auth()->user())readonly @endif required
                                            placeholder="@lang('Enter Email Address')">
                                    </div>
                                </div>
                            </div>
                            <div class="row gy-3 mb-4">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form--label text--white">@lang('Subject')</label>
                                        <input name="subject" type="text" class="form--control" value="{{old('subject')}}" placeholder="@lang('Subject*')" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 form-group">
                                <label class="form--label text--white">@lang('Message')</label>
                                <textarea class="form--control" name="message" placeholder="@lang('Write Your Message')" required>{{old('message')}}</textarea>
                            </div>
                            <button class="btn btn--base btn--lg w-100">{{__($contactUsOne->data_values->button_name)}}</button>
                        </form>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 d-none d-xl-block">
                    <div class="map--wrap">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12 p-0">
                                    <div class="map-section">
                                        <div class="map-box">
                                            <iframe
                                            src="https://maps.google.com/maps?q={{ $contactUsOne->data_values->latitude }},{{ $contactUsOne->data_values->longitude }}&hl=es;z=14&amp;output=embed"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
