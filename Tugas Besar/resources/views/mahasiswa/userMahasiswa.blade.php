@extends('layouts.master')

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
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Nomor telpon</th>
                            <th>Foto</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ auth()->user()->nrp }}</td>
                                    <td>{{ auth()->user()->name }}</td>
                                    <td>{{ auth()->user()->email }}</td>
                                    <td>{{ auth()->user()->alamat }}</td>
                                    <td>{{ auth()->user()->nomor_telpon }}</td>
                                    <td>{{ auth()->user()->foto }}</td>
                                    <td>
                                        <a href="{{url('editUser')}}" class="btn btn-warning" role="button">Edit</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            {{-- main content here --}}

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
