<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use  Illuminate\Support\Facades\Log;

class DataKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataKelas = Kelas::all();
        return view('data.data_kelas', compact('dataKelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $validateData = $request->validate([
                'jurusan' => 'required',
                'fakultas' => 'required',
                'tingkat' => 'required',
                'nama_kelas' => 'required'
            ]);

            Kelas::create($validateData);

            return redirect()->back()->with('success', 'Data Kelas Baru telah ditambahkan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error, Data Kelas Baru gagal ditambahkan');
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
        //
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
        try {
            $asisten = Kelas::findOrFail($id);
            $validateData = $request->validate([
                'jurusan' => 'required',
                'fakultas' => 'required',
                'tingkat' => 'required',
                'nama_kelas' => 'required'
            ]);

            $asisten->update($validateData);

            return redirect()->back()->with('success', 'Data Kelas telah diubah');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error, Data Kelas Baru gagal diubah');
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
        Kelas::destroy($id);
        return redirect()->back()->with('success', 'Data Kelas telah dihapus');
    }
}
