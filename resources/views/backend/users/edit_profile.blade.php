@extends('backend.master')

@section('content')
  <!-- Begin Page Content -->
              
<div class="container col-11  align-center">

                @if ( session()->get('message') )
                    <div class="alert alert-success" role="alert">
                       {{ session()->get('message') }}
                  </div>
                @endif


  <h4 class="card-header  text-center" style="background: #000000;color: white">Edit Profile </h4>
  <form action="{{ route('profile.store',$editData->id) }}" method="post" enctype="multipart/form-data">

   @csrf

  <div class="row">
    <div class="col-12">  

    <div class="row"> {{-- /// 1st row --}}

    <div class="col-md-6" >   
        <div class="form-group">
          <label for="email">Name:</label>
          <input type="text" value="{{ $editData->name }}"  class="form-control" id="name" placeholder="" name="name">


     <font style="color: red">
          {{ ($errors->has('name'))?($errors->first('name')):'' }}
       </font>

        </div>
     </div>

 <div class="col-md-6" >   
        <div class="form-group">
         <h5>Gender<span class="text-danger">*</span></h5>
    <div class="controls">
     <select name="gender" id="gender"  class="form-control">
        <option value="" selected="" disabled="">Select Gender</option>
        <option value="Male" {{ ($editData->role == "Male" ? "selected": "") }}>Male</option>
        <option value="FeMale" {{ ($editData->role == "FeMale" ? "selected": "") }}>FeMale</option>
         
      </select>
     </div>
     
     <font style="color: red">
          {{ ($errors->has('role'))?($errors->first('role')):'' }}
       </font>

        </div>
     </div>


<div class="col-md-6" >   
        <div class="form-group">
          <label for="email"> Email:</label>
          <input type="text"  value="{{ $editData->email }}" class="form-control" id="email" placeholder="" name="email">


     <font style="color: red">
          {{ ($errors->has('email'))?($errors->first('email')):'' }}
       </font>

        </div>
     </div>
 

<div class="col-md-6" >   
        <div class="form-group">
          <label for="email"> Mobile:</label>
          <input type="text"  value="{{ $editData->mobile }}" class="form-control" id="mobile" placeholder="" name="mobile">


     <font style="color: red">
          {{ ($errors->has('mobile'))?($errors->first('mobile')):'' }}
       </font>

        </div>
     </div>

<div class="col-md-6" >   
        <div class="form-group">
          <label for="email"> Address:</label>
          <input type="text"  value="{{ $editData->address }}" class="form-control" id="address" placeholder="" name="address">


     <font style="color: red">
          {{ ($errors->has('address'))?($errors->first('address')):'' }}
       </font>

        </div>
     </div>


</div> {{-- /// End 1st row --}}



    <div class="row"> {{-- /// 2nd row --}}


     <div class="col-md-6" >    
        <div class="form-group">
          <label for="text">Profile:</label>
           <input type="file" class="form-control" id="profile"  name="profile" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">



     <font style="color: red">
          {{ ($errors->has('profile'))?($errors->first('profile')):'' }}
       </font>

        </div>
     </div>

<div class="controls">
   <img id="blah" alt="your image" width="400" height="400" src="{{url('uploads/no_image.jpg') }}" style="width: 300px;height: 300px;border: 1px solid #000000" alt="User Avatar"> 

  </div>
</div> {{-- /// End 2nd row --}}


</div> {{-- /// End 3rd row --}}


</div>
 <button type="submit" class="btn btn-success">Submit</button>
</div>
    
   

  </form>




@endsection