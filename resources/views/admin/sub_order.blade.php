@extends('../admin/layout/main')
  


@section('content')




      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            

<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">DeliDave /</span>Sub Order List
</h4>
<div class="d-flex justify-content-end">

</div>
<div class="app-ecommerce-category">
  
  <!-- Category List Table and from -->
    <div class="card-datatable table-responsive">
      <table class="datatables-category-list table border-top">
        <thead>
          <tr>
            
            <th>ID</th>
            <th>USER_ID</th>
            <th>ORDER_ID</th>
            <th>PRODUCT_ID</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
            <th>STATUS</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($show as $key=> $view)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$view->user_id}}</td>
            <td>{{$view->order_id}}</td>
            <td>{{$view->product_id}}</td>
            <td>{{$view->price}}</td>
            <td>{{$view->qty}}</td>
            <td>{{$view->total}}</td>
            <td>{{$view->status}}</td>  
            <td class="">
              <a href="{{route('confirmsuborder',$view->id)}}" type="button" class="btn btn-primary"> Confirm </a> 
             <a href="{{route('deletesub_order',$view->id)}}" type="button" class="btn btn-danger my-1"> Delete </a>

                                              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>


          </div>
          <!-- / Content -->

   <!-- Edit Modal -->
   <div class="modal fade" id="addmodel" tabindex="-1"
   aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Sub Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="formAccountSettings" action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" >
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="name" class="form-label">User_id</label>
                      <input class="form-control" type="text"
                          name="user_id" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="title" class="form-label">Order_id</label>
                      <input class="form-control" type="text"
                          name="order_id" autofocus />
                  </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="category" class="form-label">Product_id</label>
                      <input class="form-control" type="text"
                      name="product_id" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="subcategory" class="form-label">Price</label>
                      <input class="form-control" type="text"
                      name="price" autofocus />
                  </div>
              </div>
              <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="category" class="form-label">Qty</label>
                    <input class="form-control" type="text"
                    name="qty" autofocus />
                </div>
                <div class="mb-3 col-md-6">
                    <label for="subcategory" class="form-label">Total</label>
                    <input class="form-control" type="text"
                    name="total" autofocus />
                </div>
            </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="price" class="form-label">STatus</label>
                      <select name="subcategory" id="subcatdiv" class="form-control" autofocus></select>
                  </div>
                 
            </div>
                
              <div class="mt-2">
                  <button type="submit" class="btn btn-success me-2" style="background-color:green;">Save changes</button>
                  <button type="reset" class="btn btn-label-secondary">Cancel</button>
              </div>
          </form>
                                                            </div>
        <div class="modal-footer"><button type="button" class="btn btn-secondary"
         data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
                    </div>
    </div>
</div>


@endsection