
<div class="p-3 bg-dark text-white">
    <footer class="page-footer font-small stylish-color-dark pt-4">
        <!-- Footer Links -->
        <div class="container text-center text-md-left">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-4 mx-auto">
                    <!-- Content -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-success">Mind & Health</h5>
                    <p>Nossa missão é cuidar de você e de sua saúde. De uma forma, que só a M & H (Mind & Health) sabe.</p>
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none">
                <!-- Grid column -->
                <div class="col-md-2 mx-auto">
                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-success">Informações</h5>
                    <ul class="list-unstyled footerNav">
                        <li>
                            <a href="#sobre" class="text-white">Sobre</a>
                        </li>
                        <li>
                            <a href="#artigos" class="text-white">Artigos</a>
                        </li>
                        <li>
                            <a href="#produtos" class="text-white">Ebooks</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Termos e condições de uso</a>
                        </li>
                    </ul>
                </div>
                <!-- Grid column -->
                <hr class="clearfix w-100 d-md-none">
                <!-- Grid column -->
                <div class="col-md-2 mx-auto">
                    <!-- Links -->
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4 text-success">Atendimento</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-white">Dúvidas</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Ajuda</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">mindhealth@hotmail.com</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <!-- Grid column -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">

                        <!-- Links -->
                        <h3 class="font-weight-bold text-uppercase mt-3 mb-4 text-success text-center">Newsletter</h3>
                        <h6 class="font-weight-bold  mt-3 mb-4  text-center">Assine nossa newsletter e receba dicas e novidades para uma vida mais saudável</h6>
                        <!-- Icone Newsletter-->
                        <div class="thumbnail center well well-sm text-center">
                            <form action="{!! route('newsletters.store') !!}" method="post" role="form">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="email" class="form-control text-center" placeholder=">> SEU MELHOR E-MAIL AQUI! <<" aria-label="Recipiente para nickname" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="btnNewsLetter"><i class="fas fa-envelope mr-2"></i> Cadastrar</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social media Links/Links para rede social -->
            <hr>
            <div class="text-center py-3 ">
                <h3 class="font-weight-bold white-text  text-success text-center">Redes Sociais</h3>
                <ul class="list-inline redes text-center redesSociais">
                    <a href="https://www.facebook.com/Mind-Health-1017661845098135/?modal=admin_todo_tour" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                    <a href="https://www.instagram.com/mind_healthms/?hl=pt-b" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                    <a href="" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
                    <a href="" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
                </ul>
            </div>
            <hr>


            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 font-weight-bold">© 2019 Copyright:
                <a href="https://github.com/KennedyAndrade/Trabalho-Projeto-3/" class="text-success font-weight-bold"> Mind & Health</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
