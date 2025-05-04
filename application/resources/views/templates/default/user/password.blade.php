@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="dashboard-container-wrap">
        <div class="dashboard-body">
            <div class="container-fluid">
                <!-- < dashboard header -->
                @include($activeTemplate . 'partials.user.dashboard_header')
                <!-- dashboard header /> -->
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <div class="base--card radius--8">
                        <form action="" method="post">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-lg-12">
                                    <h4 class="mb-1">@lang('Change Password')</h4>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="old_password"
                                            class="form--label text--white mb-3">@lang('Current Password')</label>
                                        <div class="input--group position-relative">
                                            <input type="password" class="form--control"
                                                name="current_password" id="current_password" placeholder="Old Password"
                                                required />
                                            <div class="password-show-hide fas fa-eye-slash toggle-password-change text--white"
                                                data-target="current_password"></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <label for="new-password" class="form--label required text--white">@lang('New Password')</label>
                                    <div class="input--group position-relative">
                                        <input type="password" class="form--control" name="new_password" id="new_password"
                                            placeholder="New Password" required />
                                        <div class="password-show-hide fas fa-eye-slash toggle-password-change text--white"
                                            data-target="new_password"></div>
                                    </div>
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

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="password_confirmation" class="form--label text--white mb-3">
                                            @lang('Confirm Password')</label>
                                        <div class="input--group position-relative">
                                            <input type="password" class="form--control" id="password_confirmation"
                                                name="password_confirmation" placeholder="Confirm Password" required />
                                            <div class="password-show-hide fas fa-eye-slash toggle-password-change text--white"
                                                data-target="password_confirmation"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 text-end mt-3">
                                <button type="submit" class="btn btn--base btn--md p-3 w-100">@lang('Submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
