<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_ruangan;


class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = tb_ruangan::all();
        return view('dashboard.dist.ruangan',compact(['ruangan']));
    }

    public function create()
    {
        return view('/ruangan');
    }

        public function store(Request $request)
        {
            tb_ruangan::create($request->except(['_token','submit']));
            return redirect('/ruangan');
        }


}
