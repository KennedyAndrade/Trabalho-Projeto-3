@extends('layouts.painel')

@section('content')

    <div class="form-body">
        <form method="post" action="{{ route('password.update') }}" class="col-form" >
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="col-logo">
                <a href="{!! route('adm.index') !!}">
                    <img alt="" src="{!! asset('website/img/logo_pequena.png') !!}" class="img-responsive center-block" />
                </a>
            </div>
            <fieldset>
                <div class="form-group">
                    <label for="email">{{ __('E-Mail') }}</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Nova senha') }}</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirme a senha') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </fieldset>
            <footer class="text-right">
                <button type="submit" class="btn btn-success btn-sm pull-right">Redefinir senha</button>
            </footer>
        </form>
    </div>

@endsection
