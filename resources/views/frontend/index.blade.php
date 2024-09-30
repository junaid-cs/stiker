@extends('../frontend/layout/main')

@section('content')
<style>
	.banner_bottom img {
		height: 354px;
		width: 100%;
		object-fit: cover;
	}

	.button_section .overlay {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, 0.3);
		z-index: 1;
		color: white;
		display: flex;
		justify-content: start;
		align-items: start;
		padding: 72px 30px;
		cursor: pointer;
	}
	.button_section .overlay.get{
		align-items: end !important;
	}

	.button_section .overlay span {
		border: 1px solid;
		padding: 10px 20px;
		animation: ease-in-out;
		/* box-shadow: 0px 1px 6px 1px white; */
	}

	.button_section .overlay span:hover {
		box-shadow: 0px 1px 6px 1px white;
		background: white;
		color: black;
		border-color: white;
	}
</style>
<div class="d-flex flex-wrap position-relative">
	<div class="soical_icons" style="position: absolute;
    right: 0;
    z-index: 9;">
		<ul class="agileits_social_icons">
			<li><a href="https://www.facebook.com/profile.php?id=61564792318012&mibextid=ZbWKwL" style="" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li><a href="#" style="" class="google"><i class="fa fa-tiktok" aria-hidden="true"></i></a></li>
			<li><a href="https://www.instagram.com/rizqelstore?igsh=MTlxdnp2OTQyYzJwaw==" style="" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

		</ul>
	</div>
	<div class="w3l_banner_nav_right" data-aos="fade-right" data-aos-duration="1500">
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<script>
						const swiftUpElements = document.querySelectorAll('.w3l_banner_nav_right_banner');
						swiftUpElements.forEach(elem => {
							const words = elem.textContent.split(' ');
							elem.innerHTML = '';
							words.forEach((el, index) => {
								words[index] = `<span><i>${words[index]}</i></span>`;
							});
							elem.innerHTML = words.join(' ');
							const children = document.querySelectorAll('span > i');
							children.forEach((node, index) => {
								node.style.animationDelay = `${index * .1}s`;
							});
						});
					</script>
					@foreach ($banner as $item)
					@php
					$imageUrl = asset($item->image);
					@endphp
					<li>
						<img src="{{$imageUrl}}" alt="">
					</li>
					@endforeach

				</ul>

			</div>
		</section>
		<script type="text/javascript">
			$(window).load(function() {
				$('.flexslider').flexslider({
					itemMargin: 5,
					animation: "slide",
					start: function(slider) {
						$('body').removeClass('loading');
					}
				});
			});
		</script>

		<!-- FlexSlider CSS -->
		<link rel="stylesheet" href="{{asset('../asset2/css/flexslider.css')}}" type="text/css" media="screen" />
		<!-- FlexSlider JS -->
		<script defer src="{{asset('../asset2/js/jquery.flexslider.js')}}"></script>
		<!-- Cloudflare email decode script -->
		<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
		<!-- //flexSlider -->
	</div>
	<div class="right_card ml-2">
		<div class="d-flex flex-wrap home_banner" data-aos="fade-left" data-aos-duration="1500">
			<img src="{{asset('../asset2/images/sidebanner1.jpg')}}" class="img-fluid " style="border-radius:2px; height:187px;" width="100%">
			<img src="{{asset('../asset2/images/sidebanner2.jpg')}}" class="img-fluid" style="border-radius:2px; height:187px;" width="100%">
		</div>

	</div>
</div>
<div class="clearfix"></div>
</div>

<!-- banner -->

<!-- categories -->
<div class="d-flex box-container justify-content-center container mt-4">
	<div class="d-flex flex-wrap">



		@foreach ($side_category as $side_items)
		<div class="item mr-1" style="margin: 30px auto;">
			<div class="top-category-single">
				<a href="{{route('category_all_products',$side_items->name)}}">
					<div class="cat-icon">

						<img src="{{asset($side_items->image)}}" alt="" width="100%" height="100%">
					</div>
					<span>{{$side_items->name}}</span>
				</a>
			</div>
		</div>
		@endforeach

	</div>
</div>


<!-- categories -->
<!--small crousel-->
<!-- Place somewhere in the <body> of your page -->

<livewire:mainpageslider />



