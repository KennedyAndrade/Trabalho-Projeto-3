<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class SummernoteFileUploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = Stoage::disk('public')->put('uploads', $request->file);
        return response()->json(['image' => $file], 201);
    }
}
