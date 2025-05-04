@extends($activeTemplate . 'layouts.master')
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
                    <div class="row justify-content-end ">
                        <div class="col-md-4">
                            <form action="" autocomplete="off">
                                <div class="header-search-wrap">
                                    <div class="search-box header-search-hide-show text-end">
                                        <input type="text" name="search" value="{{ request()->search }}"
                                            class="form--control" placeholder="@lang('Search...')">
                                        <button type="submit" class="search-box__button"></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tbl-wrap">
                        <table class="table table--responsive--lg">
                            <thead>
                                <tr>
                                    <th >@lang('Payment Gateway')</th>
                                    <th class="text-center">@lang('Amount')</th>
                                    <th class="text-center">@lang('Currency Exchange')</th>
                                    <th class="text-center">@lang('Trx')</th>
                                    <th class="text-center">@lang('Initiated')</th>
                                    <th class="text-center">@lang('Transaction Status')</th>
                                    <th>@lang('Details')</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($deposits as $deposit)
                                    <tr>
                                        <td data-label="Transaction">
                                            <span class="fw--600">{{ __($deposit->gateway?->name) }}</span>
                                        </td>


                                        <td data-label="Amount" class="text-center">
                                            {{ __($general->cur_sym) }}{{ showAmount($deposit->amount + $deposit->charge) }}

                                        </td>
                                        <td data-label="Conversion" class="text-center">

                                            <strong>{{ showAmount($deposit->final_amo) }}
                                                {{ __($deposit->method_currency) }}</strong>
                                        </td>

                                        <td data-label="Trx" class="text-center">{{ __($deposit->trx) }}</td>

                                        <td data-label="Initiated" class="text-center">
                                            {{ showDateTime($deposit->created_at) }}
                                        </td>

                                        <td data-label="Status" class="text-center">
                                            @php echo $deposit->statusBadge @endphp
                                        </td>
                                        @php
                                            $details = $deposit->detail != null ? json_encode($deposit->detail) : null;
                                        @endphp

                                        <td data-label="Details">
                                            <a href="javascript:void(0)"
                                                class=" btn btn--sm btn--base text--black @if ($deposit->method_code >= 1000) detailBtn @else disabled @endif"
                                                @if ($deposit->method_code >= 1000) data-info="{{ $details }}" @endif
                                                @if ($deposit->status == 3) data-admin_feedback="{{ $deposit->admin_feedback }}" @endif>
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center text--white">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($deposits->hasPages())
                    <div class="">
                        {{ paginateLinks($deposits) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- APPROVE MODAL --}}
    <div id="detailModal" class="modal fade modal--base" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title">@lang('Details')</h5>
                    <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="las la-times"></i>
                    </span>
                </div>
                <div class="modal-body">
                    <ul class="list-group userData mb-2">

                    </ul>
                    <div class="feedback"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--base btn--sm" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .list-group-item{
            background-color: transparent !important;
            color: hsl(var(--white))
        }
    </style>
@endpush


@push('script')
    <script>
        (function($) {
            "use strict";
            $('.detailBtn').on('click', function() {
                var modal = $('#detailModal');

                var userData = $(this).data('info');
                var html = '';
                if (userData) {
                    userData.forEach(element => {
                        if (element.type != 'file') {
                            html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>${element.name}</span>
                                <span">${element.value}</span>
                            </li>`;
                        }
                    });
                }

                modal.find('.userData').html(html);

                if ($(this).data('admin_feedback') != undefined) {
                    var adminFeedback = `
                        <div class="my-3">
                            <strong>@lang('Admin Feedback')</strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
                } else {
                    var adminFeedback = '';
                }

                modal.find('.feedback').html(adminFeedback);


                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
