@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="login-section position-relative">
        <div class="row mx-0 justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-6 col-md-8 px-0">
                <div class="login-left--section d-flex justify-content-center align-items-center">
                    <div class="row justify-content-center w--100">
                        <div class="col-xxl-8 col-xl-8">
                            <div class="login-box w--100">
                                <div class="form--wrap">
                                    <form method="POST" action="{{ route('user.password.update') }}">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $email }}">
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label class="form--label text--white7" >@lang('Password')</label>
                                                <input type="password" class="form-control form--control" name="password"
                                                    required>
                                                @if ($general->secure_password)
                                                    <div class="input-popup">
                                                        <p class="error lower">@lang('1 small letter minimum')</p>
                                                        <p class="error capital">@lang('1 capital letter minimum')</p>
                                                        <p class="error number">@lang('1 number minimum')</p>
                                                        <p class="error special">@lang('1 special character minimum')</p>
                                                        <p class="error minimum">@lang('6 character password')</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form--label text--white7">@lang('Confirm Password')</label>
                                            <input type="password" class="form-control form--control"
                                                name="password_confirmation" required>
                                        </div>
                                        <button type="submit" class="btn btn--base btn--lg w-100 mt-4">@lang('Reset Password')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script-lib')
    <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
@endpush
@push('script')
    <script>
        (function($) {
            "use strict";
            @if ($general->secure_password)
                $('input[name=password]').on('input', function() {
                    secure_password($(this));
                });

                $('[name=password]').focus(function() {
                    $(this).closest('.form-group').addClass('hover-input-popup');
                });

                $('[name=password]').focusout(function() {
                    $(this).closest('.form-group').removeClass('hover-input-popup');
                });
            @endif
        })(jQuery);
    </script>
@endpush
