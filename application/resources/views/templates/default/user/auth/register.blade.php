@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $policyPages = getContent('policy_pages.element', false, null, true);
    @endphp

    <section class="login-section position-relative">
        <div class="row mx-0 justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-6 col-md-8 px-0">
                <div class="login-left--section d-flex justify-content-center align-items-center">
                    <div class="row justify-content-center w--100">
                        <div class="col-xxl-12 col-xl-12">
                            <div class="login-box w--100">
                                
                                <div class="content mb-5">
                                    <h4 class="title mb-2">@lang('Register Your Account')</h4>
                                    <p class="text-center">@lang('Welcome back to Escrow, sign up.')</p>
                                </div>

                                <div class="form--wrap">
                                    <form action="{{ route('user.register') }}" method="POST" class="verify-gcaptcha">
                                        @csrf
                                        <div class="row">
                                            @if (session()->get('reference') != null)
                                                <div class="col-md-6">
                                                    <div class="mb-4 form-group">
                                                        <label for="referenceBy"
                                                            class="form-label">@lang('Reference by')</label>
                                                        <input type="text" name="referBy" id="referenceBy"
                                                            class="form-control form--control"
                                                            value="{{ session()->get('reference') }}" readonly>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col-md-6">
                                                <div class="mb-4 form-group">
                                                    <label class="mb-2 form--label text--white">@lang('User name')</label>
                                                    <input class="form--control checkUser" name="username"
                                                        placeholder="@lang('User name')">
                                                    <small class="text-danger usernameExist"></small>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-4 form-group">
                                                    <label class="mb-2 form--label text--white">@lang('E-Mail Address')</label>
                                                    <div class="input--group position-relative">
                                                        <input class="form--control checkUser" id="email"
                                                            placeholder="@lang('Email')" name="email" type="email"
                                                            value="{{ old('email') ?? request()->mail }}">
                                                        <small class="text-danger emailExist"></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-2 form-group">
                                                    <label class="form--label text--white">@lang('Country')</label>
                                                    <select name="country" class="form--control form-select">
                                                        @foreach ($countries as $key => $country)
                                                            <option data-mobile_code="{{ $country->dial_code }}"
                                                                value="{{ $country->country }}"
                                                                data-code="{{ $key }}">
                                                                {{ __($country->country) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">@lang('Mobile')</label>
                                                    <div class="input-group mb-3">
                                                        <span
                                                            class="input-group-text mobile-code text--white bg--base border border-0">

                                                        </span>
                                                        <input type="hidden" name="mobile_code">
                                                        <input type="hidden" name="country_code">
                                                        <input type="number" name="mobile" value="{{ old('mobile') }}"
                                                            class="form-control form--control checkUser" required>
                                                    </div>
                                                    <small class="text-danger mobileExist"></small>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-4 form-group">
                                                    <label class="mb-2 form--label text--white">@lang('Password')</label>
                                                    <div class="input--group position-relative">
                                                        <input class="form--control" id="password"
                                                            placeholder="@lang('Password')" name="password"
                                                            type="password">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-4 form-group">
                                                    <label class="mb-2 form--label text--white">@lang('Confirm Password')</label>
                                                    <input type="password" class="form--control"
                                                        name="password_confirmation" required>
                                                </div>
                                            </div>
                                            <x-captcha></x-captcha>

                                            @if ($general->agree)
                                                <div class="col-sm-12 mb-4">
                                                    <div class="form--check">
                                                        <input class="form-check-input" type="checkbox" id="remember"
                                                            @checked(old('agree')) name="agree" required>
                                                        <div class="form-check-label">
                                                            <label for="remember" class="text--white7">
                                                                @lang('I agree with')</label>
                                                            @foreach ($policyPages as $policy)
                                                                <a href="{{ route('policy.pages', [slug($policy->data_values->title), $policy->id]) }}"
                                                                    class="text--base">{{ __($policy->data_values->title) }}</a>
                                                                <label class="text--white7" for="remember">
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <button type="submit" id="recaptcha" class="btn btn--base btn--lg w-100">
                                                @lang('Register')</button>
                                        </div>
                                    </form>

                                    <div class="col-sm-12 pt-2">
                                        <div class="have-account text-center">
                                            <p class="text-content">@lang('Already have an account?') <a
                                                    href="{{ route('user.login') }}"
                                                    class="text--underline text--base">@lang('Sign In')</a></p>
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

    <div class="modal fade modal--base" id="existModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title" id="existModalLongTitle">@lang('You are with us')</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="text-center">@lang('You already have an account please Login ')</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm"
                        data-bs-dismiss="modal">@lang('Close')</button>
                    <a href="{{ route('user.login') }}" class="btn btn--base btn-sm">@lang('Login')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .country-code .input-group-text {
            background: #fff !important;
        }

        .country-code select {
            border: none;
        }

        .country-code select:focus {
            border: none;
            outline: none;
        }
    </style>
@endpush

@push('script')
    <script>
        "use strict";
        (function($) {
            // Function to update country code values
            function updateCountryCode() {
                let selected = $('select[name=country] :selected');
                let mobileCode = selected.data('mobile_code');
                let countryCode = selected.data('code');

                $('input[name=mobile_code]').val(mobileCode);
                $('input[name=country_code]').val(countryCode);
                $('.mobile-code').text('+' + mobileCode);
            }

            // Initialize country code on page load
            updateCountryCode();

            // Handle country selection change
            $('select[name=country]').on('change',updateCountryCode);

            // Check if user data exists on focus out
            $('.checkUser').on('focusout', function() {
                let url = '{{ route('user.checkUser') }}';
                let value = $(this).val().trim();
                let token = '{{ csrf_token() }}';
                let fieldName = $(this).attr('name');
                let data = {
                    _token: token
                };

                if (!value) return;

                if (fieldName === 'mobile') {
                    data.mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                } else {
                    data[fieldName] = value;
                }

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        let type = response.type;
                        if (response.data !== false) {
                            if (type === 'email') {
                                $('#existModalCenter').modal('show');
                            } else {
                                $(`.${type}Exist`).text(`${type} already exists`);
                            }
                        } else {
                            $(`.${type}Exist`).text('');
                        }
                    },
                    error: function() {
                        console.error('An error occurred while checking user data.');
                    }
                });
            });
        })(jQuery);
    </script>
@endpush
