@extends('layouts.painel')

@section('content')
    <div class="form-body">
        <form method="post" action="{!! route('register') !!}" class="col-form" novalidate="">
            @csrf
            <div class="col-logo"><a href="{!! route('website') !!}"><img alt="" src="{!! asset('painel/img/logo-lg.png') !!}"></a></div>
            <header>Register</header>
            <fieldset>
                <section>
                    <div class="form-group has-feedback">
                        <label class="control-label">Nome</label>
                        <input class="form-control" placeholder="Nome" type="text" name="name" value="{{ old('name') }}">
                        <span class="fa fa-user form-control-feedback" aria-hidden="true"></span> </div>
                    </section>

                    <section>
                        <div class="form-group has-feedback">
                            <label class="control-label">E-mail</label>
                            <input class="form-control" placeholder="E-mail" type="text" name="email" value="{{ old('email') }}">
                            <span class="fa fa-envelope form-control-feedback" aria-hidden="true"></span> </div>
                        </section>

                        <section>
                            <div class="form-group has-feedback">
                                <label class="control-label">Senha</label>
                                <input class="form-control" placeholder="Senha" type="password" name="password" value="{{ old('password') }}">
                                <span class="fa fa-lock form-control-feedback" aria-hidden="true"></span> </div>
                            </section>

                        <section>
                            <div class="form-group has-feedback">
                                <label class="control-label">Confirmação de Senha</label>
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <span class="fa fa-lock form-control-feedback" aria-hidden="true"></span> </div>
                            </section>
                            <section>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <label class="checkbox">
                                            <input name="remember" checked="" type="checkbox">
                                            <i></i>Concordo com os termos e política </label>
                                        </div>
                                    </div>
                                </section>
                            </fieldset>
                            <footer class="text-right">
                                <button type="submit" class="btn btn-info pull-right">Registrar</button>
                                <a href="{!! route('login') !!}" class="button button-secondary">Login</a> </footer>
                            </form>
                        </div>
                    @endsection
