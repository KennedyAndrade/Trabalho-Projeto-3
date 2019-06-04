@extends('layouts.website')


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

        case 2:
        return 'Cancelada';
        break;
    }
}
@endphp

@section('content')
    <div class="container">
        @if (!\Auth::user()->vendas()->count())
            <h1>Não foi encontrado nenhum e-book</h1>
        @else
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Referência</th>
                            <th>E-book</th>
                            <th>Preço</th>
                            <th>Data de Compra</th>
                            <th>Status</th>
                            <th class="text-center">Data de Pagamento</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\Auth::user()->vendas as $venda)
                            <tr>
                                <td>{{ $venda->ref }}</td>
                                <td>{{ $venda->produto->nome }}</td>
                                <td>{{ $venda->produto->preco }}</td>
                                <td>{{ $venda->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>{{ pagseguroStatus($venda->status) }}</td>
                                <td class="text-center">{{ ($venda->dt_pagamento) ? $venda->dt_pagamento->format('d/m/Y H:i:s') : '--'}}</td>
                                <td>
                                    @if ($venda->status == 1)
                                        <a  class="btn btn-success btn-sm " href="{{ $venda->link }}" target="_blank">Pagar</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
