@extends('backend.dashboard')

@section('content')



<div class="container col-11  align-center">

                @if ( session()->get('message') )
                    <div class="alert alert-success" role="alert">
                       {{ session()->get('message') }}
                  </div>
                @endif


 
  <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">

   @csrf

	<div class="row">
		<div class="col-12">	

	  <div class="row"> {{-- /// 1st row --}}

		<div class="col-md-6" >		
		    <div class="form-group">
		      <label for="email">Product Name:</label>
		      <input type="text"  class="form-control" id="product_name" placeholder="Enter Product name" name="product_name">


		 <font style="color: red">
		      {{ ($errors->has('product_name'))?($errors->first('product_name')):'' }}
		   </font>

		    </div>
		 </div>

	<div class="col-md-6" >		
		 <div class="form-group">
      <label for="email">Select Category Name:</label>
      <select name="category_id" id="category_id"   class="form-control">
        <option value="" selected="" disabled="">Select One</option>

       @foreach($categories as $category) 
        <option value="{{$category->id}}">{{$category->category_name}}</option>
       @endforeach

      </select>  
       <font style="color: red">
      {{ ($errors->has('category_id'))?($errors->first('category_id')):'' }}
     </font>
    </div>
		 </div>

</div> {{-- /// End 1st row --}}






 
	  <div class="row"> {{-- /// 2nd row --}}

		<div class="col-md-6" >		
		    <div class="form-group">
		      <label for="email">Select SubCategory:</label>
		      <select name="subcategory_id" id="subcategory_id"   class="form-control">
        <option value="" selected="" disabled="">Select One</option>

       @foreach($subcategories as $category) 
        <option value="{{$category->id}}">{{$category->sub_category_name}}</option>
       @endforeach

      </select>  

		 <font style="color: red">
		      {{ ($errors->has('subcategory_id'))?($errors->first('subcategory_id')):'' }}
		   </font>

		    </div>
		 </div>

		 <div class="col-md-6" >		
		    <div class="form-group">
		      <label for="email">Product Price:</label>
		      <input type="text" class="form-control" id="product_price" placeholder="Ex: 50"  name="product_price">


		 <font style="color: red">
		      {{ ($errors->has('product_price'))?($errors->first('product_price')):'' }}
		   </font>

		    </div>
		 </div>

</div> {{-- /// End 2nd row --}}



	  <div class="row"> {{-- /// 3rd row --}}

		<div class="col-md-6" >		
		    <div class="form-group">
		      <label for="email">Product Quantity</label>
		      <input type="text" class="form-control" id="product_quantity" placeholder="Ex: 10" name="product_quantity">


		 <font style="color: red">
		      {{ ($errors->has('product_quantity'))?($errors->first('product_quantity')):'' }}
		   </font>

		    </div>
		 </div>


</div> {{-- /// End 3rd row --}}






		<div class="col-md-11" >		
		    <div class="form-group">
		      <label for="email">Product Summary:</label>
		
          <textarea type="text" class="form-control" id="product_summary"  cols="20" rows="10" name="product_summary">
          	
          </textarea>

		 <font style="color: red">
		      {{ ($errors->has('product_summary'))?($errors->first('product_summary')):'' }}
		   </font>

		    </div>
		 </div>

		<div class="col-md-11" >		
		    <div class="form-group">
		      <label for="email">Product Description:</label>
		
          <textarea type="text" class="form-control" id="product_description"  rows="10" name="product_description">
          	
          </textarea>

		 <font style="color: red">
		      {{ ($errors->has('product_description'))?($errors->first('product_description')):'' }}
		   </font>

		    </div>
		 </div>

            <div class="col-md-6" >		
		    <div class="form-group">
		      <label for="email">Product Thumbnail</label>
		      <input type="file" class="form-control" id="product_thumbnail"  name="product_thumbnail" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">


		 <font style="color: red">
		      {{ ($errors->has('product_thumbnail'))?($errors->first('product_thumbnail')):'' }}
		   </font>

		    </div>
		 </div>

		  <div class="col-md-6" >		
		    <div class="form-group">
		      <label for="email">Image Gallery</label>
		      <input type="file" multiple=""  class="form-control" id="product_gallery"  name="product_gallery[]">


		 <font style="color: red">
		      {{ ($errors->has('product_gallery'))?($errors->first('product_gallery')):'' }}
		   </font>

		    </div>
		 </div>



  {{-- end this section --}}

    <div class="controls">
	 <img id="blah" alt="your image" width="400" height="400" src="{{url('uploads/no_image.jpg') }}" style="width: 300px;height: 300px;border: 1px solid #000000" alt="User Avatar"> 

	</div>

	




</div>

</div>
    
    <button type="submit" class="btn btn-success">Submit</button>

  </form>


</div>


@endsection
