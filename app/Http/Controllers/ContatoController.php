<?php

namespace App\Http\Controllers;

use Mail;
use Validator;
use App\Mail\Contato;
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

        $emailDestino  = 'naoresponda@mindhealth.com.br';
        $array = [
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'assunto' => $request->assunto,
            'mensagem' => $request->mensagem,
        ];

        try {
            Mail::to($emailDestino)->send(new Contato($array));
        } catch (\Exception $e) {
            return response()->json([
                'message' =>  $e->getMessage(),
            ], 406);
        }

        return response()->json([
            'message' =>  'Email enviado com sucesso!',
        ], 201);

    }

}
