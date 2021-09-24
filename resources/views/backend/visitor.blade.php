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
<h4 class="card-header  text-center" style="background: #000000;color: white">View Visitor </h4>
     <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Visitor List</h3>
          
                </div>
                <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">SL</th>
                <th>IP Address</th>
                <th>Visit Time</th>
                <th width="25%">Action</th>
                 
            </tr>
        </thead>
        <tbody>
            @foreach($getVisitor as $key => $item )
            <tr>
                <td>{{ $getVisitor->firstItem()+$key }}</td>
                <td> {{ $item->ip_address }} </td>
                <td> {{ $item->visit_time }} </td>
             <td>
     {{$item->created_at == '' ? 'N/A' : $item->created_at->format('y-m-d').
       '('.$item->created_at->diffForHumans().')'}}

            </td>
              
                <td>


                </td>
                 
            </tr>
            @endforeach
                             
            </tbody>
            <tfoot>
                 
            </tfoot>
          </table>

          {{ $getVisitor->links() }}

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