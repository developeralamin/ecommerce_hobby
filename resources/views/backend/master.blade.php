@php 
$prefix = Request::route()->getprefix();
$route = Route::current()->getName();
@endphp 



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>
<link rel="shortcut icon" href="{{ asset('backend/assets/img/img.jpg') }}" type="image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">e-commerce <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

             <li class="nav-item active">
                <a class="nav-link" target="__blank" href="{{ url('/') }}">
                   <i class="fa fa-globe"></i>
                    <span>Visit Website</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User Setting
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ ($prefix == '/users')?'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Manage User</span>
        </a>
        <div id="collapseTwo" class="collapse {{ ($prefix == '/users')?'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ ($route == 'user.view')?'active':'' }}" href="{{ route('user.view') }}">View User</a>
                <a class="collapse-item {{ ($route == 'user.add')?'active':'' }}" href="{{ route('user.add') }}">Add User</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ ($prefix == '/profile')?'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Manage Profile</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ ($prefix == '/profile')?'show':'' }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              
    <a class="collapse-item {{ ($route == 'profile.view')?'active':'' }}" href="{{ route('profile.view') }}">Profile View</a>

    <a class="collapse-item {{ ($route == 'password.view')?'active':'' }}" href="{{ route('password.view') }}">Change Password</a>
               
            </div>
        </div>
    </li>

  <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ ($prefix == '/visitor')?'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiesdsfdsf"
            aria-expanded="true" aria-controls="collapseUtilitiesdsfdsf">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Visitors</span>
        </a>
        <div id="collapseUtilitiesdsfdsf" class="collapse {{ ($prefix == '/visitor')?'show':'' }}" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              
    <a class="collapse-item {{ ($route == 'visitor')?'active':'' }}" href="{{ route('visitor') }}">Visitors</a>


            </div>
        </div>
    </li>




            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Ecommerce Iquipment
            </div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ ($prefix == '/category')?'active':'' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Category</span>
    </a>
    <div id="collapsePages" class="collapse {{ ($prefix == '/category')?'show':'' }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item {{ ($route == 'category.view')?'active':'' }}" href="{{ route('category.view') }}">View Category</a>
            <a class="collapse-item {{ ($route == 'category.add')?'active':'' }}" href="{{ route('category.add') }}">Add Category</a>
           
        </div>
    </div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item {{ ($prefix == '/subcategory')?'active':'' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
        aria-expanded="true" aria-controls="collapsePages2">
        <i class="fas fa-fw fa-folder"></i>
        <span>SubCategory</span>
    </a>
    <div id="collapsePages2" class="collapse {{ ($prefix == '/subcategory')?'show':'' }}" aria-labelledby="headingPages2" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item {{ ($route == 'subcategory.view')?'active':'' }}" href="{{ route('subcategory.view') }}">View Category</a>
            <a class="collapse-item {{ ($route == 'subcategory.add')?'active':'' }}" href="{{ route('subcategory.add') }}">Add Category</a>
           
        </div>
    </div>
</li>


{{-- //Product portion --}}


<li class="nav-item {{ ($prefix == '/product')?'active':'' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3"
        aria-expanded="true" aria-controls="collapsePages3">
        <i class="fas fa-fw fa-folder"></i>
        <span>Product</span>
    </a>
    <div id="collapsePages3" class="collapse {{ ($prefix == '/product')?'show':'' }}" aria-labelledby="headingPages3" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item {{ ($route == 'product.view')?'active':'' }}" href="{{ route('product.view') }}">View Product</a>

            <a class="collapse-item {{ ($route == 'product.add')?'active':'' }}" href="{{ route('product.add') }}">Add Product</a>
           
        </div>
    </div>
</li>



{{-- //Coupon portion --}}

<li class="nav-item {{ ($prefix == '/coupon')?'active':'' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3retre"
        aria-expanded="true" aria-controls="collapsePages3retre">
        <i class="fas fa-fw fa-folder"></i>
        <span>Coupon</span>
    </a>
    <div id="collapsePages3retre" class="collapse {{ ($prefix == '/coupon')?'show':'' }}" aria-labelledby="headingPages3" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item {{ ($route == 'coupon.view')?'active':'' }}" href="{{ route('coupon.view') }}">View Coupon</a>

            <a class="collapse-item {{ ($route == 'coupon.add')?'active':'' }}" href="{{ route('coupon.add') }}">Add Coupon</a>
           
        </div>
    </div>
</li>

{{-- //News Letter Portion --}}

<li class="nav-item {{ ($prefix == '/newsletter')?'active':'' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages3retrenewsleeter"
        aria-expanded="true" aria-controls="collapsePages3retrenewsleeter">
        <i class="fas fa-fw fa-folder"></i>
        <span>NewsLetter</span>
    </a>
    <div id="collapsePages3retrenewsleeter" class="collapse {{ ($prefix == '/newsletter')?'show':'' }}" aria-labelledby="headingPages3" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item {{ ($route == 'news.view')?'active':'' }}" href="{{ route('news.view') }}">View NewsLetter</a>

            <a class="collapse-item {{ ($route == 'contact.view')?'active':'' }}" href="{{ route('contact.view') }}">View Contact</a>
           
        </div>
    </div>
</li>



{{-- 
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

                    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

       
    {{-- // Logout section here --}}
    {{-- // Logout section here --}}
 @php
    $user=DB::table('users')->where('id',Auth::user()->id)->first();
  @endphp

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{Auth::user()->name}}
                </span>

               <img  width="20px;" class="rounded-circle"
       src="{{ (!empty($user->profile))? url('uploads/profile/'.$user->profile):url('uploads/no_image.jpg') }}" alt="User Avatar">



            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
               {{--  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a> --}}

 <a class="dropdown-item" href="{{ route('logout') }}"
   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

            </div>
        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


              @yield('content')




            </div>
            <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('backend/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('backend/assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('backend/assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('backend/assets/js/demo/chart-pie-demo.js') }}"></script>


{{-- sweetalert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
  $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 
    });
  });
</script> 

{{-- toaster js --}}
{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

{!! Toastr::message() !!}

<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
              toastr.error('{{ $error }}','Error',{
                  closeButton:true,
                  progressBar:true,
               });
        @endforeach
    @endif
</script>

<script>
   @if(Session::has('message'))
   var type = "{{ Session::get('alert-type','info') }}"
   switch(type){
      case 'info':
      toastr.info(" {{ Session::get('message') }} ");
      break;
      case 'success':
      toastr.success(" {{ Session::get('message') }} ");
      break;
      case 'warning':
      toastr.warning(" {{ Session::get('message') }} ");
      break;
      case 'error':
      toastr.error(" {{ Session::get('message') }} ");
      break; 
 }
 @endif 

</script>




</body>

</html>