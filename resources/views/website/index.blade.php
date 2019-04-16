@extends('layouts.website')

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
           {{-- <div class="carousel-item">
               <div class="d-flex align-items-center justify-content-center min-vh-100">
                   <img src="{!! asset('website/img/amizade.jpeg') !!}" class="d-block w-100 img-fluid" alt="...">
               </div>
           </div>
           <div class="carousel-item">
               <div class="d-flex align-items-center justify-content-center min-vh-100">
                   <img src="{!! asset('website/img/batida.jpeg') !!}" class="d-block w-100 img-fluid" alt="...">
               </div>
           </div>
           <div class="carousel-item">
               <div class="d-flex align-items-center justify-content-center min-vh-100">
                   <img src="{!! asset('website/img/bem%20estar.jpeg') !!}" class="d-block img-fluid w-100" alt="...">
               </div>
           </div> --}}

           <div class="carousel-item active">
               <div class="d-flex align-items-center">
                   <img src="{!! asset('website/img/teste.jpg') !!}" class="d-block img-fluid w-100" alt="...">
               </div>
           </div>
       </div>
       <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
       </a>
   </div>

   <!--CARDS DICAS FIT-->
   <!--site das receitas https://www.mundoboaforma.com.br-->
   <h1 class="text-success text-center">NUTRIÇÃO</h1>
   <div class="container-fluid">
       <div class="row">

           <div class="col-md-3">
               <div class="card">
                   <img href="pag_1.php" src="{!! asset('website/img/food.jpg') !!}" class="card-img-top" alt="...">
                   <div class="card-body">
                       <a href="pag_1.php" class="card-link">5 Receitas fitness fáceis para incorporar no dia a dia</a>
                       <p class="card-text"><small class="text-muted">Última atualização 3 minutos atrás</small></p>
                   </div>
               </div>
           </div>

           <div class="col-md-3">
               <div class="card">
                   <img src="{!! asset('website/img/detox.jpeg') !!}" class="card-img-top" alt="...">
                   <div class="card-body">
                       <a href="#" class="card-link">Receita de salada de agrião com damasco e beterraba</a>
                       <p class="card-text"><small class="text-muted">Última atualização 3 minutos atrás</small></p>
                   </div>
               </div>
           </div>

           <div class="col-md-3">
               <div class="card">
                   <img href="pag_2.php" src="{!! asset('website/img/frutas_cortadas.jpg') !!}" class="card-img-top" alt="...">
                   <div class="card-body">
                       <a href="pag_2.php" class="card-link">Receita de salada de agrião com damasco e beterraba</a>
                       <p class="card-text"><small class="text-muted">Última atualização 3 minutos atrás</small></p>
                   </div>
               </div>
           </div>

           <div class="col-md-3">
               <div class="card">
                   <img src="{!! asset('website/img/receita.jpg') !!}" class="card-img-top" alt="...">
                   <div class="card-body">
                       <a href="#" class="card-link">Receita de salada de agrião com damasco e beterraba</a>
                       <p class="card-text"><small class="text-muted">Última atualização 3 minutos atrás</small></p>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
