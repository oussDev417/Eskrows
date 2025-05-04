@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="dashboard-container-wrap">
        <div class="dashboard-body">
            <div class="container-fluid">
                <!-- < dashboard header -->
                @include($activeTemplate . 'partials.user.dashboard_header')
                <!-- dashboard header /> -->
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4">
                    <div class="dashboard_profile-card">
                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="user-profile text-center">
                                <div class="dashboard_profile_wrap">
                                    <div class="profile_photo mb-2">
                                        <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image, getFileSize('userProfile')) }}"
                                            alt="agent" />
                                        <div class="photo_upload">
                                            <label for="photo_upload"><i class="fa-regular fa-image"></i></label>
                                            <input id="photo_upload" type="file" name="image" class="upload_file"
                                                onchange="this.form.submit()" />
                                        </div>
                                    </div>
                                    <div class="profile-details">
                                        <ul>
                                            <li>
                                                <p class="user-name fs--20 text--white">
                                                    {{ '@' . @$user->username }}
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="contact-info">
                            <div class="info-wrap">
                                <div class="info">
                                    <i class="fa-regular fa-envelope"></i>
                                    <p class="text--white">@lang('Email Address')</p>
                                </div>
                                <span class="text--white">{{ @$user->email }}</span>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="info-wrap">
                                <div class="info">
                                    <i class="fa-solid fa-phone"></i>
                                    <p class="text--white">@lang('Mobile Number')</p>
                                </div>
                                <span class="text--white">{{ @$user->mobile }}</span>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="info-wrap border-bottom--none">
                                <div class="info">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p class="text--white">@lang('Address')</p>
                                </div>
                                <span class="text--white">{{ @$user->address->address }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 justify-content-center">
                    <div class="base--card radius--8">
                        <form class="register" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-lg-12">
                                    <h4 class="mb-1">@lang('Personal Information')</h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form--label text--white ">
                                            @lang('First Name')</label>
                                        <input type="text" class="form--control" id="name"
                                            placeholder="Full Name" name="firstname" value="{{ $user->firstname }}" />
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="lastname"
                                            class="form--label required text-white">@lang('Last Name')</label>
                                        <input type="text" class="form-control form--control"
                                            name="lastname" value="{{ $user->lastname }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="lastname" class="form--label text--white">
                                            User Name</label>
                                        <input type="text" class="form--control" id="lastname"
                                            placeholder="User Name" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email"
                                            class="form--label text-white">@lang('Your Email')
                                        </label>
                                        <input class="form-control form--control" value="{{ $user->email }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label for="your-password"
                                            class="form--label text-white">@lang('Phone')</label>
                                        <input class="form-control form--control" value="{{ $user->mobile }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label
                                                class="form--label text-white mt-3">@lang('Address')</label>
                                            <input type="text" class="form-control form--control"
                                                name="address" value="{{ @$user->address->address }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label
                                                class="form--label text-white mt-3">@lang('State')</label>
                                            <input type="text" class="form-control form--control"
                                                name="state" value="{{ @$user->address->state }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="zip"
                                                class="form--label required text-white mt-3">
                                                @lang('Zip Code')</label>
                                            <input type="text" class="form-control form--control"
                                                name="zip" value="{{ @$user->address->zip }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label
                                                class="form--label mt-3 text-white">@lang('City')</label>
                                            <input type="text" class="form-control form--control"
                                                name="city" value="{{ @$user->address->city }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label
                                                class="form--label mt-3 text-white">@lang('Country')</label>
                                            <input class="form-control form--control"
                                                value="{{ @$user->address->country }}" disabled>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn--base w-100 btn--lg">
                                        @lang('update')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
