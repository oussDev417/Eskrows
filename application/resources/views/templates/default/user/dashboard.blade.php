@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="dashboard-container-wrap">
        <div class="dashboard-body">
            <div class="container-fluid">
                <!-- < dashboard header -->
                @include($activeTemplate . 'partials.user.dashboard_header')
                <!-- dashboard header /> -->
                <div class="row gy-4 pb-4">
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('user.deposit') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">@lang('Balance')</h6>

                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fa-solid fa-coins"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $general->cur_sym }}
                                        {{ showAmount($user['balance']) }}</h6>
                                    <p class="">@lang('Total') {{showAmount($user['balance']).' '. $general->cur_text }}
                                        </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('user.deposit.history') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">@lang('Deposit')</h6>
                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fa-solid fa-money-bill-1-wave"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $general->cur_sym }}
                                        {{ showAmount($user['total_deposit']) }}</h6>
                                    <p class=""> @lang('Total') {{ showAmount($user['total_deposit']).' '. $general->cur_text }}
                                        </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('user.withdraw.history') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">@lang('Withdraw')</h6>
                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fa-regular fa-file-lines"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">
                                        {{ $general->cur_sym . ' ' . showAmount($user['total_withdraw']) }}
                                    </h6>
                                    <p class="">
                                        @lang('Total') {{ showAmount($user['total_withdraw']).' '. $general->cur_text }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('ticket.open') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">
                                        @lang('Support Ticket')
                                    </h6>
                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fa-solid fa-ticket"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $user['total_ticket'] }}</h6>
                                    <p class="">@lang('Open Ticket')</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('ticket.open') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">
                                        @lang('Reply Ticket')
                                    </h6>
                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fas fa-reply"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $user['reply_ticket'] }}</h6>
                                    <p class="">@lang('Reply Ticket')</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('ticket') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">
                                        @lang('View Ticket')
                                    </h6>
                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fas fa-times-circle"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $user['close_ticket'] }}</h6>
                                    <p class="">@lang('Close Ticket')</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('user.escrow.list') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">
                                        @lang('Escrow')
                                    </h6>
                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $escrow['total'] }}</h6>
                                    <p class="">@lang('Total Escrow')</p>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('user.escrow.list') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">@lang('Not Accepted Escrow')</h6>

                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fas fa-handshake-slash"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $escrow['not_accepted'] }}</h6>
                                    <p class="">@lang('Total Not Accepted')</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('user.escrow.list') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">@lang('Running Escrow')</h6>
                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fas fa-redo"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $escrow['running'] }}</h6>
                                    <p class="">@lang('Total Running')</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('user.escrow.list') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">
                                        @lang('Completed Escrow')
                                    </h6>

                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $escrow['dispatched'] }}</h6>
                                    <p class="">@lang('Total Completed')</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('user.escrow.list') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">
                                        @lang('Disputed Escrow')
                                    </h6>

                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fas fa-pause-circle"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $escrow['disputed'] }}</h6>
                                    <p class="">@lang('Total Disputed')</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-sm-6">
                        <a class="d-block" href="{{ route('user.escrow.list') }}">
                            <div class="wizard-card d-flex flex-column gap--8 position-relative radius--24">
                                <div class="content-wrap d-flex align-items-center justify-content-between gap--12">
                                    <h6 class="title fw--700 fs--16 mb-0">
                                        @lang('Canceled Escrow')
                                    </h6>

                                    <div
                                        class="icon-wrap d-flex justify-content-center align-items-center position-relative overflow-hidden z--1">
                                        <i class="fas fa-window-close"></i>
                                    </div>
                                </div>
                                <div class="amount-wrap">
                                    <h6 class="amount mb-2">{{ $escrow['canceled'] }}</h6>
                                    <p class="">@lang('Total Canceled')</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row m-0">
                <div class="col-lg-12">
                    <div class="tbl-wrap">

                        <h6 class="mb-4">@lang('Recent Escrow')</h6>
                        <table class="table table--responsive--lg">
                            <thead>
                                <tr>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Category')</th>
                                    <th>@lang('Amount with Charge')</th>
                                    <th>@lang('Payer of Charges')</th>
                                    <th>@lang('Number')</th>
                                    <th>@lang('Buyer - Seller')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($escrows as $key=>$item)
                                    <tr>
                                        <td data-label="Title"> {{ __($item->title) }} </td>
                                        <td> {{ __(@$item->category->name) }} </td>
                                        <td data-label="Amount">{{ $general->cur_sym }}{{ showAmount($item->amount + $item->charge) }}</td>
                                        <td data-label="Charge Payer">
                                            @if ($item->charge_sender == 1)
                                                @lang('Seller')
                                            @elseif($item->charge_sender == 2)
                                                @lang('Buyer')
                                            @else
                                                @lang('50% - 50%')
                                            @endif
                                        </td>
                                        <td>{{ __($item->escrow_number) }}</td>

                                        <td>
                                            @if ($item->seller_id == auth()->user()->id)
                                                <span>@lang('Selling to')
                                                    {{ __(@$item->buyer?->username ?? $item->mail_invitation) }}
                                                </span>
                                            @else
                                                <span>@lang('Buying from')
                                                    {{ __(@$item->seller?->username ?? $item->mail_invitation) }}
                                                </span>
                                            @endif
                                        </td>

                                        <td data-label="Action">
                                            @if ($item->status == 0)
                                                <span class="badge badge--warning">@lang('Not Accepted')</span>
                                            @elseif($item->status == 1)
                                                <span class="badge badge--success">@lang('Dispatched')</span>
                                            @elseif($item->status == 2)
                                                <span class="badge badge--success">@lang('Accepted')</span>
                                            @elseif($item->status == 3)
                                                <span class="badge badge--primary">@lang('Disputed')</span>
                                            @else
                                                <span class="badge badge--danger">@lang('Canceled')</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('user.escrow.details', $item->id) }}"
                                                class="tbl-btn--sm p-3 btn btn--sm btn--base"><i class="fas fa-eye"></i></a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center text--white" colspan="100%">
                                            {{ __($emptyMessage) }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
