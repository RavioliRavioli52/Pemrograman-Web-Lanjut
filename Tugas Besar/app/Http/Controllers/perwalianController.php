<?php

namespace App\Http\Controllers;

use App\Dkbs;
use App\MataKuliah;
use App\ProgramStudi;
use App\TahunAkademik;
use App\User;
use Illuminate\Http\Request;

class perwalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $data_dkbs = Dkbs::all();
        $data_user = User::all();
        $data_matkul = MataKuliah::all();
        $data_tahak = TahunAkademik::all();
        $data_prodi = ProgramStudi::all();
        return view('mahasiswa.perwalian', [
            'semua_matkul' => $data_matkul,
            'semua_prodi' => $data_prodi,
            'semua_dkbs' => $data_dkbs,
            'semua_user' => $data_user,
            'semua_tahak' => $data_tahak,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dkbs  $dkbs
     * @return \Illuminate\Http\Response
     */
    public function show(Dkbs $dkbs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dkbs  $dkbs
     * @return \Illuminate\Http\Response
     */
    public function edit(Dkbs $dkbs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dkbs  $dkbs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dkbs $dkbs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dkbs  $dkbs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dkbs $dkbs)
    {
        //
    }
}
