@if (session()->has('status'))
    @if (session()->get('status'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-primary alert-dismissible border" role="alert">
                    <h6 class="alert-heading mb-1"><i class="bx bx-xs bx-check-circle align-top me-2"></i>{{ session()->get('title') }}</h6>
                    <span>{{ session()->get('message') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible border" role="alert">
                    <h6 class="alert-heading mb-1"><i class="bx bx-xs bx-error-alt align-top me-2"></i>{{ session()->get('title') }}</h6>
                    <span>{{ session()->get('message') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            </div>
        </div>
    @endif
@endif
