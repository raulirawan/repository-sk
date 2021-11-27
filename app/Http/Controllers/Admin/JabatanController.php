<?php

namespace App\Http\Controllers\Admin;

use App\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        return view('admin.jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jabatan.create');
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


        $result = Jabatan::create($data);

        if ($result != null) {
            return redirect()->route('jabatan.index')->with('success', 'Data Berhasil di Tambahkan!');
        } else {
            return redirect()->route('jabatan.index')->with('error', 'Data Gagal di Tambahkan!');
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
        $item = Jabatan::findOrFail($id);
        return view('admin.jabatan.edit', compact('item'));
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

        $item = Jabatan::findOrFail($id);

        $result = $item->update($data);

        if ($result != null) {
            return redirect()->route('jabatan.index')->with('success', 'Data Berhasil di Update!');
        } else {
            return redirect()->route('jabatan.index')->with('error', 'Data Gagal di Update!');
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
        $item = Jabatan::findOrFail($id);
        $result =  $item->delete();
        if ($result != null) {

            return redirect()->route('jabatan.index')->with('success', 'Data Berhasil di Hapus!');
        } else {
            return redirect()->route('jabatan.index')->with('error', 'Data Gagal di Hapus!');
        }
    }
}
