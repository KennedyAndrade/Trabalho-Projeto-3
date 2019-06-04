<section class="section" id="artigos">

    <h1 class="section-header text-center">Artigos</h1>
    <div class="container-fluid">
        <div class="row justify-content-center">

            @foreach ($artigos as $artigo)
                <div class="col-md-3 col-lg-2">
                    <div class="card">
                        <img href="" src="{!! \Storage::url($artigo->img_small) !!}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="pag_1.php" class="card-link">{{ $artigo->titulo }}</a>
                            <p class="card-text"><small class="text-muted">{{ $artigo->descricao }}</small></p>
                        </div>
                        <div class="card-footer">
                            <p><small>Criado em {{ $artigo->created_at->format('d/m/Y') }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</section>
