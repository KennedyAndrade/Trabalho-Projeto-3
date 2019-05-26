@extends('layouts.painel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @breadcrumb(['title' => 'Produtos'])
        <li><a href="{!! route('adm.index') !!}" ><i class="fa fa-th"></i> Painel</a></li>
        <li><a href="{!! route('adm.produtos.index') !!}" ><i class="fa fa-cubes"></i> Produtos</a></li>
        <li class="active"><i class="fa fa-edit"></i> Editar</li>
        <li class="active">{{ $produto->id }}</li>

        @endbreadcrumb

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <form action="{!! route('adm.produtos.update', $produto->id) !!}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="col-md-12">
                        <div class="chart-box">
                            <div class="row">
                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label>Nome</label>
                                        <input class="form-control" name="nome" type="text" value="{{ old('nome', $produto->nome) }}" >
                                    </fieldset>
                                </div>

                                <div class="col-md-2">
                                    <fieldset class="form-group">
                                        <label>Preço</label>
                                        <input class="form-control" name="preco" type="number" value="{{ old('preco', $produto->preco) }}" >
                                    </fieldset>
                                </div>

                                <div class="col-md-2">
                                    <fieldset class="form-group">
                                        <label>Desconto ativo?</label>
                                        <select class="form-control" name="desconto" style="padding: 5px 10px">
                                            <option value="0" {{ (old('desconto', $produto->desconto) == 0) ? 'selected' : '' }}>Não</option>
                                            <option value="1" {{ (old('desconto', $produto->desconto) == 1) ? 'selected' : '' }}>Sim</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-md-2">
                                    <fieldset class="form-group">
                                        <label>Desconto</label>
                                        <input class="form-control" name="preco_desconto" type="number" placeholder="%" step="0.01" min="0" max="100" value="{{ old('preco_desconto', $produto->preco_desconto) }}" >
                                    </fieldset>
                                </div>

                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <label>Descrição</label>
                                        <textarea name="descricao" class="form-control">{{ old('descricao', $produto->descricao) }}</textarea>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label>Autor</label>
                                        <input type="text" name="autor" class="form-control" value="{{ old('autor', $produto->autor) }}">
                                    </fieldset>
                                </div>

                                <div class="col-md-3">
                                    <fieldset class="form-group">
                                        <label>Data de emissão</label>
                                        <input type="date" name="dt_emissao" class="form-control" style="line-height: 15px" value="{{ old('dt_emissao', $produto->dt_emissao) }}">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>Imagem</label>
                                        <input type="file" name="foto">
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>PDF</label>
                                        <input type="file" name="arquivo">
                                    </fieldset>
                                </div>

                                <div class="col-md-12">
                                    <fieldset class="form-group">
                                        <div class="checkbox">
                                            <label style="line-height: 22px;">
                                                <input name="free" type="checkbox"  {{ ($produto->free) ? 'checked' : '' }}>
                                                Produto gratuito? </label>
                                            </div>
                                        </fieldset>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Salvar</button>
                                <a href="{!! route('adm.produtos.index') !!}" class="btn btn-sm btn-default"><i class="fa fa-reply"></i> Voltar</a>
                                <hr>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    @endsection
