<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;

class ClienteController extends Controller
{
    public function index()
    {
        return view('app.cliente');
    }
}
