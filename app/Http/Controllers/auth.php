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

        return view('dasboard')->with(
            [
                'user' => $user,
                'surat' => $surat
            ]
        );
    }
}
