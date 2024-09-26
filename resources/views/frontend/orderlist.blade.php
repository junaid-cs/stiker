@extends('../frontend/layout/main')

@section('content')






    <div class="w3l_banner_nav">
        <!---728x90--->

        <div class="privacy about">
            <h3>Order<span>List</span></h3>

            <div class="checkout-right">
               
              
                <div>
                    <h4>Your Orders contains: <span> Products</span></h4>
                    <div class="w-100 overflow-scroll">
                    <table class="timetable_sub">
                       <thead>
                           <tr>
                               <th>SL No.</th>
                               <th>FULL NAME</th>
                               <th>CONTACT NO</th>
                               <th>LOCATION</th>
                               <th>CITY</th>
                               <th>ADDRESS TYPE</th>
                               <th>TOTAL AMOUNT</th>
                               <th>PAYMENT TYPE</th>
                               <th>STATUS</th>
                               <th>ACTION</th>


                           </tr>
                       </thead>
                       <tbody>
                         
                    @foreach ($show as $key=> $item)
                   
                    <tr class="rem1">
                       <td class="invert">{{$key+1}}</td>
                       <td class="invert">{{$item->full_name}}</td>
                       <td class="invert">{{$item->mobile_no}}</td>
                       <td class="invert">{{$item->location}}</td>
                       <td class="invert">{{$item->city}}</td>
                       <td class="invert">{{$item->address_type}}</td>
                       <td class="invert">${{$item->total_amount}}</td>
                       <td class="invert">{{$item->paymenttype}}</td>
                       <td class="invert">{{$item->status}}</td>

                       <td class="invert">
                          <div class="rem">
                             <a href="{{route('complete_orders',$item->id)}}"><i class="fa fa-eye text-primary" aria-hidden="true"></i></a>
                             @if ($item->status == 'Ready')
                                 
                             <!--<a href="#" data-toggle="modal" data-target="#ratingModal"><i class="fa-solid fa-star text-warning"></i></a>-->
                             @endif
                          </div>
                 
                       </td>
                    </tr>
              






<!-- rating Modal -->
<div class="modal fade" id="ratingModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
aria-hidden="true">
<div class="modal-dialog w-50" role="document">
    <div class="modal-content">
        <div class="modal-header d-flex justify-content-between">
            <h5 class="modal-title" id="loginModalLabel">Rating</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <!-- Add your login form here -->
            <section class="text-center">
                <!-- Background image -->
                <div class="row d-flex justify-content-center popup">
                    <div class="w-60 mx-3">
                        <form class="review-form" action="{{route('rating')}}" method="POST">
                            @csrf
                            <input type="hidden" name="orderid" value="{{$item->id}}">
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
                        </form>
                    </div>
                </div>


            </section>
        </div>
    </div>
</div>
</div>









                    @endforeach
                 </tbody>
                 </table>
                </div>
                 
                      
                   <div class="clearfix"> </div>
                 </div>
                    
          
       

            </div>

        </div>
        <!-- //about -->
    </div>
    <div class="clearfix"></div>
    </div>
    <!-- //banner -->

    <!---728x90--->
    <!-- newsletter -->
    <div class="newsletter">
        <div class="container">
            <div class="w3agile_newsletter_left">
                <h3>sign up for our newsletter</h3>
            </div>
            <div class="w3agile_newsletter_right">
                <form action="#" method="post">
                    <input type="email" name="Email" value="Email" onfocus="this.value = '';"
                        onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    <input type="submit" value="subscribe now">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //newsletter -->
@endsection

@section('script')
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="./js/jquery-1.11.1.min.js"></script>

   
<script>
   	@if(Session::has('status'))
    toastr.success("{{ Session::get('status') }}")
@endif
	@if(Session::has('statusError'))
    toastr.error("{{ Session::get('statusError') }}")
@endif 
  window.addEventListener('login_model', event => {
  
          $('#loginModal').modal('show');
  
  })

  window.addEventListener('checkout_model', event => {
  
  $('#paymentModal').modal('show');

})
</script>


    
    <script>

function cash(){
        	$('#cashondelivery').val("Cash on Delivery");
        }
        
        $(document).ready(function(c) {
            $('.close1').on('click', function(c) {
                $('.rem1').fadeOut('slow', function(c) {
                    $('.rem1').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(c) {
            $('.close2').on('click', function(c) {
                $('.rem2').fadeOut('slow', function(c) {
                    $('.rem2').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(c) {
            $('.close3').on('click', function(c) {
                $('.rem3').fadeOut('slow', function(c) {
                    $('.rem3').remove();
                });
            });
        });
    </script>

    <!-- //js -->
    <!-- script-for sticky-nav -->
    <script>
        $(document).ready(function() {
            var navoffeset = $(".agileits_header").offset().top;
            $(window).scroll(function() {
                var scrollpos = $(window).scrollTop();
                if (scrollpos >= navoffeset) {
                    $(".agileits_header").addClass("fixed");
                } else {
                    $(".agileits_header").removeClass("fixed");
                }
            });

        });
    </script>
    <!-- //script-for sticky-nav -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            	var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear' 
            	};
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //here ends scrolling icon -->
    <script src="js/minicart.js"></script>
    <script>
        paypal.minicart.render();

        paypal.minicart.cart.on('checkout', function(evt) {
            var items = this.items(),
                len = items.length,
                total = 0,
                i;

            // Count the number of each item in the cart
            for (i = 0; i < len; i++) {
                total += items[i].get('quantity');
            }

            if (total < 3) {
                alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
                evt.preventDefault();
            }
        });
    </script>

    <script>
        (function() {
            var js =
                "window['__CF$cv$params']={r:'835fdd6bfc4946bb',t:'MTcwMjY1NTY2NC40MzQwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
            var _0xh = document.createElement('iframe');
            _0xh.height = 1;
            _0xh.width = 1;
            _0xh.style.position = 'absolute';
            _0xh.style.top = 0;
            _0xh.style.left = 0;
            _0xh.style.border = 'none';
            _0xh.style.visibility = 'hidden';
            document.body.appendChild(_0xh);

            function handler() {
                var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
                if (_0xi) {
                    var _0xj = _0xi.createElement('script');
                    _0xj.innerHTML = js;
                    _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
                }
            }
            if (document.readyState !== 'loading') {
                handler();
            } else if (window.addEventListener) {
                document.addEventListener('DOMContentLoaded', handler);
            } else {
                var prev = document.onreadystatechange || function() {};
                document.onreadystatechange = function(e) {
                    prev(e);
                    if (document.readyState !== 'loading') {
                        document.onreadystatechange = prev;
                        handler();
                    }
                };
            }
        })();
    </script>
    </body>
@endsection
