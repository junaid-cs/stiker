<div>
    <div class="d-flex box-container justify-content-evenly mt-4">
        <div class="d-flex flex-wrap">
        @foreach ($subcategory as $side_items)
        <div class="item mr-1">
                            <div class="top-category-single">
                                <a href="#products" wire:click="subcategory({{ $side_items->id }})">
                                    <div class="cat-icon">
                                        
                                        <img src="{{asset($side_items->image)}}" alt="" width="42" height="42">
                                    </div>
                                    <span>{{$side_items->subcategory}}</span>
                                </a>
                            </div>
                            </div>
        @endforeach
        </div>
    </div>
    <div class="w3ls_w3l_banner_nav_right_grid mt-4 " id="products">
        <h3 id="brands">Popular Brands</h3>
      
        @foreach ($product as $all_products)
            <div class="w3ls_w3l_banner_nav_right_grid1" >
                <h6>{{ @$all_products->name }}</h6>
                  <h6>{{ @$all_products->subcategory }}</h6>
                @foreach ($all_products->products as $products)
                    <div class="col-md-3 w3ls_w3l_banner_left
                    ">
                    <!--scale-in-->
                          <div class="hover14 column">
                            <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                               
                                  
                                
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block">
                                            <div class="snipcart-thumb">
                                                <a href="{{route('detail_page',$products->id)}}">
                                                    @php
                                                    $images = explode(',',$products->image);
                                                @endphp
                                                    <img
                                                        src="{{ asset('public/public/images/'. $images[0]) }}" alt=" "
                                                        class="img-responsive" /></a>
                                                        <div class="card_bottom">
                                                        <h4>{{ $products->discountprice }} AED<span>${{ $products->price }}</span>
                                                <p>{{ $products->name }}</p>
                                                </h4>
                                         
                                            <div class="snipcart-details">
                                                <a href="javascript:void(0)" type="button" class="button" data-bs-toggle="modal" data-bs-target="#addmodel" wire:click="storecart({{$products->id}}, '{{$products->name}}', {{$products->discountprice}})">Add to cart</a>	
                                            </div>
                                            </div>
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
    <div>{{ $product->links() }}</div>
</div>
				<script>document.addEventListener('DOMContentLoaded', function () {
    function handleScroll() {
        const scaleIns = document.querySelectorAll('.scale-in');
        scaleIns.forEach(element => {
            const rect = element.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                element.classList.add('visible');
            }
        });
    }

    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Trigger the function initially to check if elements are in view on page load
});

</script>
