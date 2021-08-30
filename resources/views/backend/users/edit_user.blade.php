@extends('backend.master')

@section('content')
  <!-- Begin Page Content -->
              
<div class="container col-11  align-center">

                @if ( session()->get('message') )
                    <div class="alert alert-success" role="alert">
                       {{ session()->get('message') }}
                  </div>
                @endif


  <h4 class="card-header  text-center" style="background: #000000;color: white">Add User </h4>
  <form action="{{ route('user.update',$editData->id) }}" method="post" enctype="multipart/form-data">

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
         <h5>User Role <span class="text-danger">*</span></h5>
    <div class="controls">
     <select name="role" id="role"  class="form-control">
        <option value="" selected="" disabled="">Select Role</option>
        <option value="Admin" {{ ($editData->role == "Admin" ? "selected": "") }}>Admin</option>
        <option value="Operator" {{ ($editData->role == "Operator" ? "selected": "") }}>Operator</option>
         
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
 

</div> {{-- /// End 1st row --}}



    <div class="row"> {{-- /// 2nd row --}}

{{-- 
     <div class="col-md-6" >    
        <div class="form-group">
          <label for="text">Password:</label>
          <input type="password" class="form-control" id="password" placeholder=""  name="password">


     <font style="color: red">
          {{ ($errors->has('password'))?($errors->first('password')):'' }}
       </font>

        </div>
     </div> --}}

</div> {{-- /// End 2nd row --}}


</div> {{-- /// End 3rd row --}}


</div>
 <button type="submit" class="btn btn-success">Submit</button>
</div>
    
   

  </form>


</div>

@endsection