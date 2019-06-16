@extends('layouts.painel')

@section('content')
    <div class="form-body">
        <form method="post" action="{!! route('register') !!}" class="col-form" novalidate="">
            @csrf
            <div class="col-logo"><a href="{!! route('website') !!}"><img alt="" src="{!! asset('website/img/logo_pequena.png') !!}"></a></div>
            <fieldset>
                <section>
                    <div class="form-group has-feedback">
                        <label class="control-label">Nome</label>
                        <input class="form-control" placeholder="Nome" type="text" name="name" value="{{ old('name') }}">
                        <span class="fa fa-user form-control-feedback" aria-hidden="true"></span>
                    </div>
                </section>

                <section>
                    <div class="form-group has-feedback">
                        <label class="control-label">E-mail</label>
                        <input class="form-control" placeholder="E-mail" type="text" name="email" value="{{ old('email') }}">
                        <span class="fa fa-envelope form-control-feedback" aria-hidden="true"></span>
                    </div>
                </section>

                <section>
                    <div class="form-group has-feedback">
                        <label class="control-label">Senha</label>
                        <input class="form-control" placeholder="Senha" type="password" name="password" id="password" value="{{ old('password') }}">
                        <meter max="4" id="password-strength-meter"></meter>
                        <p id="password-strength-text"></p>
                        <span class="fa fa-lock form-control-feedback" aria-hidden="true"></span>
                    </div>
                </section>

                <section>
                    <div class="form-group has-feedback">
                        <label class="control-label">Confirmação de Senha</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <span class="fa fa-lock form-control-feedback" aria-hidden="true"></span>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <label class="checkbox">
                                <input name="remember" checked="" type="checkbox">
                                <i></i>Concordo com os termos e política
                            </label>
                        </div>
                    </div>
                </section>
            </fieldset>
            <footer class="text-right">
                <button type="submit" class="btn btn-info pull-right">Registrar</button>
                <a href="{!! route('login') !!}" class="button button-secondary">Login</a>
            </footer>
        </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>
    <script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    var strength = {
        0: "Muito ruim ☹",
        1: "Ruim ☹",
        2: "Fraca ☹",
        3: "Boa ☺",
        4: "Forte ☻"
    }

    var password = document.getElementById('password');
    var meter = document.getElementById('password-strength-meter');
    var text = document.getElementById('password-strength-text');

    password.addEventListener('input', function()
    {
        var val = password.value;
        var result = zxcvbn(val);

        // Update the password strength meter
        meter.value = result.score;

        // Update the text indicator
        if(val !== "") {
            text.innerHTML = "Força: " + "<strong>" + strength[result.score] + "</strong>" + "<span class='feedback'>" +  " " + "</span>";
        }
        else {
            text.innerHTML = "";
        }
    });
    </script>

@endsection
