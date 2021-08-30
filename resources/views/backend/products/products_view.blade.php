@extends('backend.dashboard')

@section('content')

<div class="container col-12  align-center">
  <h4 class="card-header  text-center" style="background: #000000;color: white"> View Product (Total {{$ccount}})</h4>  <!-- Page Heading -->
             @if ( session()->get('message') )
                    <div class="alert alert-success" role="alert">
                       {{ session()->get('message') }}
                  </div>
                @endif
                      

  <table class="table table-bordered ">
    <thead>
      <tr>
        <th>SL</th>
        <th>Prduct Name</th>
        <th>Category</th>
        <th>Sub Category</th>
       {{--  <th>P. Description</th>
        <th>P. Summary</th> --}}
        <th>P. Price</th>
        <th>P. Quantity</th>
        <th>P. Thumbnail</th>
        <th>Actions</th>
  
      </tr>
    </thead>
    <tbody>

  @forelse($products as $key=>$item)

      <tr>
        <td>{{ $products->firstItem()+$key }}</td>
        <td>{{ $item->product_name }}</td>
        <td>{{ $item['category']['category_name'] }}</td>
        <td>{{ $item['subcategory']['sub_category_name']  }}</td>
        <td>{{ $item->product_price }}</td>
        <td>{{ $item->product_quantity }}</td>
        <td>
          <img width="120px" src="{{ url('/uploads/thumbnail/').'/'.$item->product_thumbnail }}">
        </td>

        <td>
          <a target="__blank" href="" class="btn btn-rounded btn-success">View</a>
          <a href="{{ route('product.edit',$item->id) }}" class="btn btn-rounded btn-primary">Edit</a>
          <a href="{{ route('product.delete',$item->id) }}" class="btn btn-rounded btn-danger btn-outline" id="delete">Delete</a>
        </td>


      </tr>

   @empty

   <tr class="text-center">
     
     <td colspan="500">
       
       You haven't product item
     </td>
   </tr>

   @endforelse

    </tbody>


  </table>
  {{ $products->links() }}
</div>


@endsection