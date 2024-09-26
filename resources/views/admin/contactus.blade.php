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


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">
            
            

<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">DeliDave /</span> Contact Us List
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
            <th>NAME</th>
            <th>PHONE_NO</th>
            <th>EMAIL</th>
            <th>SUBJECT</th>
            <th>MESSAGE</th>
            <th>STATUS</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($show as $key=> $view)
          <tr>
            <td>{{$key}}</td>
            <td>{{$view->name}}</td>
            <td>{{$view->phone}}</td>
            <td>{{$view->email}}</td>
            <td>{{$view->subject}}</td>
            <td>
    @php
        $words = explode(' ', $view->message);
        $shortText = implode(' ', array_slice($words, 0, 10));
        $isLongText = count($words) > 10;
    @endphp

    <span class="description">
        @if ($isLongText)
            <span class="short-text">{{ $shortText }}...</span>
            <span class="full-text" style="display: none;">{{ $view->message }}</span>
            <a href="javascript:void(0);" class="toggle-link" onclick="toggleDescription(this)">See More</a>
        @else
            {{ $view->message }}
        @endif
    </span>
</td>
            <td>{{$view->status}}</td>
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


          </div>
          <!-- / Content -->




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







@endsection