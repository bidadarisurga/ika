<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->query('cari');
        $user = User::query();

        $user->when($cari, function ($q) use ($cari) {
            $q->where('no_surat', 'like', "%" . $cari . "%");
        });

        return view('pages.user.index')->with([
            'items' => $user->paginate(5)
        ]);
    }
}
