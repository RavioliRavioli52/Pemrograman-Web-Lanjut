@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Profile</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Profile</li>
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
            <div class="card-header text-right">
                <a href="{{route('editprofile', ['id'=> Auth::user()->id])}}" class="btn btn-primary" role="button">Edit Profile</a>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <img src="{{asset('img/user-photo-default.png')}}" width="500px" height="500px">
                </div>
            </div>
            <div class="row justify-content-md-center mt-4 ml-5">
                <div class="col">
                    <h1>Nama Mahasiswa</h1>
                    <h4>{{auth()->user()->name}}</h4>
                </div>
                <div class="col">
                    <h1>Program Studi</h1>
                    @foreach($semua_prodi as $prodi)
                        @if($prodi->id == auth()->user()->program_studi_id)
                            <h4>{{$prodi->nama}}</h4>
                        @endif
                    @endforeach
                </div>
                <div class="col">
                    <h1>Email</h1>
                    <h4>{{auth()->user()->email}}</h4>
                </div>
            </div>
            <div class="row justify-content-md-center mt-4 ml-5">
                <div class="col">
                    <h1>NRP</h1>
                    <h4>{{auth()->user()->nrp}}</h4>
                </div>
                <div class="col">
                    <h1>Nomor Handphone</h1>
                    <h4>{{auth()->user()->nomor_telpon}}</h4>
                </div>
                <div class="col">
                    <h1>Alamat</h1>
                    <h4>{{auth()->user()->alamat}}</h4>
                </div>
            </div>
        </div>
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
