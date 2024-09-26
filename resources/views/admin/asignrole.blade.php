
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
  <span class="text-muted fw-light">DeliDave /</span> Assign Permissions
</h4>
<div class="d-flex">
    @foreach ($role->permissions as $item)
        
    <span class="bg-info text-white px-2 py-2 mx-2">{{$item->name}} <a href="{{route('deleteassignpermission',['id' => $item->name, 'role_id' => $role->id])}}"><i class="menu-icon tf-icons bx bx-x-circle text-white"></i>
    </a></span>
    @endforeach
</div>
<div class="app-ecommerce-category">
  
  <!-- Category List Table and from -->
    <div class="card-datatable table-responsive bg-white mt-5">
        <div class="container">
            <h2 class="px-4 py-4">Available Permissions</h2>
            <form action="{{route('storerolepermissions')}}" method="POST">
     @csrf
     <input type="hidden" name="roleid" value="{{$role->id}}">
                @foreach ($permission as $key => $item)
                <div class="form-group">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="option{{$key}}" name="permission[]" value="{{$item->name}}">
                      <label class="form-check-label" for="option{{$key}}">{{$item->name}}</label>
                    </div>
                  </div>
                  @endforeach
            
              
             
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          
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