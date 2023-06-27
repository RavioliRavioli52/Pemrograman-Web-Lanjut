@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Pengumuman</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item active">Pengumuman</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2>Pengumuman</h2>
                            <h4>Cuti Bersama 2023</h4>
                            <img src="{{asset('img/pengumuman1.jpg')}}">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <h2>INFO PENDAFTARAN KELULUSAN DAN WISUDA</h2>
                            <h4>Periode November 2023</h4>
                            <img src="{{asset('img/pengumuman2.jpg')}}" >
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <h2>INFORMASI SOSIALISASI PENAWARAN MBKM MANDIRI</h2>
                            <h4>Dari Unit Penyelengara UK..Maranatha Semester Ganjil 2023/2024</h4>
                            <img src="{{asset('img/pengumuman3.jpg')}}" >
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <h2>INFO TIMELINE BEASISWA INTERNAL</h2>
                            <h4>Ganjil 2023/2024</h4>
                            <img src="{{asset('img/pengumuman4.jpg')}}" >
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <h2>INFO KETENTUAN FOTO WISUDA</h2>
                            <h4>Periode November 2023</h4>
                            <img src="{{asset('img/pengumuman5.jpg')}}" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
