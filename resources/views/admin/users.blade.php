
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="formAccountSettings" action="{{route('storeuser')}}" method="POST" >
                @csrf
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="name" class="form-label">Name</label>
                      <input class="form-control" type="text"
                          name="name" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="email" class="form-label">Email</label>
                      <input class="form-control" type="email"
                          name="email" autofocus />
                  </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="password" class="form-label">Password</label>
                      <input class="form-control" type="password"
                          name="password" autofocus />
                  </div>
                 
              </div>
              <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Save changes</button>
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
  <span class="text-muted fw-light">DeliDave /</span> User List
</h4>
<div class="d-flex justify-content-end">
  <button type="button" class="btn text-white my-4 mx-4" data-bs-toggle="modal" data-bs-target="#addmodel" style="background-color:green;">
    Add User
  </button>
</div>
<div class="app-ecommerce-category">
  
  <!-- Category List Table and from -->
    <div class="card-datatable table-responsive">
      <table class="datatables-category-list table border-top">
        <thead>
          <tr>
            
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL &nbsp;</th>
            <th class="text-wrap ">PASSWORD</th>

            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($show as $view)
          <tr>
            <td>{{$view->id}}</td>
            <td>{{$view->name}}</td>
            <td>{{$view->email}}</td>
            <td>{{$view->password}}</td>
          
            <td class="">
                <button type="button" class="btn text-primary" data-bs-toggle="modal"
             data-bs-target="#exampleModal" onclick="edit({{$view->id}})"> <i class="fa fa-edit"></i> </button>
             <a href="{{route('deleteuser',$view->id)}}" type="button" class="btn text-danger my-1"> <i class="fa fa-trash"></i> </a>

                                              
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
         <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit User</h1>
    <button type="button" class="btn-close"
             data-bs-dismiss="modal" aria-label="Close"></button> </div>
            <div class="modal-body">
            <form id="formAccountSettings" action="{{route('updateuser')}}" method="POST" >
                @csrf
                <input type="hidden" name="id" id="id">
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="name" class="form-label">Name</label>
                      <input class="form-control" type="text" id="name"
                          name="name" autofocus />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label for="email" class="form-label">Email</label>
                      <input class="form-control" type="email"
                      id="email" name="email" autofocus />
                  </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="password" class="form-label">Password</label>
                      <input class="form-control" type="password"
                      id="password" name="password" autofocus />
                  </div>
                 
              </div>
              <div class="mt-2">
                  <button type="submit" class="btn me-2 text-white" style="background-color:green;">Save changes</button>
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
 url:'edituser/'+id,

 success:function(response){
  $('#id').val(id);
   $('#name').val(response.show.name);
   $('#email').val(response.show.email);
   $('#password').val(response.show.pass);
 

}

});
 }  




     @if(Session::has('status'))
    toastr.success("{{ Session::get('status') }}")
@endif
</script>



@endsection