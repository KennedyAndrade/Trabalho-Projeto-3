@extends('layouts.painel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @breadcrumb(['title' => 'Vendas'])
        <li>
            <a href="{!! route('adm.index') !!}"><i class="fa fa-th"></i> Painel</a>
        </li>

        <li class="active">
            <i class="fa fa-money-check-alt"></i> Vendas
        </li>

        @endbreadcrumb