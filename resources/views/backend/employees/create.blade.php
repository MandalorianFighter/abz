@extends('backend.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Employee - Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Create Employee - Page</li>
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
                <h3 class="card-title">Add New Employee</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="inputName">Full Name</label>
                        <input type="text" name="full_name" class="form-control" id="inputName" placeholder="Enter Employee Full Name">
                    </div>
                    @error('full_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputDate">Hiring date</label>
                        <input type="text" name="date" class="form-control" id="inputDate" data-inputmask-alias="datetime" data-inputmask-inputformat="dd.mm.yy" data-mask="" inputmode="numeric">
                    </div>
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputPhone">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="inputPhone" data-inputmask='"mask": "+389999999999"' data-mask>
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter Email">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputSalary">Salary</label>
                        <input type="number" name="salary" class="form-control" id="inputSalary" placeholder="Enter Salary">
                    </div>
                    @error('salary')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputLevel">Hierarchy Level</label>
                        <select class="form-control select2" name="level" id="inputLevel" style="width: 100%;">
                        <option value=""></option>
                        <option value="1" disabled>1 Level</option>
                        @for($i = 2; $i <= 5; $i++)
                        <option value="{{$i}}">{{$i}} Level</option>
                        @endfor
                      </select>
                    </div>
                    @error('level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputPosition">Position</label>
                        <select class="form-control select2" name="position" id="inputPosition" style="width: 100%;"></select>
                    </div>
                    @error('position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                        <label for="inputManager">Manager</label>
                        <select class="form-control select2" name="manager" id="inputManager" data-minimum-results-for-search="Infinity" style="width: 100%;"></select>
                    </div>
                    @error('manager')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group">
                    <div class="custom-file">
                    <input type="file" name="photo" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose Photo</label>
                    </div>
                    </div>
                    @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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