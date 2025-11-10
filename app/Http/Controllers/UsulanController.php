<?php

namespace App\Http\Controllers;

use App\Events\UsulanPemindahtangananUpdated;
use App\Models\UsulanPemindahtanganan;
use Illuminate\Http\Request;

class UsulanController extends Controller
{
    public function index()
    {
        $data = UsulanPemindahtanganan::orderBy('updated_at', 'desc')->get();
        return view('usulan.index', compact('data'));
    }

    public function api()
    {
        return UsulanPemindahtanganan::orderBy('updated_at', 'desc')->get();
    }
}
