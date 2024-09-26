
@extends('../admin/layout/main')
  


@section('content')

<style>
    table td, table th {
        padding: 0 10px !important;
        font-size: 14px;
    }
    table th{
        color:black;
        font-weight: 600;
    }
</style>
   <!-- Edit Modal -->
   <div class="modal fade" id="addmodel" tabindex="-1"
   aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="formAccountSettings" action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="name" class="form-label">Product Name</label>
                      <input class="form-control" type="text"
                          name="name" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="title" class="form-label">Title</label>
                      <input class="form-control" type="text"
                          name="title" autofocus />
                  </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="category" class="form-label">Category</label>
                      <select  class="form-control"
                          name="category" autofocus onchange="fatchsubcat(this.value)">
                        <option value="">Select</option>
                        @foreach($category as $cat)
                        <option value="{{$cat->name}}">{{$cat->name}}</option>
                        @endforeach
                        </select>
                      
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="subcategory" class="form-label">Sub Category</label>
                      <select name="subcategory" id="subcatdiv" class="form-control" autofocus></select>
                     
                  </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="price" class="form-label">Actual Price</label>
                      <input class="form-control" type="text"
                          name="price" id="productprice" autofocus onkeyup="pricecal()" />
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="discount_in_per" class="form-label">Discount In Per</label>
                    <input class="form-control" type="text"
                        name="discount_in_per" id="discount" autofocus onkeyup="pricecal()"/>
                </div>
            </div>
            <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="discountprice" class="form-label">Discounted Price</label>
                      <input class="form-control" type="text"
                          name="discountprice" id="netprice" autofocus disabled />
                  </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="image" class="form-label">Image</label>
                      <input class="form-control" type="file"
                          name="image[]" autofocus multiple />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="status" class="form-label">Status</label>
                      <select name="status" class="form-control" id="">
                        <option value="In Stock">In Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                      </select>
                      {{-- <input class="form-control" type="text"
                          name="status" autofocus /> --}}
                  </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-12">
                      <label for="description" class="form-label">Description</label>
                      <textarea name="description" id="" cols="30" rows="7" class="form-control" autofocus></textarea>
                     
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


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            

<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">DeliDave /</span> Product List
</h4>
<div class="d-flex justify-content-end">
  <button type="button" class="btn text-white my-4 mx-4" data-bs-toggle="modal" data-bs-target="#addmodel" style="background-color:green;">
    Add Product
  </button>
</div>
<div class="app-ecommerce-category">
  
  <!-- Category List Table and from -->
    <div class="card-datatable table-responsive">
      <table class="fs-6 table">
        <thead>
          <tr>
            
            <th>ID</th>
            <!-- <th>NAME</th> -->
            <th>TITLE</th>
            <th>CATEGORY</th>
            <th>SUB_CATEGORY</th>
            <th>PRICE</th>
            <th>DISCOUNT_PRICE</th>
            <th>DESCRIPTION</th>
            <th>STATUS</th>
            <th>IMAGE</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($show as $view)
          <tr>
            <td>{{$view->id}}</td>
            <!-- <td>{{$view->name}}</td> -->
            <td>{{$view->title}}</td>
            <td>{{$view->category}}</td>
            <td>{{$view->subcategory}}</td>
            <td>{{$view->price}} AED</td>
            <td>{{$view->discountprice}} AED</td>
            <td>
    @php
        $words = explode(' ', $view->description);
        $shortText = implode(' ', array_slice($words, 0, 10));
        $isLongText = count($words) > 10;
    @endphp

    <span class="description">
        @if ($isLongText)
            <span class="short-text">{{ $shortText }}...</span>
            <span class="full-text" style="display: none;">{{ $view->description }}</span>
            <a href="javascript:void(0);" class="toggle-link" onclick="toggleDescription(this)">See More</a>
        @else
            {{ $view->description }}
        @endif
    </span>
