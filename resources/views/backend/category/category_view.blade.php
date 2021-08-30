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
<h4 class="card-header  text-center" style="background: #000000;color: white">View Category {{ $ccount }}</h4>
     <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Category List</h3>
          
                </div>
                <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">SL</th>
                <th>Category Name</th>
                <th>Created at</th>
                <th width="25%">Action</th>
                 
            </tr>
        </thead>
        <tbody>
            @foreach($allData as $key => $item )
            <tr>
                <td>{{ $allData->firstItem()+$key }}</td>
                <td> {{ $item->category_name }} </td>
             <td>
     {{$item->created_at == '' ? 'N/A' : $item->created_at->format('y-m-d').
       '('.$item->created_at->diffForHumans().')'}}

            </td>
              
                <td>
<a href="{{ route('category.edit',$item->id) }}" class="btn btn-info">Edit</a>
<a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger" id="delete">Delete</a>

                </td>
                 
            </tr>
            @endforeach
                             
            </tbody>
            <tfoot>
                 
            </tfoot>
          </table>

          {{ $allData->links() }}

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