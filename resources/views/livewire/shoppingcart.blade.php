<div>
   <h4>Your shopping cart contains: {{Cart::count()}}<span> Products</span></h4>
   <div class="d-flex flex-wrap">
   <div class ="w-70 overflow-scroll">
       <!--cart design-->
       <!--cart design-->
       @if(Cart::count() > 0)
   @foreach (Cart::content() as $item)
       <div class="cart-item">
    <div class="item-image">
         @php
         $images = explode(',',$item->model->image);
          @endphp
        <img src="{{ asset('public/public/images/'. $images[0]) }}" alt="cart image">
    </div>
    <div class="item-details">
        <h2>{{$item->model->title}}</h2>
        <p>Hodie-B</p>
        <p>Color: Blue</p>
        <div class="item-actions">
            <button class="btn-remove" wire:click.prevent="destory('{{$item->rowId}}')">🗑️ Remove Item</button>
           
        </div>
    </div>
    <div class="item-quantity-price">
        <div class="quantity-controls">
            <button wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-</button>
            <span>{{$item->qty}}</span>
            <button wire:click.prevent="increaseQuantity('{{$item->rowId}}')">+</button>
        </div>
        <p class="cartprice">{{$item->subtotal()}} AED</p>
    </div>
</div>

        @endforeach
        @else
   <p>No Cart Item Found</p>
   @endif
       <!--cart design-->
       <!--cart design-->
<!--   <table class="timetable_sub">-->
<!--      <thead>-->
<!--          <tr>-->
<!--              <th>SL No.</th>-->
<!--              <th>Product</th>-->
<!--              <th>Quality</th>-->
<!--              <th>Product Name</th>-->

<!--              <th>Price</th>-->
<!--              <th>Remove</th>-->
<!--          </tr>-->
<!--      </thead>-->
<!--      <tbody>-->
<!--         @if(Cart::count() > 0)-->
<!--   @foreach (Cart::content() as $item)-->
<!--   <tr class="rem1">-->
<!--      <td class="invert">1</td>-->
<!--      <td class="invert-image"><a href="single.html"><img src="{{asset($item->model->image)}}" alt=" " class="img-responsive"></a></td>-->
<!--      <td class="invert">-->
<!--          <div class="quantity"> -->
<!--            <div class="quantity-select">-->
<!--               <a href="javascript:void(0)" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-->
<!--                 <div class="entry value-minus">&nbsp;</div>-->
<!--               </a>               -->
<!--               <div class="entry value"><span>{{$item->qty}}</span></div>-->
<!--               <a href="javascript:void(0)" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"> -->
<!--               <div class="entry value-plus active">&nbsp;</div></a>-->
<!--            </div>-->
<!--         </div>-->
<!--      </td>-->
<!--      <td class="invert">{{$item->model->title}}</td>-->
      
<!--      <td class="invert">{{$item->subtotal()}} AED</td>-->
<!--      <td class="invert">-->
<!--         <div class="rem">-->
<!--            <a href="javascript:void(0);" wire:click.prevent="destory('{{$item->rowId}}')"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>-->
<!--         </div>-->

<!--      </td>-->
<!--   </tr>-->
<!--   @endforeach-->
<!--   <tr class="rem1">-->
<!--      <td class="invert" colspan="4">Sub Total</td>-->
<!--      <td class="invert" colspan="4">{{Cart::subtotal()}}</td>-->
<!--   </tr>-->
<!--   @else-->
<!--   <p>No Cart Item Found</p>-->
<!--   @endif-->
<!--</tbody>-->
<!--</table>-->
</div>


<!---728x90--->
<div class="checkout-left w-30">
    <div class=" checkout-left-basket">
        <a href="{{route('products_page')}}"><h4>Continue to basket</h4></a>
        <ul>

            <li>Total Amount <i>:-</i> <span>{{Cart::subtotal()}} AED</span></li>


        </ul>
    </div>
    <div class="checkout-right-basket">
         <a href="javascript:void(0);" wire:click="cashcheckout" class="mb-1">Cash on Delivery <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
         <a href="javascript:void(0);" wire:click="checkout">Payment By Card <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
     </div>
</div>
</div>
        <!-- modal -->
        

    
</div>