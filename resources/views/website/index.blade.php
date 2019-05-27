@extends('layouts.website')

@section('content')

    <div id="home"></div>

    @include('website.includes.carousel')

    @include('website.includes.sobre')

    @include('website.includes.artigos', ['artigos' => \App\Artigo::orderBy('id', 'desc')->limit(4)->get()])

    @include('website.includes.produtos', ['produtos'=>\App\Produto::all()])

    @include('website.includes.contato')

    @include('website.includes.footer')


@endsection

@section('script')
    <script type="text/javascript">
    $('#btnNewsLetter').on('click', function(e){
        e.preventDefault();
        var form = $(this).closest('form');
        var data = form.serialize();
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: data,
            dataType: 'json',
            success: function(response){
                Swal.fire(
                    'Sucesso!',
                    response.message,
                    'success'
                )
            },
            error:function(response){
                var obj = jQuery.parseJSON(response.responseText);
                Swal.fire(
                    'Oops...',
                    obj.message,
                    'error'
                )
            }
        });
    });


    // Contato

    $('#btnContato').on('click', function(e){
        e.preventDefault();
        var form = $(this).closest('form');
        var data = form.serialize();
        $.ajax({
            type: form.attr('button'),
            url: form.attr('action'),
            data: data,
            dataType: 'json',
            success: function(response){
                Swal.fire(
                    'Sucesso!',
                    response.message,
                    'success'
                )
            },
            error:function(response){
                var obj = jQuery.parseJSON(response.responseText);
                Swal.fire(
                    'Oops...',
                    obj.message,
                    'error'
                )
            }
        });
    });
    </script>
@endsection
