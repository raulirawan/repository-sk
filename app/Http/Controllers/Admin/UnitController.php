<?php

namespace App\Http\Controllers\Admin;

use App\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::all();
        return view('admin.unit.index', compact('unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $data = $request->all();


        $result = Unit::create($data);

        if ($result != null) {
            return redirect()->route('unit.index')->with('success', 'Data Berhasil di Tambahkan!');
        } else {
            return redirect()->route('unit.index')->with('error', 'Data Gagal di Tambahkan!');
        }
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
        $item = Unit::findOrFail($id);
        return view('admin.unit.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        $data = $request->all();

        $item = Unit::findOrFail($id);

        $result = $item->update($data);

        if ($result != null) {
            return redirect()->route('unit.index')->with('success', 'Data Berhasil di Update!');
        } else {
            return redirect()->route('unit.index')->with('error', 'Data Gagal di Update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Unit::findOrFail($id);
        $result =  $item->delete();
        if ($result != null) {

            return redirect()->route('unit.index')->with('success', 'Data Berhasil di Hapus!');
        } else {
            return redirect()->route('unit.index')->with('error', 'Data Gagal di Hapus!');
        }
    }
}
