<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.update')->with([
            'item' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        // $data['password'] = Hash::make($request->paswword);
        $user->fill($data);
        $user->save();

        return redirect('/');
    }
}
