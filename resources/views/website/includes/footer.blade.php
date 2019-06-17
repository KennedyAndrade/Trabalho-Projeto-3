
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
                            <a href="javascript:void(0)" class="text-white" data-toggle="modal" data-target="#termos">Termos e condições de uso</a>
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
                            <a href="#!" class="text-white">mindhealth87@gmail.com</a>
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


    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="termos" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="termos">Termos e condições de uso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Aos usuários da Mind & Health,
                        obrigado por dedicar este tempo para ler o Termos e Condições do site Mind & Health.
                    </p>

                    <p>
                        Estas informações o ajudarão a utilizar a Plataforma da Mind & Health.
                        É muito importante que conheça as nossas políticas, como protegemosos seus dados e o seu dinheiro,
                        por esta razão, é necessário que leia e compreenda os Termos e condições de uso do Mind & Health, em
                        especial as cláusulas a seguir destacadas:
                    </p>

                    <ol class="text-justify">
                        <li>
                            <p>Nosso site oferece informações em artigos e em e-books gratuitos e e-books pagos. <b>E isso não exclui a
                            consulta de um profissional da saúde</b>, caso algo não fique claro e você tenha problemas de saúde.</p>
                        </li>

                        <li>
                            <p><b>Não poderão cadastrar-se e tampouco utilizar os serviços do Mind & Health os menores de 18 anos</b>, pessoas que
                            não tenham capacidade para contratar ou aqueles usuários que tenham dados cadastrais com irregularidades ou que
                            tenham sido suspensos da plataforma do Mind & Health, temporária ou definitivamente.</p>
                        </li>

                        <li>
                            <p><b>O usuário é o único responsável pelos dados cadastrais fornecidos</b>. O fornecimento de informações falsas ou
                            incorretas poderá sujeitar o Usuário à responsabilização nas esferas cível, administrativa e criminal, na
                            forma prevista em lei.</p>
                        </li>
                        <li>
                            <p><b>A senha de utilização do Mind & Health é pessoal e intransferível</b>. Em caso de tentativa de acesso indevido ou
                            não autorizado, o Usuário deverá comunicar a Mind & Health o mais rápido possível.</p>
                        </li>

                        <li>
                            <p><b>Cadastro</b>. Apenas será confirmado o cadastramento do Usuário que preencher todos os campos obrigatórios do
                            cadastro, com informações exatas, precisas e verdadeiras. O Usuário declara e assume o compromisso de atualizar
                            os dados inseridos em seu cadastro (“Dados Pessoais”) sempre que for necessário. Ao se cadastrar no Mind & Health,
                            o Usuário poderá utilizar todos os serviços disponibilizados, declarando, para tanto, ter lido, compreendido e
                            aceitado os respectivos Termos e Condições de uso de cada um destes serviços que passam a fazer parte integrante
                            destes Termos e condições gerais quando concluído o cadastro. O Usuário poderá acessar sua conta através de e-mail
                            ou apelido (login) e senha e compromete-se a não informar a terceiros esses dados, responsabilizando-se integralmente
                            pelo uso que deles seja feito.</p>
                        </li>

                        <li>
                            <p><b>Direitos Autorais</b>. A Mind & Health, garante o direito nos códigos de programação e garante os direitos autorais
                            e copyright do site. Em caso de cópias, não concedidas, o infrator será penalizado perante a: <a href="http://www.planalto.gov.br/ccivil_03/leis/l9610.htm" target="blank">Lei nº. 9.610/98</a></p>
                        </li>

                        <li>
                            <p><b>Mudanças nos Termos e Condições de Uso</b>. Nosso contrato e documentos de Termos e Condições de Uso, <b>poderá ser
                            modificado a qualquer momento</b>, ao concordar com o esse documento de Termos e Condições de Uso, você terá ciência,
                            com todos os termos e possíveis mudanças.</p>
                        </li>

                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
