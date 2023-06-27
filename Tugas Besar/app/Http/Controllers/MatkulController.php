<?php

namespace App\Http\Controllers;

use App\Dkbs;
use App\MataKuliah;
use App\ProgramStudi;
use App\TahunAkademik;
use App\User;
use Illuminate\Http\Request;

class MatkulController extends Controller
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
        return view('admin.list_matakuliah', [
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $data = ProgramStudi::all();
        return view('admin.insert_mata_kuliah', [
            'semua_prodi' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(),[
            'txtid' => 'required|string|max:100',
            'txtnama' => 'required|string|max:100',
            'txtsks' => 'required|string|max:100',
            'txtsemester' => 'required|string|max:100',
        ])->validate();

        if (auth()->user()->email == 'admin@IF')
        {
            $prodi = 1;
        } elseif (auth()->user()->email == 'admin@SI'){
            $prodi = 2;
        }

        $matkul = new MataKuliah();
        $matkul ->id_mata_kuliah = $validatedData['txtid'];
        $matkul ->nama_mata_kuliah = $validatedData['txtnama'];
        $matkul ->sks = $validatedData['txtsks'];
        $matkul ->semester = $validatedData['txtsemester'];
        $matkul ->program_Studi_id = $prodi;
        $matkul ->save();
        return redirect(route('listmatkul'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id_mata_kuliah)
    {
        $matkul = MataKuliah::find($id_mata_kuliah);
        if ($matkul) {
            $matkul->delete();
        }
        return redirect(route('listmatkul'));
    }
}
