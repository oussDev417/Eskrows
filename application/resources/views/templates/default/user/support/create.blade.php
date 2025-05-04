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
                <div class="col-lg-8">
                    <div class="base--card radius--8">
                        <form action="{{ route('ticket.store') }}" method="post" enctype="multipart/form-data"
                            onsubmit="return submitUserForm();">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-lg-12">
                                    <h4 class="mb-1">@lang('Open New Ticket')</h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name"
                                            class="form--label required text--white">@lang(' Full Name')</label>
                                        <input type="text" name="name"
                                            value="{{ @$user->firstname . ' ' . @$user->lastname }}"
                                            class="form-control form--control" required readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="form--label required text--white">
                                            @lang('Your Email')
                                        </label>
                                        <input type="email" name="email" value="{{ @$user->email }}"
                                            class="form-control form--control" required readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="country" class="form--label required text--white">@lang('Subject')
                                        </label>
                                        <input type="text" name="subject" value="{{ old('subject') }}"
                                            class="form-control form--control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label required" for="gateway">@lang('Importance')</label>
                                        <select name="priority" class="form-select form--control" id="gateway">
                                            <option value="3">@lang('Top')</option>
                                            <option value="2">@lang('Middle')</option>
                                            <option value="1">@lang('Base')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="email"
                                            class="form--label text--white required">@lang('Message')</label>
                                        <textarea name="message" id="inputMessage" rows="6" class="form-control form--control" required>{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <button type="submit" class="btn btn--base btn--sm addFile">@lang('Add File') <i
                                            class="las la-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="attachment_wrapper mb-4">
                                    <div class="form-group profile mb-15">
                                        <label class="form-label">@lang('Attachments')</label> <small
                                            class="text-danger">@lang('Max 5 files can be uploaded'). @lang('Maximum upload size is')
                                            {{ ini_get('upload_max_filesize') }}</small>

                                        <input type="file" name="attachments[]" id="inputAttachments"
                                            class="form-control form--control mb-2" />
                                        <div id="fileUploadsContainer"></div>
                                        <p class="ticket-attachments-message text--white">
                                            @lang('Allowed File Extensions'): .@lang('jpg'), .@lang('jpeg'),
                                            .@lang('png'),
                                            .@lang('pdf'), .@lang('doc'), .@lang('docx')
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 text-end">
                                <button type="submit" class="btn btn--base text-end btn--lg">@lang('Submit')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .input-group-text:focus {
            box-shadow: none !important;
        }

        input[type="file"]::-webkit-file-upload-button {
            background-color: hsl(var(--base)) !important;
            color: hsl(var(--white)) !important;

        }

        
    </style>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";
            var fileAdded = 0;
            $('.addFile').on('click', function() {
                if (fileAdded >= 4) {
                    notify('error', 'You\'ve added maximum number of file');
                    return false;
                }
                fileAdded++;
                $("#fileUploadsContainer").append(`
                    <div class="input-group my-3">
                        <input type="file" name="attachments[]" class="form-control form--control" required />
                        <button class="input-group-text btn--danger remove-btn text--white border border-0"><i class="las la-times"></i></button>
                    </div>
                `)
            });
            $(document).on('click', '.remove-btn', function() {
                fileAdded--;
                $(this).closest('.input-group').remove();
            });
        })(jQuery);
    </script>
@endpush
