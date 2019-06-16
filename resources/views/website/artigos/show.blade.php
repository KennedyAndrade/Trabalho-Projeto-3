@extends('layouts.website')

@section('content')

    <div id="home"></div>

    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-justify">
                {!! $artigo->texto !!}
                </div>
            </div>
        </div>
    </section>

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
    </script>
@endsection
