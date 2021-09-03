<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        $items = LogActivity::logActivityLists();
        return view('pages.superAdmin.index')->with([
            'items' => $items
        ]);
    }
}
