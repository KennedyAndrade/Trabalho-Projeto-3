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
            'descricao' => 'required|string|min:10|max:255',
            'autor' => 'required|string|min:5|max:50',
            'dt_emissao' => 'required|date',
            'preco' => 'required|string',
            'desconto' => 'required|boolean',
            'preco_desconto' => 'required|string',
            'foto' => 'required|file',
            'arquivo' => 'required|file',


        ];
        $errors = [];
        $fields = [
            'nome' => '\'nome\'',
            'descricao' => '\'descrição\'',
            'autor' => '\'autor\'',
            'dt_emissao' => '\'data de emissao\'',
            'preco' => '\'preço\'',
            'desconto' => '\'desconto\'',
            'preco_desconto' => '\'preço do desconto\'',
            'foto' => '\'foto\'',
            'arquivo' => '\'arquivo\'',

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
                'descricao' => $request->descricao,
                'autor' => $request->autor,
                'dt_emissao' => $request->dt_emissao,
                'preco' => $request->preco,
                'desconto' => $request->desconto,
                'preco_desconto' => $request->preco_desconto,
                'foto' => Storage::disk('public')->put('ebooks/fotos',$request->foto),
                'arquivo' => Storage::put('ebooks/arquivos',$request->arquivo),
                'free' => (isset($request->free)) ? 1 : 0,

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
            'descricao' => 'required|string|min:10|max:255',
            'autor' => 'required|string|min:5|max:50',
            'dt_emissao' => 'required|date',
            'preco' => 'required|string',
            'desconto' => 'required|boolean',
            'preco_desconto' => 'required|string',
            'foto' => 'required|file',
            'arquivo' => 'required|file',


        ];
        $errors = [];
        $fields = [
            'nome' => '\'nome\'',
            'descricao' => '\'descrição\'',
            'autor' => '\'autor\'',
            'dt_emissao' => '\'data de emissao\'',
            'preco' => '\'preço\'',
            'desconto' => '\'desconto\'',
            'preco_desconto' => '\'preço do desconto\'',
            'foto' => '\'foto\'',
            'arquivo' => '\'arquivo\'',

        ];

        $validator = Validator::make($request->all(), $rules, $errors, $fields);
        if($validator->fails()){
            session()->flash('flash-warning', $validator->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

        $fotoAntiga = $produto->foto;
        $arquivoAntigo = $produto->arquivo;

        // update
        try {
            $produto->update([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'autor' => $request->autor,
                'dt_emissao' => $request->dt_emissao,
                'preco' => $request->preco,
                'desconto' => $request->desconto,
                'preco_desconto' => $request->preco_desconto,
                'free' => (isset($request->free)) ? 1 : 0,

            ]);
        } catch (\Exception $e) {
            session()->flash('flash-warning',$e->getMessage());
            return redirect()->back()->withInput($request->all());
        }

        if ($request->has('foto')) {
            try {
                $produto->update([
                    'foto' => Storage::disk('public')->put('ebooks/fotos',$request->foto),
                ]);
                Storage::disk('public')->delete($fotoAntiga);
            } catch (\Exception $e) {
                session()->flash('flash-warning', 'Dados alterados, porém não foi possível fazer upload da foto e do arquivo');
                return redirect()->back();
            }

        }

        if ($request->has('arquivo')) {
            try {
                $produto->update([
                    'arquivo' => Storage::put('ebooks/arquivos',$request->arquivo),
                ]);
                Storage::delete($arquivoAntigo);
            } catch (\Exception $e) {
                session()->flash('flash-warning', 'Dados alterados, porém não foi possível fazer upload do arquivo');
                return redirect()->back();
            }

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
