@extends($activeTemplate.'layouts.master')
@section('content')

<div class="dashboard-container-wrap">
    <div class="dashboard-body">
        <div class="container-fluid">
            <!-- < dashboard header -->
            @include($activeTemplate . 'partials.user.dashboard_header')
            <!-- dashboard header /> -->
        </div>
        <div class="row mx-0">
            <div class="col-lg-12">
                <div class="row ">
                    <div class="col-md-12">
                        <form action="" >
                            <div class="row justify-content-end align-items-center">
                                <div class="section-bg-white">
                                    <div class="row justify-content-center align-items-center mb-4">
                                        <div class="col-xl-3 col-lg-3 col-md-6 mb-3">
                                            <label>@lang('Transaction Number')</label>
                                            <input type="text" name="search" value="{{ request()->search }}" placeholder="@lang('Transaction') " aria-label="Username" aria-describedby="basic-addon1"                           class="form--control">


                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 mb-3">

                                            <label  class="form-label" for="gateway">@lang('Amount Type')</label>
                                            <select name="type" class="form-select form--control" id="gateway">
                                                <option value="">@lang('All')</option>
                                                <option value="+" @selected(request()->type == '+')>@lang('Plus')</option>
                                                <option value="-" @selected(request()->type == '-')>@lang('Minus')</option>
                                            </select>


                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 mb-3">

                                            <label class="form-label" for="gateway">@lang('Remark')</label>
                                            <select class="form-select form--control" name="remark">
                                                <option value="">@lang('Any')</option>
                                                @foreach($remarks as $remark)
                                                <option value="{{ $remark->remark }}" @selected(request()->remark ==
                                                    $remark->remark)>{{ __(keyToTitle($remark->remark)) }}</option>
                                                @endforeach
                                            </select>



                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 mt-3">
                                             <button class="btn btn--base p-3 w-100">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tbl-wrap">
                    <table class="table table--responsive--lg">
                        <thead>
                            <tr>
                                <th>@lang('Transaction No.')</th>
                                <th>@lang('Amount')</th>
                                <th>@lang('Remaining Balance')</th>
                                <th>@lang('Completed')</th>
                                <th>@lang('Trx Information')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $trx)
                        <tr>
                            <td>
                                <strong>{{ $trx->trx }}</strong>
                            </td>


                            <td class="budget">
                                <span
                                    class="fw-bold @if($trx->trx_type == '+')text-success @else text-danger @endif">
                                    {{ $trx->trx_type }} {{showAmount($trx->amount)}} {{ $general->cur_text
                                    }}
                                </span>
                            </td>

                            <td class="budget">
                                {{ showAmount($trx->post_balance) }} {{ __($general->cur_text) }}
                            </td>

                            <td>
                                {{ showDateTime($trx->created_at) }}<br>{{ diffForHumans($trx->created_at)
                                }}
                            </td>


                            <td>{{ __($trx->details) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-muted text-center text--white" colspan="100%">{{ __($emptyMessage) }}</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($transactions->hasPages())
                <div class="">
                    {{ paginateLinks($transactions) }}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
