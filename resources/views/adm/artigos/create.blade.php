@extends('layouts.painel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @breadcrumb(['title' => 'Artigos'])
        <li><a href="{!! route('adm.index') !!}" ><i class="fa fa-th"></i> Painel</a></li>
        <li><a href="{!! route('adm.artigos.index') !!}" ><i class="fas fa-pencil-alt"></i> Artigos</a></li>
        <li class="active"><i class="fa fa-plus"></i> Criar</li>
        @endbreadcrumb

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <form action="{!! route('adm.artigos.store') !!}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="chart-box">
                           <div class="row">
                               <div class="col-md-6">
                                   <fieldset class="form-group">
                                       <label>Título</label>
                                       <input class="form-control" name="titulo" type="text" value="{{ old('titulo') }}" >
                                   </fieldset>
                               </div>

                               <div class="col-md-6">
                                   <fieldset class="form-group">
                                       <label>Descrição</label>
                                       <input class="form-control" name="descricao" type="text" value="{{ old('descricao') }}" >
                                   </fieldset>
                               </div>

                               <div class="col-md-12">
                                   <fieldset class="form-group">
                                       <label>Texto</label>
                                       <textarea class="form-control" name="texto">{{ old('texto') }}</textarea>
                                   </fieldset>
                               </div>

                               <div class="col-md-12">
                                   <fieldset class="form-group">
                                       <label>Thumbnail</label>
                                       <input type="file" name="image_small" required>
                                   </fieldset>
                               </div>

                               <div class="col-md-12">
                                   <fieldset class="form-group">
                                       <label>Fooder</label>
                                       <input type="file" name="image_large" required>
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
