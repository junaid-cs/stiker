<div>
  @foreach($products as $product)
  @if($loop->iteration > 12)
  @break
@endif
@if($product->status == 'In Stock')
@if($product->discount_percentage > 0)


				<div class="col-md-3 top_brand_left scale-in" wire:ignore>
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<!--<div class="tag"><img src="{{asset('../asset2/images/tag.png')}}" alt=" " class="img-responsive" /></div>-->
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="{{route('detail_page',$product->id)}}">
											         @php
                                                    $images = explode(',',$product->image);
                                                @endphp
											    <img title=" " alt=" " src="{{ asset('public/public/images/'. $images[0]) }}" /></a>		
										<div class="card_bottom">
											<h4>{{$product->discountprice}} AED<span>${{$product->price}}</span></h4>
											<p>{{$product->name	}}</p>
										
										<div class="snipcart-details top_brand_home_details">
										
											
											<a href="javascript:void(0)" type="button" class="button" data-bs-toggle="modal" data-bs-target="#addmodel" wire:click="storecart({{$product->id}}, '{{$product->name}}', {{$product->discountprice}})">Add to cart</a>	
											
									
										</div>
											</div>
										</div>
										
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				 
@endif
@endif
				@endforeach
</div>
