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

        @endbreadcrumb

        @php
        function pagseguroStatus($num)
        {
            switch ($num) {
                case 1:
                return 'Aguardando Pagamento';
                break;

                case 2:
                return 'Em análise';
                break;

                case 3:
                return 'Paga';
                break;

                case 4:
                return 'Disponível';
                break;

                case 5:
                return 'Em disputa';
                break;

                case 6:
                return 'Devolvida';
                break;

                case 7:
                return 'Cancelada';
                break;
            }
        }
        @endphp

        <section>
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="chart-box">


                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Referência</th>
                                        <th>Usuário</th>
                                        <th>E-book</th>
                                        <th>Preço</th>
                                        <th>Data de Compra</th>
                                        <th>Status</th>
                                        <th class="text-center">Data de Pagamento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendas as $venda)
                                        <tr>
                                            <td>{{ $venda->ref }}</td>
                                            <td>{{ $venda->user->name }}</td>
                                            <td>{{ $venda->produto->nome }}</td>
                                            <td>{{ $venda->produto->preco }}</td>
                                            <td>{{ $venda->created_at->format('d/m/Y H:i:s') }}</td>
                                            <td>{{ pagseguroStatus($venda->status) }}</td>
                                            <td class="text-center">{{ ($venda->dt_pagamento) ? $venda->dt_pagamento->format('d/m/Y H:i:s') : '--'}}</td>
                                            <td> <a href="{!! route('adm.vendas.show', $venda->id) !!}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Ver</a> </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
