<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\data_kurir;
use Illuminate\Http\Request;

class DataKurirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword=$request->search;
        $level=$request->level;
        $data_kurir = data_kurir::where(function($query) use ($keyword) {
            $keywords = explode(' ', $keyword);
            foreach ($keywords as $key) {
                $query->where('nama_kurir', 'LIKE', '%' . $key . '%');
            }
        })->where(function($query) use ($level) {
            $levels = explode(',', $level);
            foreach ($levels as $lev) {
                $query->orWhere('tingkat_kurir', 'LIKE', '%' . $lev . '%');
            }
        })->sortable()->orderBy('nama_kurir','asc')->paginate(10);//
        return view('data_kurir.index',compact('data_kurir','keyword','level'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_kurir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik_kurir'=>'required',
            'nama_kurir'=>'required',
            'alamat_kurir'=>'required',
            'notel_kurir'=>'required',
        ]);
        $data_kurir=new data_kurir;
        $data_kurir->nik_kurir=$request->nik_kurir;
        $data_kurir->nama_kurir=$request->nama_kurir;
        $data_kurir->alamat_kurir=$request->alamat_kurir;
        $data_kurir->notel_kurir=$request->notel_kurir;
        $data_kurir->tingkat_kurir=$request->tingkat_kurir;
        $data_kurir->save();
        return to_route('data_kurir.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('data_kurir.show')->with([
            'data_kurir'=>data_kurir::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('data_kurir.edit')->with([
            'data_kurir'=>data_kurir::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik_kurir'=>'required',
            'nama_kurir'=>'required',
            'alamat_kurir'=>'required',
            'notel_kurir'=>'required',
        ]);
        $data_kurir=data_kurir::find($id);
        $data_kurir->nik_kurir=$request->nik_kurir;
        $data_kurir->nama_kurir=$request->nama_kurir;
        $data_kurir->alamat_kurir=$request->alamat_kurir;
        $data_kurir->notel_kurir=$request->notel_kurir;
        $data_kurir->tingkat_kurir=$request->tingkat_kurir;
        $data_kurir->save();
        return to_route('data_kurir.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_kurir=data_kurir::find($id);
        $data_kurir->delete();
        return to_route('data_kurir.index');
    }
}
