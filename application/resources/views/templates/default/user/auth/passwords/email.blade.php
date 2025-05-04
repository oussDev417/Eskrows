@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="login-section position-relative">
        <div class="row mx-0 justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-6 col-md-8 px-0">
                <div class="login-left--section d-flex justify-content-center align-items-center">
                    <div class="row justify-content-center w--100">
                        <div class="col-xxl-8 col-xl-8">
                            <div class="form--wrap base--card">
                                <form action="{{ route('user.password.email') }}" method="POST">
                                    @csrf
                                    <div class="row gy-3">
                                        <div class="col-sm-12 mb-3">
                                            <div class="form-group">
                                                <label for="email" class="form--label text--white">@lang('Email or Username')</label>
                                                <input type="text" class="form--control" id="email"
                                                    placeholder="@lang('Email Address')" name="value"
                                                    value="{{ old('value') }}" required autofocus="off">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit"
                                                class="btn btn--base btn--lg w-100">@lang('Forgot Password')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
