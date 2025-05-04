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
                <div class="col-lg-6">
                    <div class="base--card radius--8">
                        <h6 class="title">{{ __($pageTitle) }}</h6>
                        <form action="" method="post" autocomplete="off">
                            @csrf

                            <input type="hidden" name="type" value="{{ $type }}">
                            <input type="hidden" name="category_id" value="{{ $category_id }}">

                            <div class="row gy-md-4 gy-3">
                                <div class="col-sm-6">
                                    <label for="title" required>@lang('Title')</label>
                                    <input type="text" class="form--control" name="title" id="title"
                                        placeholder="@lang('Enter title')">
                                </div>
                                <div class="col-sm-6">
                                    @if ($type == 1)
                                        <label for="email">@lang('Buyer\'s Email')</label>
                                    @else
                                        <label for="email">@lang('Seller\'s Email')</label>
                                    @endif
                                    <input type="email" class="form--control" name="email" id="email"
                                        placeholder="@lang('Enter email')">
                                </div>

                                <div class="col-sm-6">
                                    <label for="amount" required>@lang('Amount')</label>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text mobile-code text-white border-0 bg--base">
                                                {{ __($general->cur_text) }}
                                            </span>
                                            <input type="text" name="amount" value="{{ $amount }}"
                                                class="form-control form--control" placeholder="@lang('Enter amount')" readonly>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <label for="charge">@lang('Charge')</label>

                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text mobile-code text-white border-0 bg--base">
                                                    {{ __($general->cur_text) }}
                                                </span>
                                                <input type="text" id="charge" name="charge" value="{{ $session_charge }}"
                                                    class="form-control form--control" placeholder="@lang('Enter charge')" readonly>
                                            </div>
                                        </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="charge_pay" required>@lang('Will Charge Pay')</label>
                                    <select class="select form-select form--control" name="charge_sender">
                                        <option value=" ">@lang('Select One ')</option>
                                        <option value="1">@lang('Seller')</option>
                                        <option value="2">@lang('Buyer')</option>
                                        <option value="3">@lang('Seller (50%) - Buyer (50%)')</option>
                                    </select>

                                </div>

                                <div class="col-sm-12">
                                    <label for="details">@lang('Details')</label>
                                    <textarea name="details" class="form--control" id="" cols="30" rows="10"
                                        placeholder="@lang('Write details ...')"></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn--base w-100 mt-3 p-3"> @lang('Continue')</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
