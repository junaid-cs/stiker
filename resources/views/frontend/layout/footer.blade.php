<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="col-md-3 w3_footer_grid">
            <h3>information</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="{{route('home_page')}}">Home</a></li>
                <li><a href="{{route('products_page')}}">Products</a></li>
                <li><a href="{{route('contact_us')}}">Contact Us</a></li>
                <li><a href="{{route('orderslist')}}">Complete Orders</a></li>
                <li><a href="{{route('aboutus')}}">About Us</a></li>
            </ul>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <h3>policy info</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="{{route('Privacy')}}">privacy policy</a></li>
                <li><a href="{{route('Refund')}}">Refunds</a></li>
                <li><a href="{{route('Notice')}}">Notice</a></li>
                <li><a href="{{route('Terms')}}">terms of use</a></li>
            </ul>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <h3>what in stores</h3>
            <ul class="w3_footer_grid_list">
                @foreach ($side_category as $item)
                <li><a href="{{route('category_all_products',$item->name)}}">{{$item->name}}</a></li>
                @endforeach
                
            </ul>
        </div>
    
        <div class="clearfix"> </div>
        <div class="agile_footer_grids">
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h4>100% secure payments</h4>
                    <img src="{{asset('../asset2/images/card.png')}}" alt=" " class="img-responsive" />
                </div>
            </div>
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h5>connect with us</h5>
                    <ul class="agileits_social_icons">
                        <li><a href="https://www.facebook.com/profile.php?id=61564792318012&mibextid=ZbWKwL" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-tiktok" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/rizqelstore?igsh=MTlxdnp2OTQyYzJwaw==" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                       
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="wthree_footer_copy">
            <p>© 2024 Copy Rights reserved by Rizqel.</p>
        </div>
    </div>
</div>
<!-- //footer -->
