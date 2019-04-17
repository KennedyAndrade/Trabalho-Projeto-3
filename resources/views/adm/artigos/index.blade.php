@extends('layouts.painel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @breadcrumb(['title' => 'Artigos'])
        <li>
            <a href="{!! route('adm.index') !!}"><i class="fa fa-th"></i> Painel</a>
        </li>
        <li class="active">
            <i class="fas fa-pencil-alt"></i> Artigos
        </li>
        @endbreadcrumb

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12 text-right mb-1">
                    <a href="{!! route('adm.artigos.create') !!}" class="btn btn-sm btn-success">Criar</a>
                </div>

                <div class="col-md-12">
                 <div class="chart-box">
                     <div class="bs-example" data-example-id="hoverable-table">
                         <table class="table table-hover table-striped">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Título</th>
                                     <th>Descrição</th>
                                     <!-- <th>Texto</th> -->
                                     <th>Imagens</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($artigos as $artigo)
                                     <tr>
                                         <td>{{ $artigo->id }}</td>
                                         <td>{{ $artigo->titulo }}</td>
                                         <td>{{ $artigo->descricao }}</td>
                                         <!-- <td>{{ $artigo->texto }}</td> -->
                                         <td>
                                            <a href="{{ Storage::url($artigo->img_small) }}" class="btn btn-xs btn-primary">Thumbnail</a>
                                            <a href="{{ Storage::url($artigo->img_large) }}" class="btn btn-xs btn-primary">Fooder</a>
                                         </td>

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
