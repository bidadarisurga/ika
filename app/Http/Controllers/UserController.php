<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        LogActivity::addToLog(Auth::user()->role . ' liat halaman user.');

        $cari = $request->query('cari');
        $user = User::query();

        $user->when($cari, function ($q) use ($cari) {
            $q->where('no_surat', 'like', "%" . $cari . "%");
        });

        return view('pages.user.index')->with([
            'items' => $user->paginate(5)
        ]);
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        LogActivity::addToLog(Auth::user()->role . ' admin tambah user.');

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('user');
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
        LogActivity::addToLog(Auth::user()->role . ' update user.');

        $user = User::findOrFail($id);
        $data = $request->all();
        // $data['password'] = Hash::make($request->paswword);
        $user->fill($data);
        $user->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        LogActivity::addToLog(Auth::user()->role . ' update user.');

        User::findOrFail($id)->delete();
        return redirect()->route('user');
    }

    public function viewGantiPass()
    {
        return view('pages.user.ganti-passwor');
    }

    public function gantiPassword(Request $request, $id)
    {
        $request->validate(
            [
                'password' => ['required', 'confirmed'],
            ]
        );

        $data['password'] = Hash::make($request->password);
        $user = User::findOrFail($id);
        $user->fill($data);
        $user->save();
        return redirect()->route('user');
    }
}
