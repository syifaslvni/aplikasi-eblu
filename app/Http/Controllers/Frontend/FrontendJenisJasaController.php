<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendJenisJasaController extends Controller
{
    public function index()
    {
        $jenisjasas = JenisJasa::all();
        return view('jenisjasas.index', compact('jenisjasas'));
    }
}
