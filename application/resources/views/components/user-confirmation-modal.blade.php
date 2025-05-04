<div id="userConfirmationModal" class="modal fade modal--base" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <h5 class="modal-title">@lang('Confirmation Alert!')</h5>
          
                <button type="button" class="btn--close" data-bs-dismiss="modal" aria-label="Close"><i
                    class="fa-solid fa-xmark"></i></button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <p class="question"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-bs-dismiss="modal">@lang('No')</button>
                    <button type="submit" class="btn btn--base">@lang('Yes')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')

<script>
    (function ($) {
        "use strict";
        $(document).on('click','.userConfirmationBtn', function () {
            var modal   = $('#userConfirmationModal');
            let data    = $(this).data();
            modal.find('.question').text(`${data.question}`);
            modal.find('form').attr('action', `${data.action}`);
            modal.find('form').attr('method', `${data.method}`);
            modal.modal('show');
        });
    })(jQuery);
</script>
@endpush
