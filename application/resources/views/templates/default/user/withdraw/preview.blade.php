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
                 
                        <h4 class="contact__title"> @lang('Withdraw Via') {{ $withdraw->method->name }}</h4>
                    </div>
                    <div class="card-body conversations-wrap" data-mdb-perfect-scrollbar="true"
                        style="position: relative;">
                        <form action="{{route('user.withdraw.submit')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                @php
                                echo $withdraw->method->description;
                                @endphp
                            </div>
                            <x-custom-form identifier="id" identifierValue="{{ $withdraw->method->form_id }}"></x-custom-form>
                            @if(auth()->user()->ts)
                            <div class="form-group ">
                                <label>@lang('Google Authenticator Code')</label>
                                <input type="text" name="authenticator_code" class="form-control form--control" required>
                            </div>
                            @endif
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn--base w-100 p-3">@lang('Save')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
