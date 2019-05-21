@extends('layouts.painel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @breadcrumb(['title' => 'Produtos'])
        <li>
            <a href="{!! route('adm.index') !!}"><i class="fa fa-th"></i> Painel</a>
        </li>

        <li class="active">
            <i class="fa fa-cubes"></i> Produtos
        </li>

        @endbreadcrumb

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12 text-right mb-1">
                    <a href="{!! route('adm.produtos.create') !!}" class="btn btn-sm btn-success">Criar</a>
                </div>

                <div class="col-md-12">
                    <div class="chart-box">
                        <div class="bs-example" data-example-id="hoverable-table">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Preço</th>
                                        <th>Desconto</th>
                                        <th>Preço com desconto</th>
                                        <th>Gratuito</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produtos as $produto)
                                        <tr>
                                            <td>{{ $produto->id }}</td>
                                            <td>{{ $produto->nome }}</td>
                                            <td>{{ $produto->preco }}</td>
                                            <td>{{ ($produto->desconto) ? 'Sim' : 'Não' }}</td>
                                            <td>{{ $produto->preco_desconto }}%</td>
                                            <td>{{ ($produto->free) ? 'Sim' : 'Não' }}</td>

                                            <td class="text-right">
                                                <a href="{!! route('adm.produtos.edit', $produto->id) !!}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Editar</a>
                                                <form style="display:inline" action="{!! route('adm.produtos.destroy', $produto->id) !!}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-xs btn-danger formConfirmDelete" type="button" data-nome="{{ $produto->nome }}"><i class="fa fa-trash"></i> Deletar</button>
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
        var nome = $(this).attr('data-nome');
        Swal.fire({
            title: 'Você tem certeza que deseja deletar o produto \''+ nome +'\'?',
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
