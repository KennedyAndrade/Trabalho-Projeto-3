<section class="e-books" id="produtos">
    <h1 class="section-header text-center">Produtos</h1>
    <div class="container">
        <div class="row justify-content-md-center">
            @foreach ($produtos as $produto)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{  \Storage::url($produto->foto) }}" class="img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produto->nome }}</h5>
                            <p class="card-text">{{ $produto->descricao }}</p>

                            {{-- se o produto for de graça, o botão de download irá aparecer --}}
                            @if ($produto->free)
                                <a href="{!! route('download.ebook', $produto->id) !!}" target="_blank" class="btn btn-success btn-block">Baixar</a>

                            {{-- caso o produto não seja de graça, fazer as verificaçôes --}}
                            @else

                                {{-- caso o usuário esteja logado --}}
                                @if (Auth::check())

                                    {{-- caso o usuário tenha feito a compra --}}
                                    @if ( $prod = Auth::user()->vendas()->where('produto_id', $produto->id)->first())

                                        {{-- caso o status da compra seja 3 ou 4 (status do pagseguro)  liberar o link de download--}}
                                        @if ($prod->status >= 3 && $prod->status <= 4)
                                            <a href="{!! route('download.ebook', $produto->id) !!}" target="_blank" class="btn btn-success btn-block">Baixar</a>

                                        {{-- caso o status seja diferente de pago, liberar o link para pagamento --}}
                                        @else
                                            <a href="{{ $prod->link}}" target="_blank" class="btn btn-primary btn-block">Pagar</a>
                                        @endif

                                    {{-- link de compra do ebook --}}
                                    @else
                                        <a href="{!! route('compra.ebook', $produto->id) !!}" class="btn btn-primary btn-block">Comprar</a>
                                    @endif

                                {{-- caso o usuário não esteja logado --}}
                                @else
                                    <a href="{!! route('login') !!}" class="btn btn-primary btn-block">Comprar</a>
                                @endif

                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
