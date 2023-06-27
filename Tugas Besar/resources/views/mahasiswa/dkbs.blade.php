@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Dokumen Kontrak Beban Studi</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Pengumuman</a></li>
					<li class="breadcrumb-item active">Dokumen Kontrak Beban Studi</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
@foreach($semua_tahak as $tahak)
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$tahak->semester}}{{$tahak->tahun_akademik}}" aria-expanded="false" aria-controls="{{$tahak->semester}}{{$tahak->tahun_akademik}}">
                    <h1>Reguler {{$tahak->semester}}{{$tahak->tahun_akademik}}</h1>
                </button>
            </h2>
            <div id="{{$tahak->semester}}{{$tahak->tahun_akademik}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>KODE MATA KULIAH</th>
                            <th>NAMA MATA KULIAH</th>
                            <th>SKS</th>
                            <th>KELAS</th>
                            <th>HARI</th>
                            <th>WAKTU</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($semua_dkbs as $dkbs)
                            @if($dkbs->l_user_id == Auth::user()->id AND $dkbs->tahun_akademik_id_tahun_akademik == $tahak->id_tahun_akademik)
                                @foreach($semua_matkul as $matkul)
                                    @if($dkbs->mata_kuliah_id_mata_kuliah == $matkul->id_mata_kuliah )
                                        @if($dkbs->tipe =='Teori' OR $dkbs->tipe =='-')
                                            <tr>
                                                <td>{{ $matkul->id_mata_kuliah}}</td>
                                                <td>{{ $matkul->nama_mata_kuliah}}</td>
                                                <td>{{ $matkul->sks}}</td>
                                                <td>{{ $dkbs->kelas}}</td>
                                                <td>{{ $dkbs->hari}}</td>
                                                <td>{{ $dkbs->jam_mulai}} - {{ $dkbs->jam_selesai}}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>{{ $matkul->id_mata_kuliah}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $dkbs->hari}}</td>
                                                <td>{{ $dkbs->jam_mulai}} - {{ $dkbs->jam_selesai}}</td>
                                            </tr>
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
@endforeach
<!-- /.content -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
