<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;

class SummernoteFileUploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = Storage::disk('public')->put('uploads', $request->image);
        return Storage::url($file);
    }
}