<script type="text/javascript">
	$(window).load(function() {
		$('.flexslidersmall').flexslider({
			animation: "slide",
			animationLoop: true,
			itemWidth: 210,
			itemMargin: 5,
			slideshow: true,
			slideshowSpeed: 4000,
			animationSpeed: 600
		});
	});
</script>
<!--small crousel-->
<!--hover images-->
<div class="container button_section" style="overflow: hidden;">
	<div class="col-12 col-md-6" data-aos="fade-right" data-aos-duration="1500" style="padding: 0;">
		<div class="overlay">
			<span class="shop">Shop now</span>
		</div>
		<img src="{{asset('../asset2/images/smallbanner1.jpg')}}" class="img-fluid " style="object-fit: cover;" width="100%" height="400px" alt="Main Image">
	</div>
	<div class="col-12 col-md-6" data-aos="fade-left" data-aos-duration="1500" style="padding: 0;">
		<div class="overlay get">
			<span class="sample">Get samples</span>
		</div>
		<img src="{{asset('../asset2/images/smallbanner2.jpg')}}" class="img-fluid" style="object-fit: cover;" width="100%" height="400px" alt="Main Image">
	</div>
</div>
</div>
<!-- fresh-vegetables -->
<div class="fresh-vegetables">
	<div class="container">
		<!---728x90--->
		<h3>Top Products</h3>
		<div class="w3l_fresh_vegetables_grids">
			<div class="col-md-12 w3l_fresh_vegetables_grid_right">
				<div class="w3l_fresh_vegetables_grid1"
				 style=" border-radius: 20px;overflow: hidden;"
				data-aos="fade-down" data-aos-duration="1500">
					<img src="{{asset('../asset2/images/p7.jpg')}}" style="height: 150px; width:100%; object-fit:cover" alt=" " class="img-responsive" />
					<!-- <img src="{{asset('../asset2/images/bg-1.jpg')}}" alt=" " class="img-responsive" /> -->
				</div>
				<div class="col-md-3 w3l_fresh_vegetables_grid">
					<div class="w3l_fresh_vegetables_grid1"
					 style="margin: 10px auto; border-radius: 20px;overflow: hidden;"
					 data-aos="fade-down-right" data-aos-duration="1500">
						<img src="{{asset('../asset2/images/p1.jpg')}}" alt=" " class="img-responsive" />
						<!-- <img src="{{asset('../asset2/images/bg-1.jpg')}}" alt=" " class="img-responsive" /> -->
					</div>
					<div class="w3l_fresh_vegetables_grid1"
					 style=" border-radius: 20px;overflow: hidden;"
					data-aos="fade-up-right" data-aos-duration="1000">
						<img src="{{asset('../asset2/images/p2.jpg')}}" alt=" " class="img-responsive" />
						<!-- <img src="{{asset('../asset2/images/bg-1.jpg')}}" alt=" " class="img-responsive" /> -->
					</div>
				</div>
				<div class="col-md-6 w3l_fresh_vegetables_grid">
					<div class="w3l_fresh_vegetables_grid1">
						<div class="w3l_fresh_vegetables_grid1_rel">
							<img src="{{asset('../asset2/images/p4.png')}}" data-aos="zoom-in" data-aos-duration="3000" alt=" " class="img-responsive" />
							<div class="w3l_fresh_vegetables_grid1_rel_pos">

							</div>
						</div>
					</div>
					<!-- <div class="w3l_fresh_vegetables_grid1_bottom">
						<img src="{{asset('../asset2/images/regular-bg.jpg')}}" alt=" " class="img-responsive" />
						<div class="w3l_fresh_vegetables_grid1_bottom_pos">
							<h5>Special Offers</h5>
						</div>
					</div> -->
				</div>
				<div class="col-md-3 w3l_fresh_vegetables_grid">
					<!--<div class="w3l_fresh_vegetables_grid1">-->
					<!--	<img src="{{asset('../asset2/images/bg-2.jpg')}}" alt=" " class="img-responsive" />-->
					<!--</div>-->
					<div class="w3l_fresh_vegetables_grid1_bottom">
						<img src="{{asset('../asset2/images/p3.jpg')}}"
						 style=" border-radius: 20px;overflow: hidden;"
						data-aos="fade-right" data-aos-duration="1000" alt=" " class="img-responsive" />
					</div>
					<div class="w3l_fresh_vegetables_grid1_bottom">
						<img src="{{asset('../asset2/images/p5.jpg')}}"
						style=" border-radius: 20px;overflow: hidden;"
						 data-aos="fade-bottom" data-aos-duration="2000" alt=" " class="img-responsive" />
					</div>
				</div>
				<div class="clearfix"> </div>
				<!--<div class="agileinfo_move_text">-->
				<!--	<div class="agileinfo_marquee">-->
				<!--		<h4>get <span class="blink_me">25% off</span> on first order and also get gift voucher</h4>-->
				<!--	</div>-->
				<!--	<div class="agileinfo_breaking_news">-->
				<!--		<span> </span>-->
				<!--	</div>-->
				<!--	<div class="clearfix"></div>-->
				<!--</div>-->
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //fresh-vegetables -->
<div class="top-brands">
	<div class="container">
		<!---728x90--->

		<h3 style="margin-bottom:10px;">Hot Offers</h3>

		<livewire:main-cart />


		<div class="clearfix"> </div>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
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

		<!---728x90--->
	</div>
