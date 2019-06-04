@extends('layouts.painel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @breadcrumb(['title' => 'Newsletters'])
        <li>
            <a href="{!! route('adm.index') !!}"><i class="fa fa-th"></i> Painel</a>
        </li>

        <li class="active">
            <i class="fa fa-newspaper"></i> Newsletters
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
                                        <th>Email</th>
                                        <th>Cadastrado em</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newsletters as $newsletter)
                                        <tr>
                                            <td>{{ $newsletter->email }}</td>
                                            <td>{{ $newsletter->created_at->format("d/m/Y H:i:s") }}</td>
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

@endsection
