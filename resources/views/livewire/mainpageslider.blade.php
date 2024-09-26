<div>
    <div class="flexslidersmall carousel" wire:ignore>
    <ul class="slides" >
        @foreach($products as $product)
        @if($product->status == 'In Stock')
  @if($product->discount_percentage < 1)


    <li>
        <a href="{{route('detail_page',$product->id)}}"> 
          @php
          $images = explode(',',$product->image);
      @endphp
          <img src="{{asset('public/public/images/'. $images[0])}}" class="img-fluid" width="130px"></a>		
    <div class="d-flex justify-content-between">
      <div class="title">
          {{$product->name	}}</div>
      <div class="Price">{{$product->discountprice}} AED</div>
    </div><div class="btn btn-primary" wire:click="storecart({{$product->id}}, '{{$product->name}}', {{$product->discountprice}})">Add to Cart</div>
    
    </li>
    @endif
    @endif
    	@endforeach
    <!-- items mirrored twice, total of 12 -->
  </ul>
</div>
</div>
