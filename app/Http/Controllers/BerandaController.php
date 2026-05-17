<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BerandaControllers;

class BerandaController extends Controller
{
    public function BerandaBackend()
    { return view('backend.v_beranda.index', [
        'judul'=> 'Halaman Beranda',
    ]);
    }
}
