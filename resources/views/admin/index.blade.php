@extends('../admin/layout/main')
  


@section('content')
    

      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            

  <!-- New Visitors & Activity -->
  <div class="col-12 mb-4">
    <div class="card">
      <div class="card-body row g-4">
        <div class="col-md-6 pe-md-4 card-separator">
          <a href="{{route('category')}}">
          <div class="card-title d-flex align-items-start justify-content-between">
            <h5 class="mb-0">Total Category</h5>
            <small>Available</small>
          </div>
          <div class="d-flex justify-content-between">
            <div class="mt-auto">
              <h2 class="mb-2">{{$allcategory}}</h2>
              {{-- <small class="text-danger text-nowrap fw-medium"><i class='bx bx-down-arrow-alt'></i> -13.24%</small> --}}
            </div>
            <div id="visitorsChart"></div>
          </div>
        </a>
        </div>
        <div class="col-md-6 ps-md-4">
          <a href="{{route('subcategory')}}">
          <div class="card-title d-flex align-items-start justify-content-between">
            <h5 class="mb-0">Total Sub Category</h5>
            <small>Available Sub Category</small>
          </div>
          <div class="d-flex justify-content-between">
            <div class="mt-auto">
              <h2 class="mb-2">{{$allsubcategory}}</h2>
              {{-- <small class="text-success text-nowrap fw-medium"><i class='bx bx-up-arrow-alt'></i> 24.8%</small> --}}
            </div>
            <div id="activityChart"></div>
          </div>
        </a>
        </div>
      </div>
    </div>
  </div>
  <!--/ New Visitors & Activity -->  

          <!-- / Content -->

            <!-- New Visitors & Activity -->
  <div class="col-12 mb-4">
    <div class="card bg-dark text-white">
      <div class="card-body row g-4">
        <div class="col-md-4 pe-md-4 card-separator px-2">
         <a href="{{route('user')}}">
          <div class="card-title d-flex align-items-start justify-content-between">
            <h5 class="mb-0 text-white">Total Customers</h5>
            <small>Available</small>
          </div>
          <div class="d-flex justify-content-between">
            <div class="mt-auto">
              <h2 class="mb-2 text-white">{{$allcustomer}}</h2>
              {{-- <small class="text-danger text-nowrap fw-medium"><i class='bx bx-down-arrow-alt'></i> -13.24%</small> --}}
            </div>
            <div id="visitorsChart"></div>
          </div>
        </a>
        </div>
        <div class="col-md-4 ps-md-4 card-separator">
          <a href="{{route('sub_order')}}">
          <div class="card-title d-flex align-items-start justify-content-between">
            <h5 class="mb-0 text-white">Sub Orders</h5>
            <small>Available Sub Orders</small>
          </div>
          <div class="d-flex justify-content-between">
            <div class="mt-auto">
              <h2 class="mb-2 text-white">{{$allsuborder}}</h2>
              {{-- <small class="text-success text-nowrap fw-medium"><i class='bx bx-up-arrow-alt'></i> 24.8%</small> --}}
            </div>
            <div id="activityChart"></div>
          </div>
        </a>
        </div>
        <div class="col-md-4 ps-md-4">
          <a href="{{route('view_contact')}}">
          <div class="card-title d-flex align-items-start justify-content-between">
            <h5 class="mb-0 text-white">Contacts</h5>
            <small>Available Contacts</small>
          </div>
          <div class="d-flex justify-content-between">
            <div class="mt-auto">
              <h2 class="mb-2 text-white">{{$allcontacts}}</h2>
              {{-- <small class="text-success text-nowrap fw-medium"><i class='bx bx-up-arrow-alt'></i> 24.8%</small> --}}
            </div>
            <div id="activityChart"></div>
          </div>
        </a>
        </div>
        
      </div>
    </div>
  </div>
  <!--/ New Visitors & Activity -->


        


<div class="row">
 
  <!-- New Visitors & Activity -->
  <div class="col-lg-8 mb-4">
    <div class="card">
      <div class="card-body row g-4">
        <a href="{{route('products')}}">
        <div class="col-md-6 pe-md-4 card-separator">
          <div class="card-title d-flex align-items-start justify-content-between">
            <h5 class="mb-0">Total Products</h5>
            <small>Available</small>
          </div>
          <div class="d-flex justify-content-between">
            <div class="mt-auto">
              <h2 class="mb-2">{{$allproducts}}</h2>
              {{-- <small class="text-danger text-nowrap fw-medium"><i class='bx bx-down-arrow-alt'></i> -13.24%</small> --}}
            </div>
            <div id="visitorsChart"></div>
          </div>
        </a>
        </div>
        <div class="col-md-6 ps-md-4">
          <a href="{{route('orderview')}}">
          <div class="card-title d-flex align-items-start justify-content-between">
            <h5 class="mb-0">Orders</h5>
            <small>Available Orders</small>
          </div>
          <div class="d-flex justify-content-between">
            <div class="mt-auto">
              <h2 class="mb-2">{{$allorders}}</h2>
              {{-- <small class="text-success text-nowrap fw-medium"><i class='bx bx-up-arrow-alt'></i> 24.8%</small> --}}
            </div>
            <div id="activityChart"></div>
          </div>
        </a>
        </div>
      </div>
    </div>
  </div>
  <!--/ New Visitors & Activity -->

          </div>
  

  <!-- Core JS -->
 

  @endsection