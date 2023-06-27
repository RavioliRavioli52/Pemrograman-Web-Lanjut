@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Mahasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Starter</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    @if(auth()->user()->email == 'admin@IF')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header text-right">
                        <a href="{{route('insertmahasiswa')}}" class="btn btn-primary" role="button">Open Mahasiswa Form</a>
                    </div>
                    <h1 class="ml-5">Mahasiswa Teknik Informatika</h1>
                    <div class="card-body p-0">
                        <div class="container">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>NRP</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Nomor telpon</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($semua_mahasiswa as $mahasiswa)
                                    @if($mahasiswa->role == 2 && $mahasiswa->program_studi_id == 1)
                                        <tr>
                                            <td>{{ $mahasiswa->nrp }}</td>
                                            <td>{{ $mahasiswa->name }}</td>
                                            <td>{{ $mahasiswa->email }}</td>
                                            <td>{{ $mahasiswa->alamat }}</td>
                                            <td>{{ $mahasiswa->nomor_telpon }}</td>
                                            <td>
                                                <a href="#" class="btn btn-warning" role="button">Edit</a>
                                                <a href="{{route('deletemahasiswa', ['id'=> $mahasiswa->id])}}" class="btn btn-danger" role="button">Delete</a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mahasiswa" aria-expanded="false" aria-controls="mahasiswa">
                                        <h1>View Mahasiswa Mata Kuliah</h1>
                                    </button>
                                </h2>
                                <div id="mahasiswa" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        @foreach($semua_mahasiswa as $mahasiswa)
                                            @if($mahasiswa->program_studi_id == 1 AND $mahasiswa->role == 2)
                                                <div class="accordion accordion-flush" id="accordionFlush">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$mahasiswa->id}}" aria-expanded="false" aria-controls="{{$mahasiswa->id}}">
                                                                <h3>{{$mahasiswa->nrp}} {{$mahasiswa->name}}</h3>
                                                            </button>
                                                        </h2>
                                                        <div id="{{$mahasiswa->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                                                            <div class="accordion-body">
                                                                <table class="table table-hover mb-0">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>Tahun Akademik</th>
                                                                        <th>Kode Mata Kuliah</th>
                                                                        <th>Nama Mata Kuliah</th>
                                                                        <th>SKS</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($semua_dkbs as $dkbs)
                                                                        @if($dkbs->tipe =='Teori' OR $dkbs->tipe =='-')
                                                                            @foreach($semua_tahak as $tahak)
                                                                                @if($dkbs->tahun_akademik_id_tahun_akademik == $tahak->id_tahun_akademik)
                                                                                    @if($mahasiswa->id == $dkbs->l_user_id)
                                                                                        @foreach($semua_matkul as $matkul)
                                                                                            @if($dkbs->mata_kuliah_id_mata_kuliah == $matkul->id_mata_kuliah )
                                                                                                <tr>
                                                                                                    <td>{{ $tahak->tahun_akademik }} - {{ $tahak->semester}}</td>
                                                                                                    <td>{{ $matkul->id_mata_kuliah }}</td>
                                                                                                    <td>{{ $matkul->nama_mata_kuliah }}</td>
                                                                                                    <td>{{ $matkul->sks }}</td>
                                                                                                </tr>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        @elseif(auth()->user()->email == 'admin@SI')
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header text-right">
                            <a href="{{route('insertmahasiswa')}}" class="btn btn-primary" role="button">Open Mahasiswa Form</a>
                        </div>
                        <h1 class="ml-5">Mahasiswa Sistem Informasi</h1>
                        <div class="card-body p-0">
                            <div class="container">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>NRP</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Nomor telpon</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($semua_mahasiswa as $mahasiswa)
                                        @if($mahasiswa->role == 2 && $mahasiswa->program_studi_id == 2)
                                            <tr>
                                                <td>{{ $mahasiswa->nrp }}</td>
                                                <td>{{ $mahasiswa->name }}</td>
                                                <td>{{ $mahasiswa->email }}</td>
                                                <td>{{ $mahasiswa->alamat }}</td>
                                                <td>{{ $mahasiswa->nomor_telpon }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-warning" role="button">Edit</a>
                                                    <a href="{{route('deletemahasiswa', ['id'=> $mahasiswa->id])}}" class="btn btn-danger" role="button">Delete</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mahasiswa" aria-expanded="false" aria-controls="mahasiswa">
                                            <h1>View Mahasiswa Mata Kuliah</h1>
                                        </button>
                                    </h2>
                                    <div id="mahasiswa" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            @foreach($semua_mahasiswa as $mahasiswa)
                                                @if($mahasiswa->program_studi_id == 2 AND $mahasiswa->role == 2)
                                                    <div class="accordion accordion-flush" id="accordionFlush">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$mahasiswa->id}}" aria-expanded="false" aria-controls="{{$mahasiswa->id}}">
                                                                    <h3>{{$mahasiswa->nrp}} {{$mahasiswa->name}}</h3>
                                                                </button>
                                                            </h2>
                                                            <div id="{{$mahasiswa->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlush">
                                                                <div class="accordion-body">
                                                                    <table class="table table-hover mb-0">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Tahun Akademik</th>
                                                                            <th>Kode Mata Kuliah</th>
                                                                            <th>Nama Mata Kuliah</th>
                                                                            <th>SKS</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($semua_dkbs as $dkbs)
                                                                            @if($dkbs->tipe =='Teori' OR $dkbs->tipe =='-')
                                                                                @foreach($semua_tahak as $tahak)
                                                                                    @if($dkbs->tahun_akademik_id_tahun_akademik == $tahak->id_tahun_akademik)
                                                                                        @if($mahasiswa->id == $dkbs->l_user_id)
                                                                                            @foreach($semua_matkul as $matkul)
                                                                                                @if($dkbs->mata_kuliah_id_mata_kuliah == $matkul->id_mata_kuliah )
                                                                                                    <tr>
                                                                                                        <td>{{ $tahak->tahun_akademik }}-{{ $tahak->semester}}</td>
                                                                                                        <td>{{ $matkul->id_mata_kuliah }}</td>
                                                                                                        <td>{{ $matkul->nama_mata_kuliah }}</td>
                                                                                                        <td>{{ $matkul->sks }}</td>
                                                                                                    </tr>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        @endif
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
    @endif
    <!-- /.content -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
