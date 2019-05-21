<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = User::all();
        return view('adm.clientes.index', compact('clientes'));

    }


    public function show()
    {
        //
    }
}
