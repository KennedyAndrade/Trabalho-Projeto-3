<?php

namespace App\Http\Controllers;

use Storage;
use Validator;
use App\Artigo;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $artigos = Artigo::all();
        return view('adm.artigos.index', compact('artigos'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('adm.artigos.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $rules = [
            'titulo' =>'required|string|min:3|max:50',
            'descricao' =>'required|string|min:6|max:200',
            'texto' =>'required|string|min:50',
            'image_small' =>'image|max:2000',
        ];
        $errors = [];
        $fields = [
            'titulo' => '\'título\'',
            'descricao' => '\'descrição\'',
            'texto' => '\'texto\'',
            'image_small' => '\'thumbnail\'',

        ];

        $validator = Validator::make($request->all(), $rules, $errors, $fields);
        if($validator->fails()){
            session()->flash('flash-warning', $validator->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

        // create user
        $password = str_random(8);
        try {
            Artigo::create([
                'titulo' => $request->titulo,
                'descricao' => $request->descricao,
                'texto' => $request->texto,
                'img_small' => Storage::disk('public')->put('artigos/thumbnail', $request->image_small),

            ]);
        } catch (\Exception $e) {
            session()->flash('flash-warning', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }
        session()->flash('flash-success', 'Novo artigo adicionado com sucesso');
        return redirect()->route('adm.artigos.index');

    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Artigo  $artigo
    * @return \Illuminate\Http\Response
    */
    public function show(Artigo $artigo)
    {
        return view('website.artigos.show', compact('artigo'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Artigo  $artigo
    * @return \Illuminate\Http\Response
    */
    public function edit(Artigo $artigo)
    {
        return view('adm.artigos.edit', compact('artigo'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Artigo  $artigo
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Artigo $artigo)
    {
        $rules = [
            'titulo' =>'required|string|min:3|max:50',
            'descricao' =>'required|string|min:6|max:50',
            'texto' =>'required|string|min:50',
            'image_small' =>'image|max:2000',
       ];
       $errors = [];
       $fields = [
           'titulo' => '\'título\'',
           'descricao' => '\'descrição\'',
           'texto' => '\'texto\'',
           'image_small' => '\'thumbnail\'',
       ];

       $validator = Validator::make($request->all(), $rules, $errors, $fields);
       if($validator->fails()){
           session()->flash('flash-warning', $validator->errors()->first());
           return redirect()->back()->withInput($request->all());
       }

       // update user
       try {
           $artigo->update([
               'titulo' => $request->titulo,
               'descricao' => $request->descricao,
               'texto' => $request->texto,
               'img_small' => Storage::disk('public')->put('artigos/thumbnail', $request->image_small),

           ]);
       } catch (\Exception $e) {
           session()->flash('flash-warning',$e->getMessage());
           return redirect()->back()->withInput($request->all());
       }


       session()->flash('flash-success','Editado com sucesso');
       return redirect()->route('adm.artigos.index');

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Artigo  $artigo
    * @return \Illuminate\Http\Response
    */
    public function destroy(Artigo $artigo)
    {

        $artigo->delete();
        session()->flash('flash-success', 'Artigo removido com sucesso');
        return redirect()->back();
    }
}
