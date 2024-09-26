@extends('../frontend/layout/main')

@section('content')
<style>
    @media screen and (min-width:680px){
        .aboutul {
            margin:20px 80px;
        }
    }
</style>

<div class="w3l_banner_nav_right_banner3">
    <h3>About Rizqel<span class="blink_me"></span></h3>
</div>

<div class="" style="padding: 50px; font-size: 18px; font-weight:600;">
<div class="about-text" style="padding: 50px; font-size: 18px; font-weight:600;">
  Welcome to <strong> Rizqel </strong>, your trusted marketplace in the UAE, where quality meets convenience. 
  At Rizqel, we believe in making your shopping experience seamless and enjoyable, bringing you
  the best products from around the world right to your doorstep.
  <br>
  <br>
  Founded in the heart of the UAE, Rizqel was created to offer an all-in-one platform for shoppers seeking a wide range of categories,
  from fashion and electronics to beauty and home essentials. Our name, 
  inspired by the Arabic word “Rizq,” symbolizes sustenance and blessings, while the suffix “el” reflects our commitment to excellence.
  <br>
  <br>
<h3>Our Mission</h3>
 <p> Our mission is simple – to deliver a world-class online shopping experience by offering top-quality products 
  at competitive prices, all while ensuring fast and reliable
  service across the UAE. Whether you're looking for the latest tech, stylish apparel, or everyday essentials, Rizqel has you covered.
  </p>
  <br>
  <br>
<h3>Why Choose Rizqel?</h3>
 <ul class="aboutul" style=" font-size:16px;">
     <li> <strong>Diverse Range:</strong>  With thousands of products and new arrivals added regularly, Rizqel ensures you have access to the latest trends and must-haves.</li>
     <li> <strong>Trusted Brands:</strong>  We partner with leading brands and suppliers to bring you authentic products you can trust. </li>
     <li> <strong>Fast Delivery: </strong> We understand the importance of convenience. That’s why we provide fast and efficient delivery, so you receive your orders on time, every time. </li>
     <li> <strong>Exceptional Customer Service:</strong> Our dedicated customer support team is always ready to assist you, ensuring your satisfaction with every purchase. </li>
 </ul>
 
<h3>Our Vision</h3>
<p>At Rizqel, we envision becoming the go-to marketplace for shoppers in the UAE and beyond. 
We aim to inspire trust, convenience, and satisfaction in every transaction, helping our customers discover products that enrich their lives.</p>
  <br>
  <br>
  Thank you for choosing Rizqel – where shopping is made simple, efficient, and rewarding.

</div>
<div class="row justify-content-center about_us">
    <div class="col-lg-3 col-sm-6">
        <div class="single_feature_part">
            <img src="{{asset('./asset2/images/feature_icon_1.svg')}}" alt="#">
            <h4>Credit Card Support</h4>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="single_feature_part">
            <img src="{{asset('./asset2/images/feature_icon_2.svg')}}" alt="#">
            <h4>Online Order</h4>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="single_feature_part">
            <img src="{{asset('./asset2/images/feature_icon_3.svg')}}" alt="#">
            <h4>Free Delivery</h4>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="single_feature_part">
            <img src="{{asset('./asset2/images/feature_icon_4.svg')}}" alt="#">
            <h4>Product with Gift</h4>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
   	@if(Session::has('status'))
    toastr.success("{{ Session::get('status') }}")
@endif
	@if(Session::has('statusError'))
    toastr.error("{{ Session::get('statusError') }}")
@endif 
</script>

@endsection