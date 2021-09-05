<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;

class auth extends Controller
{
    public function index()
    {
        $surat = Surat::count();
        $user = User::count();
        $suratBelom = Surat::where('status', '=', 'Belum Diproses')->count();

        return view('dasboard')->with(
            [
                'user' => $user,
                'surat' => $surat,
                'suratBelom' => $suratBelom
            ]
        );
    }
}
