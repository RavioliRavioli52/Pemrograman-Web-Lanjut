@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit User Form</h1>
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
    <div class="content">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <form action="{{route('storemahasiswa')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="txtName">NRP</label>
                            <input type="text" id="txtName" name="txtnrp" class="form-control" required placeholder="NRP">
                        </div>
                        <div class="form-group">
                            <label for="txtName">Nama</label>
                            <input type="text" id="txtName" name="txtnama" class="form-control" required placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="txtName">Email</label>
                            <input type="email" id="txtName" name="txtemail" class="form-control" required placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                            <label for="txtName">Password</label>
                            <input type="password" id="txtName" name="txtpass" class="form-control" required placeholder="Masukkan password">
                        </div>
                        <div class="form-group">
                            <label for="txtName">Alamat</label>
                            <input type="text" id="txtName" name="txtalamat" class="form-control" required placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="txtName">Nomor Telpon</label>
                            <input type="text" id="txtName" name="txtnomor" class="form-control" required placeholder="Masukkan Nomor Telpon">
                        </div>
                        <div class="text-right">
                            <a href="#" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
