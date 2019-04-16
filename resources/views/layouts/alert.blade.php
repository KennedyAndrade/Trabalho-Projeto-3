@foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('flash-' . $msg))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-{{ $msg }} alert-dismissible" role="alert">
                    <button aria-label="Close" data-dismiss="alert" class="close" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ Session::get('flash-' . $msg) }}
                </div>
            </div>
        </div>
    @endif
@endforeach
