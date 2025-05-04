@extends($activeTemplate.'layouts.master')
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
                            <h5 class="title m-0">{{__($pageTitle)}}</h5>
                        
                        </div>

                        <div class="card-body conversations-wrap" data-mdb-perfect-scrollbar="true"
                            style="position: relative;">
                            <form action="{{ route('user.deposit.manual.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="text-center mt-2 text--white">@lang('You have requested') <b class="text-success">{{ showAmount($data['amount'])  }} {{__($general->cur_text)}}</b> , @lang('Please pay')
                                            <b class="text-success">{{showAmount($data['final_amo']) .' '.$data['method_currency'] }} </b> @lang('for successful payment')
                                        </p>
                            
                                        <p class="my-4 text-center">@php echo  $data->gateway->description @endphp</p>
                                    </div>

                                    <x-custom-form identifier="id" identifierValue="{{ $gateway->form_id }}"></x-custom-form>
    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn--base w-100 p-3">@lang('Pay Now')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
