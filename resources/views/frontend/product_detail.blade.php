@extends('../frontend/layout/main')

@section('content')
<style>
    .pd-wrap {
	padding: 40px 0;
	font-family: 'Poppins', sans-serif;
}
.heading-section {
	text-align: center;
	margin-bottom: 20px;
}
.sub-heading {
	font-family: 'Poppins', sans-serif;
    font-size: 12px;
    display: block;
    font-weight: 600;
    color: #2e9ca1;
    text-transform: uppercase;
    letter-spacing: 2px;
}
.heading-section h2 {
	font-size: 32px;
    font-weight: 500;
    padding-top: 10px;
    padding-bottom: 15px;
	font-family: 'Poppins', sans-serif;
}
.user-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    position: relative;
	min-width: 80px;
	background-size: 100%;
}
.carousel-testimonial .item {
	padding: 30px 10px;
}
.quote {
	position: absolute;
    top: -23px;
    color: #2e9da1;
    font-size: 27px;
}
.name {
	margin-bottom: 0;
    line-height: 14px;
    font-size: 17px;
    font-weight: 500;
}
.position {
	color: #adadad;
	font-size: 14px;
}
.owl-nav button {
	position: absolute;
	top: 50%;
	transform: translate(0, -50%);
	outline: none;
	height: 25px;
}
.owl-nav button svg {
	width: 25px;
	height: 25px;
}
.owl-nav button.owl-prev {
	left: 25px;
}
.owl-nav button.owl-next {
	right: 25px;
}
.owl-nav button span {
	font-size: 45px;
}
.product-thumb .item img {
	height: 100px;
}
.product-name {
	font-size: 22px;
	font-weight: 500;
	line-height: 22px;
	margin-bottom: 4px;
}
.product-price-discount {
	font-size: 22px;
    font-weight: 400;
    padding: 10px 0;
    clear: both;
}
.product-price-discount span.line-through {
	text-decoration: line-through;
    margin-left: 10px;
    font-size: 14px;
    vertical-align: middle;
    color: #a5a5a5;
}
.display-flex {
	display: flex;
}
.align-center {
	align-items: center;
}
.product-info {
	width: 100%;
}
.reviews-counter {
    font-size: 13px;
}
.reviews-counter span {
	vertical-align: -2px;
}
.rate {
    float: left;
    padding: 0 10px 0 0;
}
.rate:not(:checked) > input {
    position:absolute;
    opacity: 0;
}
.rate:not(:checked) > label {
    float: right;
    width: 15px;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 21px;
    color:#ccc;
	margin-bottom: 0;
	line-height: 21px;
}
.rate:not(:checked) > label:before {
    content: '\2605';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
.product-dtl p {
	font-size: 14px;
	line-height: 24px;
	color: #7a7a7a;
}
.product-dtl .form-control {
	font-size: 15px;
}
.product-dtl label {
	line-height: 16px;
	font-size: 15px;
}
.form-control:focus {
	outline: none;
	box-shadow: none;
}
.product-count {
	margin-top: 15px; 
}
.product-count .qtyminus,
.product-count .qtyplus {
	width: 34px;
    height: 34px;
    background: #5b2e73;
    text-align: center;
    font-size: 19px;
    line-height: 36px;
    color: #fff;
    cursor: pointer;
}
.img-slider img{
        max-height: 368px;
    object-fit: contain !important;
}
.mt-1{
    margin-top:4px;
}
.product-count .qtyminus {
	border-radius: 3px 0 0 3px; 
}
.product-count .qtyplus {
	border-radius: 0 3px 3px 0; 
}
.owl-carousel .owl-stage .owl-item{
    border:none !important;
}
.product-count .qty {
	width: 60px;
	text-align: center;
}
.round-black-btn {
	border-radius: 4px;
    background: #5b2e73;
    color: #fff;
    padding: 7px 45px;
    display: inline-block;
    margin-top: 20px;
    border: solid 2px #5b2e73; 
    transition: all 0.5s ease-in-out 0s;
}
.nav > li > a:hover, .nav > li > a:focus{
    background:none;
    border:none;
}
.round-black-btn:hover,
.round-black-btn:focus {
	background: transparent;
	color: #5b2e73;
	text-decoration: none;
}

.product-info-tabs {
	margin-top: 25px; 
}
.nav-tabs{
   margin-bottom:0px !important; 
}
.product-info-tabs .nav-tabs {
	border-bottom: 2px solid #d8d8d8;
}
.product-info-tabs .nav-tabs .nav-item {
	margin-bottom: 0;
}
.product-info-tabs .nav-tabs .nav-link {
	border: none; 
	border-bottom: 2px solid transparent;
	color: #323232;
}
.product-info-tabs .nav-tabs .nav-item .nav-link:hover {
	border: none; 
}
.product-info-tabs .nav-tabs .nav-item.show .nav-link, 
.product-info-tabs .nav-tabs .nav-link.active, 
.product-info-tabs .nav-tabs .nav-link.active:hover {
	border: none; 
	border-bottom: 2px solid #d8d8d8;
	font-weight: bold;
}
.product-info-tabs .tab-content .tab-pane {
	padding: 30px 20px;
	font-size: 15px;
	line-height: 24px;
	color: #7a7a7a;
}
.review-form .form-group {
	clear: both;
}
.mb-20 {
	margin-bottom: 20px;
}

.review-form .rate {
	float: none;
	display: inline-block;
}
.review-heading {
	font-size: 24px;
    font-weight: 600;
    line-height: 24px;
    margin-bottom: 6px;
    text-transform: uppercase;
    color: #000;
}
.review-form .form-control {
	font-size: 14px;
}
.review-form input.form-control {
	height: 40px;
}
.review-form textarea.form-control {
	resize: none;
}
.review-form .round-black-btn {
	text-transform: uppercase;
	cursor: pointer;
}
.contact-info span{
    font-weight:normal;
}
</style>


<div class="w3l_banner_nav">
    <!--<div class="w3l_banner_nav_right_banner3">-->
    <!--    <h3>Best Deals For New Products<span class="blink_me"></span></h3>-->
    <!--</div>-->
    
    <!--:product_title="$product->title"-->
    <!--:product_image="$product->image" -->
    <!--:product_description="$product->description"-->
    <!--:product_discountprice="$product->discountprice"-->
    <!--:product_price="$product->price"-->
    <!--:product_name="$product->name"-->
    <!--:product_category="$product->category"/>-->
    
    
    <!--****-->
    <!--****-->
<!--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"><div class="pd-wrap">
		<div class="container">
	        <!--<div class="heading-section">-->
	        <!--    <h2>Product Details</h2>-->
	        <!--</div>-->
	        <div class="row">
				<livewire:productdetail :product_id="$product->id">
	    
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!--****-->
    <!--****-->
    
<!-- //brands -->
<!-- newsletter -->
<!---728x90--->
<div class="newsletter">
<div class="container">
    <div class="w3agile_newsletter_left">
        <h3>sign up for our newsletter</h3>
    </div>
    <div class="w3agile_newsletter_right">
        <form action="#" method="post">
            <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
            <input type="submit" value="subscribe now">
        </form>
    </div>
    <div class="clearfix"> </div>
</div>
</div>
<!-- //newsletter -->
<script>

   	@if(Session::has('status'))
    toastr.success("{{ Session::get('status') }}")
@endif
	@if(Session::has('statusError'))
    toastr.error("{{ Session::get('statusError') }}")
@endif 



    $(document).ready(function() {
		    var slider = $("#slider");
		    var thumb = $("#thumb");
		    var slidesPerPage = 4; //globaly define number of elements per page
		    var syncedSecondary = true;
		    slider.owlCarousel({
		        items: 1,
		        slideSpeed: 2000,
		        nav: false,
		        autoplay: false, 
		        dots: false,
		        loop: true,
		         margin: 10,
		        responsiveRefreshRate: 200
		    }).on('changed.owl.carousel', syncPosition);
		    thumb
		        .on('initialized.owl.carousel', function() {
		            thumb.find(".owl-item").eq(0).addClass("current");
		        })
		        .owlCarousel({
		            items: slidesPerPage,
		            dots: false,
		            nav: true,
		            item: 4,
		            smartSpeed: 200,
		            slideSpeed: 500,
		             margin: 10,
		            slideBy: slidesPerPage, 
		        	navText: ['<svg width="18px" height="18px" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="25px" height="25px" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
		            responsiveRefreshRate: 100
		        }).on('changed.owl.carousel', syncPosition2);
		    function syncPosition(el) {
		        var count = el.item.count - 1;
		        var current = Math.round(el.item.index - (el.item.count / 2) - .5);
		        if (current < 0) {
		            current = count;
		        }
		        if (current > count) {
		            current = 0;
		        }
		        thumb
		            .find(".owl-item")
		            .removeClass("current")
		            .eq(current)
		            .addClass("current");
		        var onscreen = thumb.find('.owl-item.active').length - 1;
		        var start = thumb.find('.owl-item.active').first().index();
		        var end = thumb.find('.owl-item.active').last().index();
		        if (current > end) {
		            thumb.data('owl.carousel').to(current, 100, true);
		        }
		        if (current < start) {
		            thumb.data('owl.carousel').to(current - onscreen, 100, true);
		        }
		    }
		    function syncPosition2(el) {
		        if (syncedSecondary) {
		            var number = el.item.index;
		            slider.data('owl.carousel').to(number, 100, true);
		        }
		    }
		    thumb.on("click", ".owl-item", function(e) {
		        e.preventDefault();
		        var number = $(this).index();
		        slider.data('owl.carousel').to(number, 300, true);
		    });


            $(".qtyminus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    if (parseInt(now) -1> 0)
                    { now--;}
                    $(".qty").val(now);
                }
            })            
            $(".qtyplus").on("click",function(){
                var now = $(".qty").val();
                if ($.isNumeric(now)){
                    $(".qty").val(parseInt(now)+1);
                }
            });
		});
</script>

@endsection