</td>
            <td>{{$view->status}}</td>

            <td>
                @php
                $images = explode(',',$view->image);
            @endphp
               @if(count($images) > 0)
                <img src="{{asset('public/public/images/'. $images[0])}}" alt="" style="width:80px; height:80px;">
                @endif
            </td>
          
            <td class="">
                <button type="button" class="btn text-primary" data-bs-toggle="modal"
             data-bs-target="#exampleModal" onclick="edit({{$view->id}})"> <i class="fa fa-edit"></i> </button>
             <a href="{{route('deleteproduct',$view->id)}}" type="button" class="btn text-danger my-1"> <i class="fa fa-trash"></i> </a>

                                              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1"
 aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog"> <div class="modal-content">
         <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Admin</h1>
    <button type="button" class="btn-close"
             data-bs-dismiss="modal" aria-label="Close"></button> </div>
            <div class="modal-body">
            <form id="formAccountSettings" action="{{route('updateproduct')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="name" class="form-label">Name</label>
                      <input class="form-control" type="text"
                          name="name" id="name" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="title" class="form-label">Title</label>
                      <input class="form-control" type="text"
                          name="title" id="title" autofocus />
                  </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="category" class="form-label">Category</label>
                      <select  class="form-control"
                          name="category" autofocus  id="category" onclick="fatchupdatesubcat(this.value)" >
                        <option value="">Select</option>
                        @foreach($category as $cat)
                        <option value="{{$cat->name}}">{{$cat->name}}</option>
                        @endforeach
                        </select>
                      
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="subcategory" class="form-label">Sub Category</label>
                      <select name="subcategory" id="subcategory"  class="form-control" autofocus>
                       

                      </select>
                     
                  </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="price" class="form-label">Price</label>
                      <input class="form-control" type="text"
                          name="price" id="price" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="discountprice" class="form-label">Discount Price</label>
                      <input class="form-control" type="text"
                          name="discountprice" id="discountprice" autofocus/>
                  </div>
              </div>
              <div class="row my-2">
              <div id="image-container">
               
            </div>
        </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="image" class="form-label">Image</label>
                     
                      <input class="form-control" type="file"
                          name="image[]" autofocus multiple />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="status" class="form-label">Status</label>
                      <select name="status" class="form-control" id="status">
                        <option value="In Stock">In Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                      </select>
                      {{-- <input class="form-control" type="text"
                          name="status"  id="status" autofocus /> --}}
                  </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-12">
                      <label for="description" class="form-label">Description</label>
                      <textarea name="description" id="description" cols="30" rows="7" class="form-control" id="description" autofocus></textarea>
                     
                  </div>
                 
              </div>
              <div class="mt-2">
                  <button type="submit" class="btn btn-success me-2" style="background-color:green;">Save changes</button>
                  <button type="reset" class="btn btn-label-secondary">Cancel</button>
              </div>
          </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <!-- <button type="button" class="btn btn-primary">Save
                                                                    changes</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
  <!-- Offcanvas to add new customer -->

</div>

          </div>
          <!-- / Content -->


@endsection

@section('script')
<script>
    function toggleDescription(element) {
        const shortText = element.previousElementSibling.previousElementSibling;
        const fullText = element.previousElementSibling;
        
        if (shortText.style.display === "none") {
            shortText.style.display = "inline";
            fullText.style.display = "none";
            element.textContent = "See More";
        } else {
            shortText.style.display = "none";
            fullText.style.display = "inline";
            element.textContent = "See Less";
        }
    }
</script>

<script>

function edit(id){
    $.ajax({
 type:'get',
 url:'editproduct/'+id,

 success:function(response){
    
   $('#subcategory').html(response.html);

  $('#id').val(id);
  $('#name').val(response.show.name);
   $('#title').val(response.show.title);
   $('#category').val(response.show.category);
   $('#subcategory').val(response.show.subcategory);
   $('#price').val(response.show.price);
   $('#discountprice').val(response.show.discountprice);
   $('#description').val(response.show.description);
   $('#status').val(response.show.status);
   $('#image-container').empty();

response.images.forEach(function(image) {
        var imgElement = '<img src="' + '{{ asset("public/public/images/") }}/' + image + '" alt="" style="width:100px; height:100px; margin-right: 10px;">';
        $('#image-container').append(imgElement);
    });

}

});
 }  

 function fatchsubcat(cat){
    $.ajax({
 type:'get',
 url:'fatchsubcat/'+cat,

 success:function(response){
    console.log(response);
 $('#subcatdiv').html(response);

}

});
 } 
 
 function fatchupdatesubcat(cat){
    $.ajax({
 type:'get',
 url:'fatchsubcat/'+cat,

 success:function(response){
    console.log(response);
 $('#subcategory').html(response);

}

});
 } 

 function pricecal(){
    var price = parseFloat($('#productprice').val());
    var discount = parseFloat($('#discount').val());

    var totalprice = price - (price * (discount / 100));
    $('#netprice').val(totalprice);
}




     @if(Session::has('status'))
    toastr.success("{{ Session::get('status') }}")
@endif
</script>



@endsection