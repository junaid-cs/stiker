<div>
<div class="col-md-6" wire:ignore>
    <div id="slider" class="owl-carousel product-slider img-slider">
        @foreach (explode(',',$product->image) as $item)
        <div class="item">
            
              <img src="{{asset('public/public/images/'. $item)}}" />
        </div>
     
        @endforeach
    
        
    </div>
    <div id="thumb" class="owl-carousel product-thumb mt-1">
        @foreach (explode(',',$product->image) as $item)
            
        <div class="item">
              <img src="{{asset('public/public/images/'. $item)}}" />
        </div>
        @endforeach
    </div>
</div>
<div class="col-md-6" wire:ignore>
    <div class="product-dtl">
        <div class="product-info">
            <div class="product-name">Variable Product</div>
            <div class="reviews-counter">
                <div class="rate">
                    <?php
                    for ($i = $rating + 1; $i <= 5; $i++) : ?>
                        <label for="rating<?= $i ?>" title="<?= $i ?> stars" style="color: #ccc;">&#9733;</label>
                        <?php endfor;
                        for ($i = 1; $i <= $rating; $i++) : ?>
                            <label for="rating<?= $i ?>" title="<?= $i ?> stars" style="color: #ffd700;">&#9733;</label>
                        <?php endfor;
                    ?>
                    
                    
                </div>  
                <span class="average-rating"><?= round($rating, 2) ?>/{{$countrating}}</span>
            </div>
            <div class="product-price-discount"><span>AED {{$product->discountprice}}</span><span class="line-through">AED {{$product->price}}</span></div>
        </div>
        <p>{{$product->title}}</p>
        <div class="product-count">
            <label for="size">Quantity</label>
            <form action="#" class="display-flex">
                <div class="qtyminus">-</div>
                <input type="text" name="quantity" wire:model="quantity" class="qty">
                <div class="qtyplus">+</div>
            </form>
            <a href="#" class="round-black-btn" wire:click="storecart({{$product->id}}, '{{$product->name}}', {{$product->discountprice}})">Add to Cart</a>
        </div>
    </div>
</div>
</div>
</div>
<div class="product-info-tabs">
<ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews ({{$countrating}})</a>
      </li>
</ul>
<div class="tab-content" id="myTabContent">
      <div class="tab-pane  show active" id="description" role="tabpanel" aria-labelledby="description-tab">
         {{$product->description}}
      </div>
      <div class="tab-pane " id="review" role="tabpanel" aria-labelledby="review-tab">
          <div class="review-heading">REVIEWS</div>
          <div class="row">
            @if ($allrating->count() > 0)
            @foreach ($allrating as $item)
                <div class="d-flex" style="gap:17px; margin:14px 0">
                
                    <img src="{{asset('../asset2/images/user.png')}}" width="50px" height="50px" alt="">
                  
                    <div>
                    <h4>{{$item->users->name}}</h4>
                    <?php
                        for ($i = 1; $i <= $item->rating; $i++) : ?>
                            <label for="rating<?= $i ?>" title="<?= $i ?> stars" style="color: #ffd700;">&#9733;</label>
                        <?php endfor;
                    for ($i = $item->rating + 1; $i <= 5; $i++) : ?>
                        <label for="rating<?= $i ?>" title="<?= $i ?> stars" style="color: #ccc;">&#9733;</label>
                        <?php endfor;
                    ?>
                    <p>
                        {{$item->review}}
                    </p>
                    </div>
                </div>
            @endforeach
            @else
            <p class="mb-20">There are no reviews yet.</p>
            @endif
        </div>
        
         
          {{-- <form class="review-form" action="{{route('rating')}}" method="POST">
            @csrf
            <input type="hidden" name="productid" value="{{$product->id}}">
            <div class="form-group">
                <label>Your rating</label>
                <div class="reviews-counter">
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5"/>
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4"  />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3"  />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                  </div>
                <span>Reviews</span>
            </div>
                
            </div>
            <div class="form-group">
                <label>Your message</label>
                <textarea class="form-control" name="review" rows="10" required></textarea>
            </div>
            @if (Auth::user())
                
            <button class="round-black-btn">Submit Review</button>
            @else
            <button type="button" class="round-black-btn" data-toggle="modal" data-target="#loginModal">Submit Review</button>

            @endif
        </form> --}}
       
       
      </div>
</div>
</div>
<!-- //banner -->
<!-- brands -->
<!---728x90--->

<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
<div class="container">
<h3>Related Offers</h3>
@foreach($relatedproducts as $relatedproduct)
    <div class="w3ls_w3l_banner_nav_right_grid1">
        <h6>{{$relatedproduct->name}}</h6>
        @foreach($relatedproduct->products as $list_products)
        <div class="col-md-3 w3ls_w3l_banner_left">
            <div class="hover14 column">
            <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                <!--<div class="agile_top_brand_left_grid_pos">-->
                <!--    <img src="{{asset('../asset2/images/offer.png')}}" alt=" " class="img-responsive" />-->
                <!--</div>-->
                <div class="agile_top_brand_left_grid1">
                    <figure>
                        <div class="snipcart-item block">
                            <div class="snipcart-thumb">
                                <a href="{{route('detail_page',$list_products->id)}}">
                                    @php
                                    $images = explode(',',$list_products->image);
                                @endphp
                                    <img src="{{ asset('public/public/images/'. $images[0]) }}" alt=" " class="img-responsive" />
                                </a>
                                <p>{{$list_products->name}}</p>
                                <h4>${{$list_products->discountprice}} <span>${{$list_products->price}}</span></h4>
                            </div>
                          
                        </div>
                    </figure>
                </div>
            </div>
            </div>
        </div>
        @endforeach

        <div class="clearfix"> </div>
    </div>
    @endforeach

</div>
<!---728x90--->
</div>

<script>
    
</script>