</div>
<!-- //top-brands -->
<!--parallexx-->
<div id="content-block">

	<div class="content-push">

		<div class="parallax-slide">
			<div class="parallax-clip">
				<div class="fixed-parallax parallex1" style="">
				</div>
			</div>
		</div>
		<div class="parallax-slide">
			<div class="parallax-clip">
				<div class="fixed-parallax parallex2" style="">
				</div>
			</div>
		</div>

		<div class="parallax-slide">
			<div class="parallax-clip">
				<div class="fixed-parallax parallex3">
				</div>
			</div>
		</div>

		<div class="parallax-slide">
			<div class="parallax-clip">
				<div class="fixed-parallax parallex4" style="">
				</div>
			</div>
		</div>

	</div>
</div>

<!--parallexx-->
<!-- newsletter -->
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



<!-- Modal -->
<div class="modal fade" id="addmodel" tabindex="-1"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Add Admin</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="formAccountSettings" action="{{route('storeadmin')}}" method="POST">
					@csrf
					<div class="row">
						<div class="mb-3 col-md-6">
							<label for="name" class="form-label">Name</label>
							<input class="form-control" type="text"
								name="name" autofocus />
						</div>
						<div class="mb-3 col-md-6">
							<label for="email" class="form-label">Email</label>
							<input class="form-control" type="email"
								name="email" autofocus />
						</div>
					</div>
					<div class="row">
						<div class="mb-3 col-md-6">
							<label for="password" class="form-label">Password</label>
							<input class="form-control" type="password"
								name="password" autofocus />
						</div>
						<div class="mb-3 col-md-6">
							<label for="role" class="form-label">Role</label>
							<!-- <input class="form-control" type="text"
					   name="email" autofocus /> -->
							<select name="role" class="form-control">
								<option value="admin">Super Admin</option>
								<option value="vender">Admin</option>
								<option value="saleman">Sales Person</option>
								<option value="saleman">Delievy Boy</option>


							</select>
						</div>
					</div>
					<div class="mt-2">
						<button type="submit" class="btn btn-primary me-2">Save changes</button>
						<button type="reset" class="btn btn-label-secondary">Cancel</button>
					</div>
				</form>
			</div>
			<div class="modal-footer"><button type="button" class="btn btn-secondary"
					data-bs-dismiss="modal">Close</button>
				<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>


@endsection

@section('script')

<script>
	function addtocart(productid, actualprice, totalprice) {

		// console.log(productid, actualprice, totalprice);
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: '/storecart/',
			data: {

				product_id: productid,
				actual_price: actualprice,
				total_price: totalprice

			},
			dataType: 'json',
			cache: false,
			success: function(response) {
				if (response.status == 'success') {
					toastr.success(response.message);
				} else {
					toastr.error(response.message);
				}
			},
			error: function(xhr, status, error) {
				console.log(xhr.responseText);
				toastr.error('An error occurred while processing your request.');
			}

		});
	}



	@if(Session::has('status'))
	toastr.success("{{ Session::get('status') }}")
	@endif
	@if(Session::has('statusError'))
	toastr.error("{{ Session::get('statusError') }}")
	@endif

	@error('email')
	toastr.error("{{ $message }}")
	@enderror
</script>

@endsection