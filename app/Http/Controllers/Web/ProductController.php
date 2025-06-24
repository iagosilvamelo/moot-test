<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('web.product.index');
    }
}
