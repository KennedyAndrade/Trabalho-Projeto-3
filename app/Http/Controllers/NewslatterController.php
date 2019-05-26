<?php

namespace App\Http\Controllers;

use Validator;
use App\Newslatter;
use Illuminate\Http\Request;

class NewslatterController extends Controller
{
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|string|min:6|max:255|unique:newslatters,email',
        ];
        $errors = [];
        $fields = [
            'email' => '\'email\'',
        ];
        $validator = Validator::make($request->all(), $rules, $errors, $fields);
        if($validator->fails()){
            return response()->json([
                'message' =>  $validator->errors()->first(),
            ], 406);
        }

        try {
            $newslatter = Newslatter::create([
                'email' => $request->email,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' =>  $e->getMessage(),
            ], 406);
        }

        return response()->json([
            'message' =>  'Cadastrado com sucesso!',
            'created' => $newslatter,
        ], 201);
    }
}
