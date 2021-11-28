<?php

namespace App\Http\Controllers\Admin;

use App\Unit;
use App\User;
use App\Jabatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = User::with(['jabatan'])->where('roles', 'KARYAWAN')->get();
        return view('admin.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $unit = Unit::all();
        return view('admin.karyawan.create', compact('jabatan', 'unit'));
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
            'email' => 'required|string|unique:users',
            'nip' => 'required|numeric',
            'jabatan_id' => 'required',
            'unit_id' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $data = $request->all();
        $data['roles'] = 'KARYAWAN';
        $data['password'] = bcrypt('123123');

        if ($request->hasFile('profile_photo_url')) {
            $data['profile_photo_url'] = $request->file('profile_photo_url')->store('public/assets/karyawan');
        }

        $result = User::create($data);

        if ($result != null) {
            return redirect()->route('karyawan.index')->with('success', 'Data Berhasil di Tambahkan!');
        } else {
            return redirect()->route('karyawan.index')->with('error', 'Data Gagal di Tambahkan!');
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
        $item = User::findOrFail($id);
        return view('admin.karyawan.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan = Jabatan::all();
        $unit = Unit::all();
        $item = User::findOrFail($id);
        return view('admin.karyawan.edit', compact('item', 'jabatan','unit'));
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
            'nip' => 'required|numeric',
            'jabatan_id' => 'required',
            'unit_id' => 'required',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'alamat' => 'required|string',
            'profile_photo_url' => 'mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();

        $item = User::findOrFail($id);

        if ($request->hasFile('profile_photo_url')) {
            $data['profile_photo_url'] = $request->file('profile_photo_url')->store('public/assets/karyawan');

            if (Storage::exists($item->profile_photo_url)) {
                Storage::delete($item->profile_photo_url);
            }
        }
        $result = $item->update($data);

        if ($result != null) {
            return redirect()->route('karyawan.index')->with('success', 'Data Berhasil di Update!');
        } else {
            return redirect()->route('karyawan.index')->with('error', 'Data Gagal di Update!');
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
        $item = User::findOrFail($id);
        $result = $item->delete();

        if ($result != null) {
            return redirect()->route('karyawan.index')->with('success', 'Data Berhasil di Hapus!');
        } else {
            return redirect()->route('karyawan.index')->with('error', 'Data Gagal di Hapus!');
        }
    }
}
