<?php

namespace App\Http\Controllers\Admin;

use App\Logics\Show;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploaderController extends Controller
{
    public function images(Request $request)
    {
        $dir = 'product_preview/' . date('Ymd');
        $filename = $request->file('file')->store($dir);
        return Show::show(1, 'ok', ['filename' => '/uploads/' . $filename]);
    }
}
