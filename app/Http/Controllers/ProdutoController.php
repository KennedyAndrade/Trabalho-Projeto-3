<?php

namespace App\Http\Controllers; 

use Storage;
use Validator;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('adm.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.produtos.create');
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
            'nome' => 'required|string|min:3|max:50',
            'preco' => 'required|string',
            'desconto' => 'required|boolean',
            'preco_desconto' => 'required|string',

        ];
        $errors = [];
        $fields = [
            'nome' => '\'nome\'',
            'preco' => '\'preço\'',
            'desconto' => '\'desconto\'',
            'preco_desconto' => '\'preço do desconto\'',

        ];

        $validator = Validator::make($request->all(), $rules, $errors, $fields);
        if($validator->fails()){
            session()->flash('flash-warning', $validator->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

        // create
        $password = str_random(8);
        try {
            Produto::create([
                'nome' => $request->nome,
                'preco' => $request->preco,
                'desconto' => $request->desconto,
                'preco_desconto' => $request->preco_desconto,

            ]);
        } catch (\Exception $e) {
            session()->flash('flash-warning', $e->getMessage());
            return redirect()->back()->withInput($request->all());
        }
        session()->flash('flash-success', 'Novo produto adicionado com sucesso');
        return redirect()->route('adm.produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        return view('adm.produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $rules = [
            'nome' => 'required|string|min:3|max:50',
            'preco' => 'required|string',
            'desconto' => 'required|boolean',
            'preco_desconto' => 'required|string',
       ];
       $errors = [];
       $fields = [
           'nome' => '\'nome\'',
           'preco' => '\'preço\'',
           'desconto' => '\'desconto\'',
           'preco_desconto' => '\'preço do desconto\'',
       ];

       $validator = Validator::make($request->all(), $rules, $errors, $fields);
       if($validator->fails()){
           session()->flash('flash-warning', $validator->errors()->first());
           return redirect()->back()->withInput($request->all());
       }

       // update
       try {
           $produto->update([
               'nome' => $request->nome,
               'preco' => $request->preco,
               'desconto' => $request->desconto,
               'preco_desconto' => $request->preco_desconto,

           ]);
       } catch (\Exception $e) {
           session()->flash('flash-warning',$e->getMessage());
           return redirect()->back()->withInput($request->all());
       }


       session()->flash('flash-success','Editado com sucesso');
       return redirect()->route('adm.produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        session()->flash('flash-success', 'Produto removido com sucesso');
        return redirect()->back();
    }
}
