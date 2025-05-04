
@extends($activeTemplate .'layouts.frontend')
@section('content')

<section class="account py-60">
    <div class="account-inner">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="verification-code-wrapper">
                    <div class="verification-area">
                        <h5 class="pb-3 text-center border-bottom">@lang('2FA Verification')</h5>
                        <form action="{{route('user.go2fa.verify')}}" method="POST" class="submit-form">
                            @csrf

                            @include($activeTemplate.'partials.verification_code')

                            <div class="form--group">
                                <button type="submit" class="btn btn--base w-100">@lang('Save')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@push('style')
    <style>
        .verification-code-wrapper {
            border-radius: 26px;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid hsl(var(--base) / 0.2);
        }

        .verification-code span {
            background: hsl(var(--dark)/0.7) !important;
            border: none;
        }

        .verification-code input{
            color: hsl(var(--white)) !important;
        }
    </style>
@endpush

@push('script')
<script>
    (function ($) {
        "use strict";
        $('#code').on('input change', function () {
            var xx = document.getElementById('code').value;

            $(this).val(function (index, value) {
                value = value.substr(0, 7);
                return value.replace(/\W/gi, '').replace(/(.{3})/g, '$1 ');
            });

        });
    })(jQuery)
</script>
@endpush




