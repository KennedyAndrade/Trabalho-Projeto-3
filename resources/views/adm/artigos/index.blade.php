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
                                            </td>

                                            <td class="text-right">
                                                <a href="{!! route('adm.artigos.edit', $artigo->id) !!}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Editar</a>
                                                <form style="display:inline" action="{!! route('adm.artigos.destroy', $artigo->id) !!}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-xs btn-danger formConfirmDelete" type="button" data-titulo="{{ $artigo->titulo }}"><i class="fa fa-trash"></i> Deletar</button>
                                                </form>
                                            </td>
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

@section('script')
    <script type="text/javascript">
    $('body').on('click', '.formConfirmDelete', function(event){
        event.preventDefault();
        var form = $(this).closest('form');
        var titulo = $(this).attr('data-titulo');
        Swal.fire({
            title: 'Você tem certeza que deseja deletar o artigo \''+ titulo +'\'?',
            text: "Você não poderá reverter isso!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, exclua!'
        }).then((result) => {
            if (result.value) {
                form.submit()
            }
        })
    });
    </script>
@endsection
