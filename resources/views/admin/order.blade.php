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
  <span class="text-muted fw-light">DeliDave /</span> Order List
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
            <!-- <th>USER_ID</th> -->
            <th>NAME</th>
            <th>MOBILE_NO</th>
            <th>LOCATION</th>
            <th>CITY</th>
            <th>ADDRESS_TYPE</th>
            <th>AMOUNT</th>
            <th>Payment Type</th>
            <th>STATUS</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($show as $key=> $view)
          <tr>
            @if ($view->status == 'pending')
                
            <input type="hidden" id="pandingcheck" value="{{$view->id}}">
            @endif
            <td>{{$view->id}}</td>
            <!-- <td>{{$view->user_id}}</td> -->
            <td>{{$view->full_name}}</td>
            <td>{{$view->mobile_no}}</td>
            <td>{{$view->location}}</td>
            <td>{{$view->city}}</td>
            <td>{{$view->address_type}}</td>
            <td>{{$view->total_amount}}</td>
            <td>{{$view->paymenttype}}</td>

            <td>
                {{$view->status}}
              </td>
           
          
            <td class="">
              @if ($view->status == 'Ready')
              <a href="{{route('orderlistview',$view->id)}}" type="button" class="btn text-primary"> <i class="fa fa-eye"></i> </a> 

              <a href="{{route('deleteorder',$view->id)}}" type="button" class="btn text-danger my-1"> <i class="fa fa-trash"></i> </a> 
              @else

              <a href="{{route('confirmOrder',$view->id)}}" type="button" class="btn text-success"> <i class="fa fa-check"></i> </a> 
              <a href="{{route('orderlistview',$view->id)}}" type="button" class="btn text-primary"> <i class="fa fa-eye"></i> </a> 

              <a href="{{route('deleteorder',$view->id)}}" type="button" class="btn text-danger my-1"> <i class="fa fa-trash"></i> </a> 
              @endif
            

                                              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>


          </div>
          <!-- / Content -->


          <audio src="{{asset('asset2/images/audio1.wav')}}" type="audio/wav" controls id="audiosound" allow="autoplay" style="display: none;"> </audio>

{{-- <button onclick="play()">audio</button> --}}





@endsection
@section('script')
          <script>
          $(document).ready(function() {
            var record = document.getElementById('pandingcheck').value;
            console.log(record);
            if (record) { 
            var audio = document.getElementById('audiosound');
            audio.play();
            }
            setTimeout(function() {
            location.reload(); // This will reload the page
        }, 60000);

});
        </script>

@endsection

