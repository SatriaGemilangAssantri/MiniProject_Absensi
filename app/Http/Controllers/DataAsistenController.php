<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class DataAsistenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataAsisten = User::all();
        return view('data.data_asisten', compact('dataAsisten'));
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
                'id_asisten' => 'required|size:6',
                'name' => 'required|max:255',
                'join_date' => 'required|date',
                'role' => 'required',
                'photo' => 'mimes:jpg,jpeg,png|max:2048',
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            $validateData['password'] = bcrypt($validateData['password']);

            User::create($validateData);

            return redirect()->back()->with('success', 'Data Asisten Baru telah ditambahkan');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error, Data Asisten Baru gagal ditambahkan');
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
            $asisten = User::findOrFail($id);
            $validateData = $request->validate([
                'id_asisten' => 'required|size:6',
                'name' => 'required|max:255',
                'join_date' => 'required|date',
                'role' => 'required',
                'photo' => 'mimes:jpg,jpeg,png|max:2048',
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);

            $asisten->update($validateData);

            return redirect()->back()->with('success', 'Data Asisten telah diubah');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error, Data Asisten Baru gagal diubah');
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
        // $asisten = User::findOrFail($id);
        // $asisten->delete();
        User::destroy($id);
        return redirect()->back()->with('success', 'Data Asisten telah dihapus');
    }
}
