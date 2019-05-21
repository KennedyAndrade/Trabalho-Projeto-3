<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Produto;
use Storage;
use Illuminate\Http\Request;


class DownloadController extends Controller
{
    public function index($produto_id)
    {
        $produto = Produto::where('id', $produto_id)->first();
        if ($produto) {
            if ($produto->free) {
                return Storage::download($produto->arquivo);
            }

            if (Auth::user()->vendas()->where('produto_id', $produto->id)->whereIn('status', [3,4])->first()){
                return Storage::download($produto->arquivo);
            }
        }
        return redirect()->route('website');
    }
}
