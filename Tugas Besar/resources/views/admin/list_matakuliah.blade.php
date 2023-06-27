@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Mata Kuliah</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Mata Kuliah</li>
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
                    <a href="{{route('insertmatkul')}}" class="btn btn-primary" role="button">Open Mata Kuliah Form Form</a>
                </div>
                <h1 class="ml-5">Mata Kuliah Teknik Informatika</h1>
                <div class="container">
                    @foreach(range(1,8) as $semester)
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$semester}}{{$semester}}" aria-expanded="false" aria-controls="{{$semester}}{{$semester}}">
                                        <h1>Semester {{$semester}}</h1>
                                    </button>
                                </h2>
                                <div id="{{$semester}}{{$semester}}" class="accordion-collapse collapse" data-bs-parent="#3">
                                    <div class="accordion-body">
                                        <div class="card-body p-0">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Kode Mata Kuliah</th>
                                                    <th>Nama Mata Kuliah</th>
                                                    <th>SKS</th>
                                                    <th>Semester</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($semua_matkul as $matkul)
                                                    @if($semester == $matkul->semester AND $matkul->program_studi_id == 1)
                                                        <tr>
                                                            <td>{{ $matkul->id_mata_kuliah }}</td>
                                                            <td>{{ $matkul->nama_mata_kuliah }}</td>
                                                            <td>{{ $matkul->sks }}</td>
                                                            <td>{{ $matkul->semester }}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-warning" role="button">Edit</a>
                                                                <a href="{{route('deletematkul', ['id'=> $matkul->id_mata_kuliah])}}" class="btn btn-danger" role="button">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#view" aria-expanded="false" aria-controls="view">
                                <h1 class="ml-4">View Mata Kuliah Mahasiswa</h1>
                            </button>
                        </h2>
                        <div id="view" class="accordion-collapse collapse" data-bs-parent="#view">
                            <div class="accordion-body">
                                <div class="container">
                                    <div class="card-body">
                                        @foreach(range(1,8) as $semester)
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$semester}}" aria-expanded="false" aria-controls="{{$semester}}">
                                                            <h1>Semester {{$semester}}</h1>
                                                        </button>
                                                    </h2>
                                                    <div id="{{$semester}}" class="accordion-collapse collapse" data-bs-parent="#1">
                                                        <div class="accordion-body">
                                                            @foreach($semua_matkul as $matkul)
                                                                <div class="accordion accordion-flush" id="accordionExample">
                                                                    @if($matkul->program_studi_id == 1 AND $matkul->semester == $semester)
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$matkul->id_mata_kuliah}}{{$semester}}" aria-expanded="true" aria-controls="{{$matkul->id_mata_kuliah}}{{$semester}}">
                                                                                    <h2>{{$matkul->id_mata_kuliah}} {{$matkul->nama_mata_kuliah}}</h2>
                                                                                </button>
                                                                            </h2>
                                                                            <div id="{{$matkul->id_mata_kuliah}}{{$semester}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                                                <div class="accordion-body">
                                                                                    <table class="table table-hover mb-0">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>Tahun Akademik</th>
                                                                                            <th>NRP</th>
                                                                                            <th>Nama</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @foreach($semua_dkbs as $dkbs)
                                                                                            @if($matkul->id_mata_kuliah == $dkbs->mata_kuliah_id_mata_kuliah)
                                                                                                @if($dkbs->tipe == 'Teori' OR $dkbs->tipe == '-')
                                                                                                    @foreach($semua_tahak as $tahak)
                                                                                                        @if($dkbs->tahun_akademik_id_tahun_akademik == $tahak->id_tahun_akademik)
                                                                                                            @foreach($semua_user as $user)
                                                                                                                @if($dkbs->l_user_id == $user->id AND $user->program_studi_id == 1)
                                                                                                                    <tr>
                                                                                                                        <td>{{ $tahak->tahun_akademik }} {{ $tahak->semester }}</td>
                                                                                                                        <td>{{ $user->nrp }}</td>
                                                                                                                        <td>{{ $user->name }}</td>
                                                                                                                    </tr>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            @endif
                                                                                        @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if(auth()->user()->email == 'admin@SI')
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-right">
                    <a href="{{route('insertmatkul')}}" class="btn btn-primary" role="button">Open Mata Kuliah Form Form</a>
                </div>
                <h1 class="ml-5">Mata Kuliah Sistem Informasi</h1>
                <div class="container">
                    @foreach(range(1,8) as $semester)
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$semester}}{{$semester}}" aria-expanded="false" aria-controls="{{$semester}}{{$semester}}">
                                        <h1>Semester {{$semester}}</h1>
                                    </button>
                                </h2>
                                <div id="{{$semester}}{{$semester}}" class="accordion-collapse collapse" data-bs-parent="#3">
                                    <div class="accordion-body">
                                        <div class="card-body p-0">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Kode Mata Kuliah</th>
                                                    <th>Nama Mata Kuliah</th>
                                                    <th>SKS</th>
                                                    <th>Semester</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($semua_matkul as $matkul)
                                                    @if($semester == $matkul->semester AND $matkul->program_studi_id == 2)
                                                        <tr>
                                                            <td>{{ $matkul->id_mata_kuliah }}</td>
                                                            <td>{{ $matkul->nama_mata_kuliah }}</td>
                                                            <td>{{ $matkul->sks }}</td>
                                                            <td>{{ $matkul->semester }}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-warning" role="button">Edit</a>
                                                                <a href="{{route('deletematkul', ['id'=> $matkul->id_mata_kuliah])}}" class="btn btn-danger" role="button">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#view" aria-expanded="false" aria-controls="view">
                                <h1 class="ml-4">View Mata Kuliah Mahasiswa</h1>
                            </button>
                        </h2>
                        <div id="view" class="accordion-collapse collapse" data-bs-parent="#view">
                            <div class="accordion-body">
                                <div class="container">
                                    <div class="card-body">
                                        @foreach(range(1,8) as $semester)
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$semester}}" aria-expanded="false" aria-controls="{{$semester}}">
                                                            <h1>Semester {{$semester}}</h1>
                                                        </button>
                                                    </h2>
                                                    <div id="{{$semester}}" class="accordion-collapse collapse" data-bs-parent="#1">
                                                        <div class="accordion-body">
                                                            @foreach($semua_matkul as $matkul)
                                                                <div class="accordion accordion-flush" id="accordionExample">
                                                                    @if($matkul->program_studi_id == 2 AND $matkul->semester == $semester)
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header">
                                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$matkul->id_mata_kuliah}}{{$semester}}" aria-expanded="true" aria-controls="{{$matkul->id_mata_kuliah}}{{$semester}}">
                                                                                    <h2>{{$matkul->id_mata_kuliah}} {{$matkul->nama_mata_kuliah}}</h2>
                                                                                </button>
                                                                            </h2>
                                                                            <div id="{{$matkul->id_mata_kuliah}}{{$semester}}" class="accordion-collapse collapse" data-bs-parent="{{$matkul->id_mata_kuliah}}{{$semester}}">
                                                                                <div class="accordion-body">
                                                                                    <table class="table table-hover mb-0">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>Tahun Akademik</th>
                                                                                            <th>NRP</th>
                                                                                            <th>Nama</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @foreach($semua_dkbs as $dkbs)
                                                                                            @if($matkul->id_mata_kuliah == $dkbs->mata_kuliah_id_mata_kuliah)
                                                                                                @if($dkbs->tipe == 'Teori' OR $dkbs->tipe == '-')
                                                                                                    @foreach($semua_tahak as $tahak)
                                                                                                        @if($dkbs->tahun_akademik_id_tahun_akademik == $tahak->id_tahun_akademik)
                                                                                                            @foreach($semua_user as $user)
                                                                                                                @if($dkbs->l_user_id == $user->id AND $user->program_studi_id == 2)
                                                                                                                    <tr>
                                                                                                                        <td>{{ $tahak->tahun_akademik }}</td>
                                                                                                                        <td>{{ $user->nrp }}</td>
                                                                                                                        <td>{{ $user->name }}</td>
                                                                                                                    </tr>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                @endif
                                                                                            @endif
                                                                                        @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
<!-- /.content -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
