
@extends('../admin/layout/main')
  


@section('content')

   <!-- Edit Modal -->
   <div class="modal fade" id="addmodel" tabindex="-1"
   aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Sub Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="formAccountSettings" action="{{route('storesubcategory')}}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="category" class="form-label">Category</label>
                      <select name="category" id="" required class="form-control">
                        <option value="">Select</option>
                        @foreach($category as $cat)
                        <option value="{{$cat->name}}">{{$cat->name}}</option>
                        @endforeach
                      </select>
                      <!-- <input class="form-control" type="text"
                          name="name" autofocus  required/> -->
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="subcategory" class="form-label">Sub Category</label>
                      <input class="form-control" type="text"
                          name="subcategory" autofocus  required/>
                  </div>
              </div>
              <div class="row">
                
                  <div class="mb-3 col-md-6">
                      <label for="image" class="form-label">Image</label>
                      <input class="form-control" type="file"
                          name="image" autofocus required />
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
  <span class="text-muted fw-light">DeliDave /</span> Sub Category List
</h4>
<div class="d-flex justify-content-end">
  <button type="button" class="btn text-white my-4 mx-4" data-bs-toggle="modal" data-bs-target="#addmodel" style="background-color:green;">
    Add Sub Category
  </button>
</div>
<div class="app-ecommerce-category">
  
  <!-- Category List Table and from -->
    <div class="card-datatable table-responsive">
      <table class="datatables-category-list table border-top">
        <thead>
          <tr>
            
            <th>ID</th>
            <th>CATEGORY NAME</th>
            <th>SUB CATEGORY NAME</th>
            <th>IMAGE</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($show as $view)
          <tr>
            <td>{{$view->id}}</td>
            <td>{{$view->category}}</td>
            <td>{{$view->subcategory}}</td>
            <td>
              <img src="{{asset($view->image)}}" alt="" style="width:80px; height:80px;">
            </td>
          
          
            <td class="">
                <button type="button" class="btn text-primary" data-bs-toggle="modal"
             data-bs-target="#exampleModal" onclick="edit({{$view->id}})"> <i class="fa fa-edit"></i> </button>
             <a href="{{route('deletesubcategory',$view->id)}}" type="button" class="btn text-danger my-1"> <i class="fa fa-trash"></i> </a>

                                              
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
            <form id="formAccountSettings" action="{{route('updatesubcategory')}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="id" id="id">
                <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="category" class="form-label">Category</label>
                      <select name="category" id="category" required class="form-control">
                        <option value="">Select</option>
                        @foreach($category as $cat)
                        <option value="{{$cat->name}}">{{$cat->name}}</option>
                        @endforeach
                      </select>
                      <!-- <input class="form-control" type="text"
                          name="name" autofocus  required/> -->
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="subcategory" class="form-label">Sub Category</label>
                      <input class="form-control" type="text"
                          name="subcategory" autofocus id="subcategory"  required/>
                  </div>
              </div>
              <div class="row">
                
                  <div class="mb-3 col-md-6">
                      <label for="image" class="form-label">Image</label>
                      <img src="" alt="" id="image" style="width:100px; height:100px;">
                      <input class="form-control" type="file"
                          name="image" autofocus/>
                  </div>
              </div>
            
              <div class="mt-2">
                  <button type="submit" class="btn text-white me-2" style="background-color:green;">Save changes</button>
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

function edit(id){
    $.ajax({
 type:'get',
 url:'editsubcategory/'+id,

 success:function(response){
  $('#id').val(id);
   $('#category').val(response.show.category);
   $('#subcategory').val(response.show.subcategory);
   document.getElementById('image').src=response.show.image;

}

});
 }  




     @if(Session::has('status'))
    toastr.success("{{ Session::get('status') }}")
@endif
</script>



@endsection