<?php

namespace App\Http\Controllers;

use Validator;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
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
            'email' => 'required|string|min:6|max:255|unique:newsletters,email',
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
            $newsletter = Newsletter::create([
                'email' => $request->email,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' =>  $e->getMessage(),
            ], 406);
        }

        return response()->json([
            'message' =>  'Cadastrado com sucesso!',
            'created' => $newsletter,
        ], 201);
    }


    public function index()
    {
        $newsletters = Newsletter::all();
        return view('adm.newsletters.index', compact('newsletters'));
    }

}
