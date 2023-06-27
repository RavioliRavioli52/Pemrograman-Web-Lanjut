@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Edit Profile</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Edit Profile</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">
        <form action="{{route('updateprofile', ['id'=> Auth::user()->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="txtName">NRP</label>
                <input type="text" id="txtNama" name="txtnrp" class="form-control" required readonly placeholder="NRP" value="{{Auth::user()->nrp}}">
            </div>
            <div class="form-group">
                <label for="txtName">Nama</label>
                <input type="text" id="txtName" name="txtnama" class="form-control" required placeholder="Masukkan Nama" value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <label for="txtName">Email</label>
                <input type="email" id="txtName" name="txtemail" class="form-control" required placeholder="Masukkan Email" value="{{Auth::user()->email}}">
            </div>
            <div class="form-group">
                <label for="txtName">Password</label>
                <input type="password" id="txtName" name="txtpass" class="form-control" required placeholder="Masukkan password" value="{{Auth::user()->password}}">
            </div>
            <div class="form-group">
                <label for="txtName">Alamat</label>
                <input type="text" id="txtName" name="txtalamat" class="form-control" required placeholder="Masukkan Alamat" value="{{Auth::user()->alamat}}">
            </div>
            <div class="form-group">
                <label for="txtName">Nomor Telpon</label>
                <input type="text" id="txtName" name="txtnomor" class="form-control" required placeholder="Masukkan Nomor Telpon" value="{{Auth::user()->nomor_telpon}}">
            </div>
            <div class="text-right">
                <a href="#" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
