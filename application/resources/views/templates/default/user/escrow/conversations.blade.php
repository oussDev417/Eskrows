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
                        <div class="card-header selling-header justify-content-between d-flex align-items-center">
                            <h5 class="title m-0">@lang('Replies')</h5>
                            <div class="d-flex gap--12">
                            
                                <a href="{{route('user.escrow.details',$escrow->id)}}" class="btn brn--base btn--sm text--white bg--base">@lang('Back')</a>
                                <a href="" class="btn brn--base btn--sm text--white bg--base"><i
                                        class="las la-redo-alt"></i></a>
                            </div>
                        </div>

                        <div class="card-body conversations-wrap msg-list-wraper" data-mdb-perfect-scrollbar="true"
                            style="position: relative; height: 400px; overflow-y: scroll;">
                            @foreach ($messages as $item)
                                @if ($item->sender_id == auth()->user()->id)
                                    <div class="message-wrap pe-4">
                                        <ul class="list message-list message-right text-end">
                                            <div class="message-list__item">
                                                <div class="message-send">
                                                    <div class="message-send__content section-bg-two">
                                                        <p class="message-send__text mb-0"> {{ __($item->message) }}</p>
                                                    </div>
                                                    <ul class="list d-flex message-send__history  justify-content-end mb-3">
                                                        <div class="message-receive__history-item">
                                                            {{ $item->created_at->format('h:i A') }},
                                                        </div>
                                                        <div class="message-receive__history-item">
                                                            {{ diffForHumans($item->created_at) }}</div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                @else
                                    <div class="message-wrap">
                                        <ul class="list message-list message-left">
                                            <div class="message-list__item">
                                                <div class="message-send">
                                                    <div class="message-send__content">
                                                        <p class="message-send__text mb-0"> {{ __($item->message) }}</p>
                                                    </div>
                                                    <ul class="list d-flex message-send__history ">
                                                        <div class="message-receive__history-item">
                                                            {{ $item->created_at->format('h:i A') }},
                                                        </div>
                                                        <div class="message-receive__history-item">
                                                            {{ diffForHumans($item->created_at) }}</div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <form method="post">
                            @csrf
                            <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                @if ($escrow->status == 2)
                                    <input type="text" name="message" class="form--control form--control-lg"
                                        id="exampleFormControlInput1" placeholder="@lang('Type message ...')">
                                    <button class="ms-3" type="submit"><i
                                            class="fas fa-paper-plane text--base"></i></button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('script')
    <script>
        $(function() {
            var chatBox = $('.msg-list-wraper')[0];
            if (chatBox) {
                chatBox.scrollTop = chatBox.scrollHeight;
            } else {
                
            }
        });
    </script>
@endpush
