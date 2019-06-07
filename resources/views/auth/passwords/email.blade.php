@extends('layouts.painel')

@section('content')

    <div class="form-body">
        <form method="post" action="{{ route('password.email') }}" class="col-form" >
            @csrf
            <div class="col-logo">
                <a href="{!! route('adm.index') !!}">
                    <img alt="" src="{!! asset('website/img/logo_pequena.png') !!}" class="img-responsive center-block" />
                </a>
            </div>
            <fieldset>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <section>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label class="control-label">E-mail</label>
                        <input class="form-control" placeholder="E-mail" type="text" name="email" value="{{ old('email') }}"/>
                        @if ($errors->has('email'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </section>
            </fieldset>
            <footer class="text-right">
                <button type="submit" class="btn btn-success btn-sm pull-right">Recuperar Senha</button>
                <a class="btn btn-default btn-sm classeButton" href="{!! route('login') !!}">Login</a>
            </footer>
        </div>
    </form>
</div>

@endsection
