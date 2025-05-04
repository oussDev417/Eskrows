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
                <div class="col-lg-5">
                    <div class="base--card radius--8">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-auto">
                                <h5 class="title mb-0">@lang(optional($escrow->category)->name)</h5>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('user.escrow.milestone', $escrow->id) }}" class="btn btn--base btn--sm">
                                    @lang('View Milestones') <i class="las la-angle-right"></i>
                                </a>
                            </div>
                        </div>

                        <div>
                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                <small class="fw--600 fs--16">@lang('Title')</small>
                                <span class="fs--16">{{ __($escrow->title) }}</span>
                            </div>

                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                <small class="fw--600 fs--16">@lang('Escrow Number')</small>
                                <span class="fs--16">{{ __($escrow->escrow_number) }}</span>
                            </div>

                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">

                                @if ($escrow->seller_id == auth()->user()->id || $escrow->seller_id == 0)
                                    <small class="fw--600 fs--16">@lang('Buyer\'s')</small>
                                @elseif($escrow->buyer_id == auth()->user()->id || $escrow->buyer_id == 0)
                                    <small class="fw--600 fs--16">@lang('Seller\'s')</small>
                                @endif

                                <span>
                                    @if ($escrow->seller_id == auth()->user()->id)
                                        {{ __($escrow->buyer->username ?? $escrow->mail_invitation) }}
                                    @else
                                        {{ __($escrow->seller->username ?? $escrow->mail_invitation) }}
                                    @endif
                                </span>

                            </div>

                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                <small class="fw--600 fs--16">@lang('Escrow Status')</small>

                                @if ($escrow->status == 0)
                                    <span class="badge badge--warning">@lang('Not accepted') </span>
                                @elseif($escrow->status == 1)
                                    <span class="badge badge--primary">@lang('Dispatched') </span>
                                @elseif($escrow->status == 2)
                                    <span class="badge badge--success">@lang('Accepted')</span>
                                @elseif($escrow->status == 3)
                                    <span class="badge badge--primary">@lang('Disputed') </span>
                                @else
                                    <span class="badge badge--danger">@lang('Cancel') </span>
                                @endif

                            </div>
                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                <small class="fw--600 fs--16">@lang('Amount')</small>
                                <span class="fs--16"> {{ showAmount($escrow->amount) }} {{ __($general->cur_text) }}</span>
                            </div>
                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                <small class="fw--600 fs--16">@lang('Charge')</small>
                                <span class="fs--16"> {{ showAmount($escrow->charge) }} {{ __($general->cur_text) }}</span>
                            </div>
                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                <small class="fw--600 fs--16">@lang('Payer of Charges')</small>
                                <span class="badge badge--success">
                                    @if ($escrow->charge_sender == 1)
                                        @lang('Seller')
                                    @elseif($escrow->charge_sender == 2)
                                        @lang('Buyer')
                                    @else
                                        @lang('Buyer(50%) - Seller(50%)')
                                    @endif
                                </span>
                            </div>
                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                <small class="fw--600 fs--16">@lang('Established  Milestone')</small>
                                <span class="fs--16"> {{ showAmount($created) }} {{ __($general->cur_text) }}</span>
                            </div>
                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                <small class="fw--600 fs--16">@lang('Paid Milestone ')</small>
                                <span class="fs--16"> {{ showAmount($funded) }} {{ __($general->cur_text) }} </span>
                            </div>
                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                <small class="fw--600 fs--16">@lang('Unpaid Milestone ')</small>
                                <span class="fs--16"> {{ showAmount($unfunded) }} {{ __($general->cur_text) }} </span>
                            </div>
                            <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                <small class="fw--600 fs--16">@lang('Remaining Amount')</small>
                                <span class="fs--16"> {{ showAmount($rest_amount) }} {{ __($general->cur_text) }} </span>
                            </div>

                            <div class="text-end">
                                @if ($escrow->status == 3)
                                    <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                        <small class="fw--600 fs--16">@lang('Disputed By')</small>
                                        <span class="fs--16"> {{ __($escrow->disputer->username) }} </span>
                                    </div>

                                    <div class="selling-group-item d-flex justify-content-between align-items-center my-2">
                                        <small class="fw--600 fs--16">@lang('Dispute Reason')</small>
                                        <span class="fs--16"> {{ __($escrow->dispute_reason) }} </span>
                                    </div>
                                @endif

                                @if ($escrow->status == 2)
                                    @if ($escrow->status != 3)
                                        <button type="button" class="btn btn--danger btn--sm text--white dispute mt-2"
                                            data-bs-toggle="modal" data-bs-target="#dispute"
                                            data-id="{{ $escrow->id }}">@lang('Dispute Escrow')</button>
                                    @endif
                                @endif

                                @if ($rest_amount <= 0 && $escrow->status == 0)
                                    <div class="alert alert-warning mt-2" role="alert"> @lang('Even though the entire sum has been paid, the escrow has not yet been approved. The escrow must be approved for the money to be sent.') </div>
                                @endif

                                @if (($escrow->inventor_id != auth()->user()->id && $escrow->status == 0) || $escrow->inventor_id != auth()->user()->id)
                                    @if ($escrow->status == 0)
                                        <a href="{{ route('user.escrow.accepted', $escrow->id) }}"
                                            class="btn btn--success btn--sm mt-2 text-white">@lang('Accept')</a>
                                    @endif
                                @endif

                                @if ($escrow->status == 0)
                                    @if ($escrow->seller_id == auth()->user()->id || $escrow->buyer_id == auth()->user()->id)
                                        <a href="{{ route('user.escrow.cancel', $escrow->id) }}"
                                            class="btn btn--danger btn--sm mt-2 text-white">@lang('Cancel')</a>
                                    @endif
                                @endif

                                @if ($rest_amount <= 0 && $escrow->status == 2 && $escrow->buyer_id == auth()->user()->id)
                                    <button class="btn btn--info btn--sm mt-2 ms-1 userConfirmationBtn text-white"
                                        data-action="{{ route('user.escrow.dispatch', $escrow->id) }}" data-method="Get"
                                        data-question="@lang('Are you sure to approve this transaction?')"><i class="fas fa-check"></i>
                                        @lang('Dispatch Payment')
                                    </button>
                                @endif

                                <!-- Button trigger modal -->
                                <a href="{{ route('user.escrow.conversations', $escrow->id) }}"
                                    class="btn btn--base btn--sm mt-2">@lang('Conversations')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade modal--base" id="dispute" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Are you sure to dispute?')</h5>
                    <button type="button" class="btn--close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>

                <form action="{{ route('user.escrow.dispute') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-gorup">
                            <input type="hidden" name="id">
                            <label for="">@lang('Remark')</label>
                            <textarea name="note" class="form--control" cols="15" rows="5" placeholder="@lang('Enter your reason')"></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn--base btn--sm">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-user-confirmation-modal></x-user-confirmation-modal>

@endsection

@push('script')
    <script>
        (function($) {
            "use strict";
            $('.dispute').on('click', function() {
                var modal = $('#dispute');
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
