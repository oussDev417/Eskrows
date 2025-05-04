@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <!-- login section -->
    <section class="login-section position-relative">
        <div class="row mx-0 justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-6 col-md-8 px-0">
                <div class="login-left--section d-flex justify-content-center align-items-center">
                    <div class="row justify-content-center w--100">
                        <div class="col-xxl-8 col-xl-8">
                            <div class="login-box w--100">
                            
                                <div class="content mb-5">
                                    <h4 class="title mb-2">@lang('Login Your Account')</h4>
                                    <p class="text-center">@lang('Welcome back to Escrow, sign in.')</p>
                                </div>
                                <div class="form--wrap">
                                    <form action="{{ route('user.login') }}" method="POST" class="verify-gcaptcha">
                                        @csrf
                                        <div class="mb-4 form-group">
                                            <label class="mb-2 form--label text--white">@lang('User name')</label>
                                            <input
                                                class="form--control" name="username"
                                                placeholder="@lang('Username Or Email')">
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-group">
                                                <label class="mb-2 form--label text--white">@lang('Password')</label>
                                                <div class="input--group position-relative">
                                                    <input
                                                        class="form--control"
                                                        id="password" placeholder="@lang('Password')" type="password" name="password">
                                                    <div class="password-show-hide fas fa-eye-slash toggle-password-change text--white7"
                                                        data-target="password"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="login-meta d-flex flex-wrap justify-content-between align-items-center mb-4"
                                            data-wow-delay="0.5s">
                                            <div class="d-flex flex-nowrap align-items-center">
                                                <div class="form--check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}
                                                         value="">
                                                </div>
                                                <div class="condition-text">
                                                    <label for="remember" class="text--white7">@lang('Remember Me')
                                                    </label>
                                                </div>
                                            </div>
                                            <a href="{{ route('user.password.request') }}"
                                                class="text--underline text--base">@lang('Forgot Password?')</a>
                                        </div>

                                        <div class="col-sm-12">
                                            <x-captcha></x-captcha>
                                        </div>

                                        <button type="submit"
                                            class="btn btn--base btn--lg w-100" id="recaptcha">@lang('Login')</button>
                                    </form>
                                    <div class="col-12">
                                        <div class="text-center mt-3">
                                            <p class="text-content">@lang('Don\'t have any account?')
                                                <a href="{{ route('user.register') }}" class="text--base">@lang('Create Account')</a>
                                            </p>
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
