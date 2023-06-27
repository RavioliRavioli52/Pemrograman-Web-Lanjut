<?php

namespace App\Http\Controllers;

use App\Dkbs;
use App\MataKuliah;
use App\ProgramStudi;
use App\TahunAkademik;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $data_mahasiswa = User::all();
        $data_prodi = ProgramStudi::all();
        $data_dkbs = Dkbs::all();
        $data_matkul = MataKuliah::all();
        $data_tahak = TahunAkademik::all();
        return view('admin.listmahasiswa', [
            'semua_mahasiswa' => $data_mahasiswa,
            'semua_prodi' => $data_prodi,
            'semua_dkbs' => $data_dkbs,
            'semua_matkul' => $data_matkul,
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
        return view('admin.insert_mahasiswa', [
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
            'txtnrp' => 'required|string|max:100',
            'txtnama' => 'required|string|max:100',
            'txtemail' => 'required|string|max:100',
            'txtpass' => 'required|string|max:100',
            'txtalamat' => 'required|string|max:100',
            'txtnomor' => 'required|string|max:100',
        ])->validate();

        if (auth()->user()->email == 'admin@IF')
        {
            $prodi = 1;
        } elseif (auth()->user()->email == 'admin@SI'){
            $prodi = 2;
        }


        $user = new User();
        $user ->nrp = $validatedData['txtnrp'];
        $user ->role = '2';
        $user ->name = $validatedData['txtnama'];
        $user ->email = $validatedData['txtemail'];
        $user ->password = Hash::make($validatedData['txtpass']);
        $user ->alamat = $validatedData['txtalamat'];
        $user ->nomor_telpon = $validatedData['txtnomor'];
        $user->program_studi_id = $prodi;
        $user ->save();
        return redirect(route('mahasiswalist'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = validator($request->all(),[
            'txtnama' => 'required|string|max:100',
            'txtemail' => 'required|string|max:100',
            'txtpass' => 'required|string|max:100',
            'txtalamat' => 'required|string|max:100',
            'txtnomor' => 'required|string|max:100',
        ])->validate();

        $prodi = substr($validatedData['txtemail'], 2, 2);

        if ($prodi == "72")
            $prodi_ = 1;
        else
            $prodi_ = 2;
        $nrp = substr($validatedData['txtemail'], 0, 7);

        $user ->nrp = $nrp;
        $user ->role = 2;
        $user ->name = $validatedData['txtnama'];
        $user ->email = $validatedData['txtemail'];
        $user ->password = Hash::make($validatedData['txtpass']);
        $user ->alamat = $validatedData['txtalamat'];
        $user ->nomor_telpon = $validatedData['txtnomor'];
        $user ->program_studi_id = $prodi_;
        $user ->save();
        return redirect(route('profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect(route('mahasiswalist'));
    }
}
