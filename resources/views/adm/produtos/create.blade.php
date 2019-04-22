@extends('layouts.painel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @breadcrumb(['title' => 'Produtos'])
        <li><a href="{!! route('adm.index') !!}" ><i class="fa fa-th"></i> Painel</a></li>
        <li><a href="{!! route('adm.produtos.index') !!}" ><i class="fa fa-cubes"></i> Produtos</a></li>
        <li class="active"><i class="fa fa-plus"></i> Criar</li>
        @endbreadcrumb

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <form action="{!! route('adm.produtos.store') !!}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="chart-box">
                            <div class="row">
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label>Nome</label>
                                        <input class="form-control" name="nome" type="text" value="{{ old('nome') }}" >
                                    </fieldset>
                                </div>

                                <div class="col-md-2">
                                    <fieldset class="form-group">
                                        <label>Preço</label>
                                        <input class="form-control" name="preco" type="number" value="{{ old('preco') }}" >
                                    </fieldset>
                                </div>

                                <div class="col-md-2">
                                    <fieldset class="form-group">
                                        <label>Desconto ativo?</label>
                                        <select class="form-control" name="desconto">
                                            <option value="0" {{ old('desconto') }}>Não</option>
                                            <option value="1" {{ old('desconto') }}>Sim</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-md-2">
                                    <fieldset class="form-group">
                                        <label>Desconto</label>
                                        <input class="form-control" name="preco_desconto" type="number" placeholder="%" step="0.01" min="0" max="100" value="{{ old('preco_desconto') }}" >
                                    </fieldset>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Salvar</button>
                        <hr>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
