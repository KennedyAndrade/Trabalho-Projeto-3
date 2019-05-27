<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'nome' =>'required|string|min:3|max:50',
            'email' =>'required|email',
            'telefone' =>'required|string|min:14|max:15',
            'assunto' =>'required|string|min:6|max:50',
            'mensagem' =>'required|string|min:6|max:255',
        ];
        $errors = [];
        $fields = [
            'nome' => '\'nome\'',
            'email' => '\'email\'',
            'telefone' => '\'telefone\'',
            'assunto' => '\'assunto\'',
            'mensagem' => '\'mensagem\'',

        ];
    }
}
