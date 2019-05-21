<?php

namespace App\Http\Controllers;

use Auth;
use App\Vendas;
use App\Produto;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    private $environment = 'sandbox';
    private $token = '4868A58107CD448FB42CB6BB36A6FD09';
    private $email = 'giselle.r0drigu3s@gmail.com';


    public function venda($id)
    {
        if (\Auth::check()) {
            // Carregando Produto
            $produto = Produto::where('id', $id)->first();
            if (!$produto) {
                session()->flash('flash-warning', 'Produto não foi encontrado.');
                return redirect()->back();
            }

            // Criando link de pagamento
            $ref = strtoupper(Auth::id().'_'. time().'_'.str_random(5));
            $preco = ($produto->desconto) ? $produto->preco - (($produto->preco * $produto->preco_desconto)/100) : $produto->preco;
            $array = [];
            $array['email'] = $this->email;
            $array['token'] = $this->token;
            $array['currency'] = 'BRL';
            $array['itemId1'] = $produto->nome;
            $array['itemDescription1'] = $produto->descricao;
            $array['itemAmount1'] = number_format($preco, 2, '.', '');
            $array['itemQuantity1'] = 1;
            $array['reference'] = $ref;
            $array['senderName'] = Auth::user()->name;
            $array['senderEmail'] = Auth::user()->email;
            $array['shippingType'] = 3;
            // redefinir a url de retorno para o hook do pagseguro
            $array['notificationURL'] = "http://www.kreativesdenken.com.br/retorno";

            $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/';

            $fields = '';
            foreach ($array as $key => $value) {
                $fields.='&'.$key.'='.rawurlencode($value);
            }
            $fields = substr($fields, 1);

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $fields,
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1",
                    "cache-control: no-cache"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                // mensagem de erro pois não foi possivel gravar no pagseguro
            }
                $xml = json_encode(simplexml_load_string($response));
                $xml = json_decode($xml, true);
                $code = $xml['code'];

            // Salvando link de pagamento para o usuario
            $linkPagamento = 'https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code='.$code;
            try {
                Auth::User()->vendas()->create([
                    'produto_id' => $produto->id,
                    'ref' => $ref,
                    'link' => $linkPagamento,
                ]);
            } catch (\Exception $e) {
                session()->flash('flash-warning', $e->getMessage());
                return redirect()->back();
            }
            return redirect()->route('minhas_compras');
        }
        session()->flash('flash-warning', 'Você precisa estar logado');
        return redirect()->back();
    }

    public function minhasCompras()
    {
        return view('website.minhas_compras');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $vendas = Vendas::orderBy('created_at', 'desc')->get();
        return view('adm.vendas.index', compact('vendas'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Vendas  $vendas
    * @return \Illuminate\Http\Response
    */
    public function show(Vendas $venda)
    {
        return view('adm.vendas.show', compact('venda'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Vendas  $vendas
    * @return \Illuminate\Http\Response
    */
    public function edit(Vendas $vendas)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Vendas  $vendas
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Vendas $venda)
    {
        $venda->update([
            'status' => $request->status
        ]);
        return redirect()->route('adm.vendas.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Vendas  $vendas
    * @return \Illuminate\Http\Response
    */
    public function destroy(Vendas $vendas)
    {
        //
    }
}
