@extends('template.master')

@section('title', 'Edit')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">`
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Genre</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Genre</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Genre</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                    <form action="{{ route('genre.update', $genre->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $genre->nama }}">
                          @error('nama')
                              <div class="alert alert-danger mt-1">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <!-- /.card-body -->

                    <div class="row card-footer justify-content-between">
                        <div class="col">
                          <button type="submit" class="btn btn-warning">Update</button>
                          <button type="reset" class="btn btn-danger me-auto">Reset</button>
                        </div>
                        <div class="col d-flex justify-content-end">
                          <a href="{{ route('genre.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection