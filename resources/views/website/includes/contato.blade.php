
<section class="e-books section" id="contato">
    <div class="title text-center">
        <h1 class="section-header text-center">Contato</h1>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <form action="{!! route('contato.store') !!}" method="post">
                    @csrf
                    <div class="form-group text-center">
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="text" class="form-control" name="telefone" id="telefone" placeholder="Telefone" required>
                    </div>
                    <div class="form-group text-center">
                        <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" name="mensagem" id="mensagem" placeholder="Mensagem" required></textarea>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-primary btn-lg text-center bg-success border border-success" id="btnContato" type="button" value="Enviar">
                    </div>
                    <br>
                    <br>
                </form>
            </div>
            <div class="col-md-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.09175121772!2d-45.42809768553662!3d-23.63688498464551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cd631551d2d585%3A0xbe6efd4b81fb3cd0!2sInstituto+Federal+de+Educa%C3%A7%C3%A3o%2C+Ci%C3%AAncia+e+Tecnologia+de+S%C3%A3o+Paulo%2C+Campus+Caraguatatuba!5e0!3m2!1spt-BR!2sbr!4v1558926232408!5m2!1spt-BR!2sbr" width="150%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
