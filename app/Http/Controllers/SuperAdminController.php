<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    public function index()
    {
        $items = LogActivity::logActivityLists();
        return view('pages.superAdmin.index')->with([
            'items' => $items
        ]);
    }
    public function create()
    {
        return view('pages.superAdmin.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['role'] = 'admin';
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect('/');
    }
}
