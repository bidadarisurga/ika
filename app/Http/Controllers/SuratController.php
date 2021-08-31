<?php

namespace App\Http\Controllers;

use App\Http\Requests\SuratRequest;
use App\Models\Surat;
use Illuminate\Http\Request;
use PDF;
use DataTables;


class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Surat::all();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="data-email/edit/' . $data->id . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil-alt"></i></a> <form action="data-email/hapus/' . $data->id . '" method="delete"> ' . csrf_field() . ' <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash mt-2"></i></button></form>';
            })
            ->make(true);
    }

    public function index(Request $request)
    {
        // $cari = $request->query('cari');
        // $surat = Surat::query();

        // $surat->when($cari, function ($q) use ($cari) {
        //     $q->where('no_surat', 'like', "%" . $cari . "%");
        // });


        return view('pages.surat.index');
    }

    public function generatePDF()
    {
        $data = Surat::all();

        $pdf = PDF::loadView('myPDF', ['data' => $data]);
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuratRequest $request)
    {
        Surat::create($request->all());
        return redirect()->route('surat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.surat.update')->with([
            'item' => Surat::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SuratRequest $request, $id)
    {
        $surat = Surat::findOrFail($id);
        $surat->update($request->all());
        return redirect()->route('surat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Surat::findOrFail($id)->delete();
        return redirect()->route('surat.index');
    }
}
