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
<h4 class="card-header  text-center" style="background: #000000;color: white">View Coupon </h4>
     <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Coupon List</h3>
          
                </div>
                <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="5%">SL</th>
                <th>Cooupon Name</th>
                <th>Coupon Discount</th>
                <th>Status</th>
                <th>Created at</th>
                <th width="25%">Action</th>
                 
            </tr>
        </thead>
        <tbody>
            @foreach($coupons as $key => $item )
            <tr>
                <td>{{ $key+1}}</td>
                <td> {{ $item->coupon_key }} </td>
                <td> {{ $item->discount }} %</td>
           <td>
              @if($item->status == 1)
                <span class="badge badge-success">Active</span>
              @else
               <span class="badge badge-danger">InActive</span>
              @endif
           </td>

             <td>
     {{$item->created_at == '' ? 'N/A' : $item->created_at->format('y-m-d').
       '('.$item->created_at->diffForHumans().')'}}

            </td>
              
                <td>
<a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-info btn-sm">Edit</a>
<a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>

@if($item->status == 1)
<a href="{{ route('coupon.inactive',$item->id) }}" class="btn btn-danger btn-sm" >InActive</a>
@else
<a href="{{ route('coupon.active',$item->id) }}" class="btn btn-success btn-sm" >Active</a>

@endif


                </td>
                 
            </tr>
            @endforeach
                             
            </tbody>
            <tfoot>
                 
            </tfoot>
          </table>

        {{--   {{ $allData->links() }} --}}

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