<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('app.produto');
    }
}
