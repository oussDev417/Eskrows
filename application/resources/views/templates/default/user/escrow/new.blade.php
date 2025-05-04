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
                        <h6 class="title">@lang('Create New Escrow')</h6>
                        <form action="{{ route('user.escrow.info') }}" method="post" autocomplete="off">
                            @csrf

                            <div class="form-group mb-3">
                                <select class="form-select form--control form--select" name="type" required=""
                                    id="type">
                                    <option value="">@lang('Select One ')</option>
                                    <option {{request()->type ? request()->type == '1' ? 'selected':'' : 'selected'}} selected="" value="1">@lang('I Am Selling')</option>
                                    <option {{request()->type == '2' ? 'selected':''}} value="2">@lang('I Am Buying')</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <select class="form-select form--control" name="category_id">
                                    @foreach ($categories as $item)
                                        <option {{request()->category_id == $item->id ? 'selected':''}} value="{{ $item->id }}">{{ __($item->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <span class="input-group-text mobile-code text-white border-0 bg--base">
                                        {{ __($general->cur_text) }}
                                    </span>
                                    <input type="text" name="amount" value="{{ request()->amount ?? old('amount') }}"
                                        class="form-control form--control"
                                        placeholder="@lang('For the Amount Of') {{ __($general->cur_text) }}" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn--base w-100 mt-3 p-3">
                                @lang('Continue')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
