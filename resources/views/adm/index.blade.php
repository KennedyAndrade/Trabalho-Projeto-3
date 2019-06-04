@extends('layouts.painel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @breadcrumb(['title' => 'Painel'])
        <li class="active"><i class="fa fa-th"></i> Painel</li>
        @endbreadcrumb

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="media-box bg-blue">
                        <div class="media-icon pull-left"><i class="fa fa-newspaper"></i> </div>
                        <div class="media-info">
                            <h5>Newsletters</h5>
                            <h3>{{ \App\Newsletter::count() }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <div class="media-box bg-green">
                        <div class="media-icon pull-left"><i class="fa fa-shopping-bag"></i> </div>
                        <div class="media-info">
                            <h5>Vendas</h5>
                            <h3>{{ \App\Vendas::whereIn('status',[3, 4])->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
