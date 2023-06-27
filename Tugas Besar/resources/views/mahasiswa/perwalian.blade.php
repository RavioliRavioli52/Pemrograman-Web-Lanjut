@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Perwalian</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Perwalian</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @if(substr(auth()->user()->nrp, 2, 2) == '72')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <h1 class="ml-5">Mata Kuliah Teknik Informatika</h1>
                    <div class="container">
                        @foreach(range(1,8) as $semester)
                            @if($semester%2 != 0)
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
                                                                        <a href="#" class="btn btn-warning" role="button">Tambah</a>
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
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(substr(auth()->user()->nrp, 2, 2) == '73')
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <h1 class="ml-5">Mata Kuliah Sistem informasi</h1>
                    <div class="container">
                        @foreach(range(1,8) as $semester)
                            @if($semester%2 != 0)
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
                                                                        <a href="#" class="btn btn-warning" role="button">Tambah</a>
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
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- /.content -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
