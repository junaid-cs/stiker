
@extends('../admin/layout/main')
  


@section('content')

   <!-- Edit Modal -->
   <div class="modal fade" id="addmodel" tabindex="-1"
   aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Role</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="formAccountSettings" action="{{route('storerole')}}" method="POST" >
                @csrf
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="name" class="form-label">Role</label>
                      <input class="form-control" type="text"
                          name="name" autofocus />
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
  <span class="text-muted fw-light">DeliDave /</span> Roles List
</h4>
<div class="d-flex justify-content-end">
  <button type="button" class="btn text-white my-4 mx-4" data-bs-toggle="modal" data-bs-target="#addmodel" style="background-color:green;">
    Add Role
  </button>
</div>
<div class="app-ecommerce-category">
  
  <!-- Category List Table and from -->
    <div class="card-datatable table-responsive">
      <table class="datatables-category-list table border-top">
        <thead>
          <tr>
            
            <th>ID</th>
            <th>ROLES</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($show as $key=> $view)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$view->name}}</td>
            <td class="">
              <a href="{{route('accesscontrol',$view->id)}}" type="button" class="btn btn-danger my-1"> Access Countrol </a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
             data-bs-target="#exampleModal" onclick="edit({{$view->id}})"> Edit </button>
             <a href="{{route('deleterole',$view->id)}}" type="button" class="btn btn-danger my-1"> Delete </a>

                                              
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
         <h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Role</h1>
    <button type="button" class="btn-close"
             data-bs-dismiss="modal" aria-label="Close"></button> </div>
            <div class="modal-body">
            <form id="formAccountSettings" action="{{route('updaterole')}}" method="POST" >
                @csrf
                <input type="hidden" name="id" id="id">
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="name" class="form-label">Name</label>
                      <input class="form-control" type="text" id="name"
                          name="name" autofocus />
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
 url:'editrole/'+id,

 success:function(response){
  $('#id').val(id);
   $('#name').val(response.show.name);
}

});
 }  




     @if(Session::has('status'))
    toastr.success("{{ Session::get('status') }}")
@endif
</script>



@endsection