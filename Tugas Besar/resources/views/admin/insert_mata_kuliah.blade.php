@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Mata Kuliah Form</h1>
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
                <form action="{{route('storematkul')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="txtName">Kode Mata Kuliah</label>
                        <input type="text" id="txtName" name="txtid" class="form-control" required placeholder="Masukkan Kode Mata Kuliah">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Nama Mata Kuliah</label>
                        <input type="text" id="txtName" name="txtnama" class="form-control" required placeholder="Masukkan Nama Mata Kuliah">
                    </div>
                    <div class="form-group">
                        <label for="txtName">SKS</label>
                        <input type="text" id="txtName" name="txtsks" class="form-control" required placeholder="Masukkan SKS">
                    </div>
                    <div class="form-group">
                        <label for="txtName">Semester</label>
                        <input type="text" id="txtName" name="txtsemester" class="form-control" required placeholder="Masukkan Semester">
                    </div>
                    <div class="text-right">
                        <a href="#" class="btn btn-outline-secondary mr-2" role="button">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
