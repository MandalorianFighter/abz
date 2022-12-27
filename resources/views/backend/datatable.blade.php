@extends('backend.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DataTables Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">DataTables Page</li>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <h3 class="card-title">DataTable with Employees</h3> 
                <div class="col-3 row float-sm-right">
                <a href="{{ route('employee.add') }}"><button type="button" class="btn btn-block btn-info">Add New Employee</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Position</th>
                  <th>Hiring Date</th>
                  <th>Telephone Number</th>
                  <th>Email</th>
                  <th>Salary</th>
                  <th>Photo</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Created By</th>
                  <th>Updated By</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($employees as $employee)
                  <tr>
                    <td>{{$employee->id}}</td>
                    <td><a title='Follow The Link To Edit Or Delete Employee' href="{{ route('employee.edit', $employee->id) }}">{{$employee->full_name}}</a></td>
                    <td>{{isset($employee->position->position) ? $employee->position->position : "Undefined" }}</td>
                    <td>{{$employee->hire_date}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->salary}}</td>
                    <td><img src="{{asset($employee->photo)}}" alt="employee" style="height:60px;"></td>
                    <td>{{$employee->created_at}}</td>
                    <td>{{$employee->updated_at}}</td>
                    <td>{{$employee->admin_created_id}}</td>
                    <td>{{$employee->admin_updated_id}}</td>
                  </tr>
                  @endforeach
                </tbody>
              
                </table>
                
                {{ $employees->links() }}
              </div>
              <!-- /.card-body -->
              </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header ">
              <h3 class="card-title">Positions DataTable</h3>
                <div class="col-3 row float-sm-right">
                <a href="{{ route('position.add') }}"><button type="button" class="btn btn-block btn-info">Add New Position</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Position</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Created By</th>
                  <th>Updated By</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($positions as $position)
                  <tr>
                    <td>{{$position->id}}</td>
                    <td><a title='Follow The Link To Edit Or Delete Item' href="{{ route('position.edit', $position->id) }}">{{$position->position}}</a></td>
                    <td>{{$position->created_at}}</td>
                    <td>{{$position->updated_at}}</td>
                    <td>{{$position->admin_created_id}}</td>
                    <td>{{$position->admin_updated_id}}</td>
                  </tr>
                  @endforeach
                </tbody>
                </table>
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