@extends('layouts.painel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @breadcrumb(['title' => 'Vendas'])
        <li>
            <a href="{!! route('adm.index') !!}"><i class="fa fa-th"></i> Painel</a>
        </li>

        <li class="active">
            <i class="fa fa-shopping-bag"></i> Vendas
        </li>

        <li class="active">
            {{ $venda->id }}
        </li>

        @endbreadcrumb

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <form action="{!! route('adm.vendas.update', $venda->id) !!}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="col-md-12">
                        <div class="chart-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>Referência</label>
                                        <input class="form-control" name="ref" type="text" value="{{ old('ref', $venda->ref) }}" readonly>
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>Usuário</label>
                                        <input class="form-control" name="user_id" type="hidden" value="{{ old('user_id', $venda->user_id) }}" >
                                        <input class="form-control" type="text" value="{{ old('user_id', $venda->user->name) }}" readonly>
                                    </fieldset>
                                </div>

                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label>E-book</label>
                                        <input type="hidden" name="produto_id" class="form-control" value="{{ old('produto_id', $venda->produto_id) }}">
                                        <input type="text" class="form-control" value="{{ $venda->produto->nome }}" readonly>
                                    </fieldset>
                                </div>

                                <div class="col-md-3">
                                    <fieldset class="form-group">
                                        <label>Preço</label>
                                        <input name="preco" class="form-control" value="{{ $venda->produto->preco }}" readonly>
                                    </fieldset>
                                </div>

                                <div class="col-md-3">
                                    <fieldset class="form-group">
                                        <label>Status Pedido</label>
                                        <select class="form-control" name="status" style="padding: 5px 10px;" value="{{ old('status', $venda->status) }}">
                                            <option value="1" {{ (old('status', $venda->status) == 1) ? 'selected' : null }}>Aguardando pagamento</option>
                                            <option value="2" {{ (old('status', $venda->status) == 2) ? 'selected' : null }}>Em análise</option>
                                            <option value="3" {{ (old('status', $venda->status) == 3) ? 'selected' : null }}>Paga</option>
                                            <option value="4" {{ (old('status', $venda->status) == 4) ? 'selected' : null }}>Disponível</option>
                                            <option value="5" {{ (old('status', $venda->status) == 5) ? 'selected' : null }}>Em disputa</option>
                                            <option value="6" {{ (old('status', $venda->status) == 6) ? 'selected' : null }}>Devolvida</option>
                                            <option value="7" {{ (old('status', $venda->status) == 7) ? 'selected' : null }}>Cancelada</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label>Data de Criação</label>
                                        <input type="text" class="form-control" style="line-height: 15px" value="{{  $venda->created_at->format('d/m/Y H:i:s') }}" readonly>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <fieldset class="form-group">
                                        <label>Data de Pagamento</label>
                                        <input type="text" name="dt_pagamento" class="form-control" style="line-height: 15px" value="{{ ($venda->dt_pagamento) ? $venda->dt_pagamento->format('d/m/Y H:i:s') : 'Não Definido'}}" readonly>
                                    </fieldset>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Salvar</button>
                                    <a href="{!! route('adm.vendas.index') !!}" class="btn btn-sm btn-default"><i class="fa fa-reply"></i> Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection
