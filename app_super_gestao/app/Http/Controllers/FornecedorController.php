<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor');
    }}
