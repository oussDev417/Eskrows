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
                    <div class="row justify-content-end">
                        <div class="col-md-4">
                            <div class="new-ticket text-end">
                                <a href="{{ route('ticket.open') }}" class="btn btn--base p-2 mb-3">
                                    @lang('Create Ticket')<i class="las la-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tbl-wrap">
                        <table class="table table--responsive--lg">
                            <thead>
                                <tr>
                                    <th>@lang('Subject')</th>
                                    <th>@lang('Importance')</th>
                                    <th>@lang('Latest Response')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($supports as $support)
                                    <tr>
                                        <td>
                                            <a href="{{ route('ticket.view', $support->ticket) }}" class="fw-bold">
                                                [@lang('Ticket')#{{ $support->ticket }}] {{ __($support->subject) }} </a>
                                        </td>
                                        <td data-label="Description">
                                            @if ($support->priority == 1)
                                                @lang('Low')
                                            @elseif($support->priority == 2)
                                                @lang('Medium')
                                            @elseif($support->priority == 3)
                                                @lang('High')
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($support->last_reply)->diffForHumans() }} </td>
                                        <td>
                                            @php echo $support->statusBadge; @endphp
                                        </td>
                                        <td>
                                            <a href="{{ route('ticket.view', $support->ticket) }}"
                                                class="btn btn--sm btn--base">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                @if ($supports->hasPages())
                    <div class="">
                        {{ paginateLinks($supports) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
