@extends('backend.master')

@section('content')
  <!-- Begin Page Content -->
              

 <div class="content-wrapper">
      <div class="container-full">
        <!-- Content Header (Page header) -->
         

        <!-- Main content -->
        <section class="content">
          <div class="row">
               <div class="col-1">
               </div>
    
    <div class="col-9">

     <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">User List</h3>
    <a href="{{ route('user.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add User</a>            
                </div>
                <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">SL</th>
                <th>Role</th>
                <th>Name</th>
                <th>Code</th>
                <th>Email</th>
                <th width="25%">Action</th>
                 
            </tr>
        </thead>
        <tbody>
            @foreach($allData as $key => $user )
            <tr>
                <td>{{ $key+1 }}</td>
                <td> {{ $user->role }} </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->code }}</td>
                <td>{{ $user->email }}</td>
              
                <td>
<a href="{{ route('user.edit',$user->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger" id="delete">Delete</a>

                </td>
                 
            </tr>
            @endforeach
                             
            </tbody>
            <tfoot>
                 
            </tfoot>
          </table>
        </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
           
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
        <!-- /.content -->
      
      </div>
  </div>

@endsection