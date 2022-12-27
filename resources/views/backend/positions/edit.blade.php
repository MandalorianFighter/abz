@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Position - Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Position - Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add New Position</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('position.update', $position->id) }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="inputName">Position Name</label>
                        <input type="text" name="position" class="form-control" id="inputName" placeholder="Enter Position Name" value="{{ $position->position }}">
                    </div>
                    @error('position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="card-footer">
                    <div class="container-fluid"><button type="submit" class="btn btn-primary">Update</button> <a href="{{ route('position.delete', $position->id) }}" onclick="return confirm('Are you sure, you want to delete this Position?')" class="btn btn-danger float-sm-right">Delete</a></div>
                    </div>
                </form>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

@endsection