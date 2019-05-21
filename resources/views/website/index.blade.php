@extends('layouts.website')

@section('content')

    <div id="home"></div>

    @include('website.includes.carousel')

   @include('website.includes.artigos', ['artigos' => \App\Artigo::orderBy('id', 'desc')->limit(4)->get()])

   @include('website.includes.produtos', ['produtos'=>\App\Produto::all()])

   @include('website.includes.contato')

   @include('website.includes.footer')


@endsection
