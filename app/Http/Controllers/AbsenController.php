<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Code;
use Carbon\Carbon;
use App\Exports\AbsensiExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $idLogin = Auth::id();
            $getIdAsisten = $request->id_asisten;
            $getKode = $request->code;
            $getIdMateri = $request->materi;
            $getIdKelas = $request->kelas;
            $getPeran = $request->peran_jaga;

            $getMatchId = User::where('id_asisten', $getIdAsisten)->first();
            if ($idLogin == $getMatchId->id) {
                $getMatchKode = Code::where('code', $getKode)->first();
                if ($getKode == $getMatchKode->code && (empty($getMatchKode->id_user_get))) {
                    if ($getMatchKode->user_id != $idLogin) {
                        $store = new Absensi;
                        $store->kelas_id = $getIdKelas;
                        $store->materi_id = $getIdMateri;
                        $store->user_id = $idLogin;
                        $store->id_asisten = $getIdAsisten;
                        $store->teaching_role = $getPeran;

                        $today = Carbon::now("GMT+7")->toDateString();
                        $timeNow = Carbon::now("GMT+7")->toTimeString();

                        $store->date = $today;
                        $store->start = $timeNow;
                        $store->code_id = $getMatchKode->id;
                        $store->save();

                        $getMatchKode->id_user_get = $idLogin;
                        $getMatchKode->save();

                        return redirect()->back()->withSuccess('Absen Berhasil');
                    }
                }
            }
            throw new \Exception('Kode Absen tidak valid atau sudah digunakan');
        } catch (\Exception $e) {
            return redirect()->back()->withError('Absen Gagal: ' . $e->getMessage());
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
    public function update(Request $request)
    {

        try {

            $carbon = Carbon::now("GMT+7");
            $user = Auth::user();
            $cekAbsen = Absensi::where('id_asisten', $user->id_asisten)->whereNotNull('start')->whereNull('end')->first();

            $masuk = $cekAbsen->start;
            $keluar = Carbon::now("GMT+7")->toTimeString();
            $cekAbsen->end = $keluar;
            $hasil = $carbon->diffInMinutes($masuk);
            $cekAbsen->duration = $hasil;
            $cekAbsen->save();

            return redirect()->back()->with('success', 'Clock Out Berhasil');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Clock Out Gagal');
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
        //
    }
    public function export()
    {
        return Excel::download(new AbsensiExport, 'absensi.xlsx');
    }
}
