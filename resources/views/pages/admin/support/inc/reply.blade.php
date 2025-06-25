<div class="card mt-3">
    <div class="card-body">
        <form method="POST" class="needs-validation" action="{{-- route('messages.reply') --}}" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <input type="hidden" name="support_id" value="{{ $ticket->id }}" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label for="comment" class="form-label fw-bold">Reply <span class="text-danger">*</span></label>
                    <textarea id="comment" class="form-control" name="comment" required></textarea>
                    <div class="invalid-feedback">
                        This is a required field.
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 col-sm-12 col-xs-12 text-end">
                    <button type="submit" class="btn btn-de-primary"><span>Send</span> <i class="far fa-paper-plane ms-2"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>