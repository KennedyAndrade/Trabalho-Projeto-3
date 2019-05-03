@extends('layouts.painel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @breadcrumb(['title' => 'Clientes'])
        <li>
            <a href="{!! route('adm.index') !!}"><i class="fa fa-th"></i> Painel</a>
        </li>

        <li class="active">
            <i class="fa fa-cubes"></i> Clientes
        </li>

        @endbreadcrumb

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="chart-box">
                        <div class="bs-example" data-example-id="hoverable-table">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Aniversário</th>
                                        <th>Sexo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ $clientes->id }}</td>
                                            <td>{{ $clientes->nome }}</td>
                                            <td>{{ $clientes->email }}</td>
                                            <td>{{ \Carbon\Carbon::parse($clientes)->format('d/m/Y')}}</td>
                                            <td>{{ $clientes->genero }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
