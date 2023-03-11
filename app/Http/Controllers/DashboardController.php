<?php

namespace App\Http\Controllers;
use App\Models\tb_ruangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function tampil()
    {
        $tb_ruangan = tb_ruangan::all();
        return view('dashboard.dist.index',compact(['tb_ruangan']));
    }

    // public function delete($NO)
    // {
    //     $tb_ruangan = tb_ruangan::find($NO);
    //     $tb_ruangan->delete();
    //     return redirect('/dashboard');
    // }

    public function delete(string $NO)
    {
        tb_ruangan::where('NO',$NO)->delete();
        return redirect()->to('dashboard')->with('success');
    }


    // public function edit($NO)
    // {
    //     $tb_ruangan = tb_ruangan::find($NO);
    //     return view('dashboard.dist.edit',compact(['tb_ruangan']));
    // }

    public function edit(string $NO)
    {
        $tb_ruangan = tb_ruangan::where('NO',$NO)->first();
        return view('dashboard.dist.edit')->with('tb_ruangan', $tb_ruangan);
    }

    public function update($NO, Request $request)
    {
        $tb_ruangan = tb_ruangan::find($NO);
        $tb_ruangan->update($request->except(['_token','submit']));
        return redirect('/dashboard');
    }
}
