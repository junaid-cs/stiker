@extends('../frontend/layout/main')

@section('content')
    <div class="w3l_banner_nav">
        <!---728x90--->

        <div class="privacy about">
            <h3>Chec<span>kout</span></h3>

            <div class="checkout-right">
               
              
                <livewire:shoppingcart />
                    
                <div class="col-md-8 address_form_agile">
                    
                    <!-- modal -->
                    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header d-flex justify-content-between">
                              <h5 class="modal-title" id="paymentModalLabel">Add a new Details</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- Add your signup form here -->
                              <form action="{{ route('storeorder') }}" method="post" class="creditly-card-form agileinfo_form require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{'pk_test_51GtM8EHIHgm0k6T2DAg3QaZraYxl1vQRCWaDLLF83dHQwbgnjucseBietq035UHazzfbuTPb7SKwRYgzvIGPm9UX001kSe0hY7'}}" id="payment-form">
                                @csrf
                            
                                <input type="hidden" name="cash" value="" id="cashondelivery">
                                <input type="hidden" name="total_amount" value="{{Cart::subtotal()}}">
              
                                <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                    <div class="information-wrapper">
                                        <div class="first-row form-group">
                                            <div class="controls">
                                                <label class="control-label">Full name: </label>
                                                <input class="billing-address-name form-control" type="text" name="full_name"
                                                    placeholder="Full name">
                                            </div>
                                            <div class="w3_agileits_card_number_grids">
                                                <div class="w3_agileits_card_number_grid_left">
                                                    <div class="controls">
                                                        <label class="control-label">Mobile number:</label>
                                                        <input class="form-control" type="text" placeholder="Mobile number"
                                                            name="mobile_no">
                                                    </div>
                                                </div>
                                                <div class="w3_agileits_card_number_grid_right">
                                                    <div class="controls">
                                                        <label class="control-label">Address: </label>
                                                        <input class="form-control" type="text" placeholder="Address"
                                                            name="location">
                                                    </div>
                                                </div>
                                                <div class="clear"> </div>
                                            </div>
                                            <div class="controls">
                                                <label class="control-label">Emirate: </label>
                                                <input class="form-control" type="text" name="city" placeholder="Emirate">
                                            </div>
                                            <div class="controls">
                                                <label class="control-label">Address type: </label>
                                                <select class="form-control option-w3ls" name="address_type">
                                                    <option>Office</option>
                                                    <option>Home</option>
                                                    <option>Commercial</option>
              
                                                </select>
                                            </div>
                                        </div>
                              <div  id='nested-form'>
                                <div class='form-row row'>
                                 <div class='col-xs-12 col-md-6 form-group required'>
                                    <label class='control-label'>Name on Card</label> 
                                    <input class='form-control' size='4' type='text'>
                                 </div>
                                 <div class='col-xs-12 col-md-6 form-group required'>
                                    <label class='control-label'>Card Number</label> 
                                    <input autocomplete='off' class='form-control card-number' size='20' type='text' minlength='16' maxlength='19'  oninput='formatCardNumber(this); validateCardNumber(this)'>
                                 </div>                           
                              </div>                        
                              <div class='form-row row'>
                                 <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> 
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' pattern='\d{1,3}' maxlength='3'>
                                 </div>
                                 <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> 
                                    <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' maxlength='2'>
                                 </div>
                                 <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> 
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' maxlength='4'>
                                 </div>
                              </div>
                            {{-- <div class='form-row row'>
                               <div class='col-md-12 error form-group hide'>
                                  <div class='alert-danger alert'>Please correct the errors and try
                                     again.
                                  </div>
                               </div>
                            </div> --}}
                            <div class="form-row row">
                               <div class="col-xs-12">
                                  <button class="btn btn-primary btn-lg btn-block" type="submit">Stripe Now</button>
                               </div>
                            </div>
                        </div>
                           </form>
                        </div>
                    </section>
                            </div>
                          </div>
                        </div>
                      </div>
                    



                         <!-- cash modal -->
                    <div class="modal fade" id="cashModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header d-flex justify-content-between">
                              <h5 class="modal-title" id="paymentModalLabel">Add a new Details</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <!-- Add your signup form here -->
                              <form action="{{ route('storeorder') }}" method="post">
                                @csrf
                                <input type="hidden" name="total_amount" value="{{Cart::subtotal()}}">
              
                                <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                    <div class="information-wrapper">
                                        <div class="first-row form-group">
                                            <div class="controls">
                                                <label class="control-label">Full name: </label>
                                                <input class="billing-address-name form-control" type="text" name="full_name"
                                                    placeholder="Full name">
                                            </div>
                                            <div class="w3_agileits_card_number_grids">
                                                <div class="w3_agileits_card_number_grid_left">
                                                    <div class="controls">
                                                        <label class="control-label">Mobile number:</label>
                                                        <input class="form-control" type="text" placeholder="Mobile number"
                                                            name="mobile_no">
                                                    </div>
                                                </div>
                                                <div class="w3_agileits_card_number_grid_right">
                                                    <div class="controls">
                                                        <label class="control-label">Address: </label>
                                                        <input class="form-control" type="text" placeholder="Address"
                                                            name="location">
                                                    </div>
                                                </div>
                                                <div class="clear"> </div>
                                            </div>
                                            <div class="controls">
                                                <label class="control-label">Emirate: </label>
                                                <input class="form-control" type="text" name="city" placeholder="Emirate ">
                                            </div>
                                            <div class="controls">
                                                <label class="control-label">Address type: </label>
                                                <select class="form-control option-w3ls" name="address_type">
                                                    <option>Office</option>
                                                    <option>Home</option>
                                                    <option>Commercial</option>
              
                                                </select>
                                            </div>
                                        </div>
                            <div class="form-row row">
                               <div class="col-xs-12">
                                  <button class="btn btn-primary btn-lg btn-block" type="submit">Order Now</button>
                               </div>
                            </div>
                        </div>
                           </form>
                        </div>
                    </section>
                            </div>
                          </div>
                        </div>
                      </div>
                    
              
                      
                </div>
              
                <div class="clearfix"> </div>
       

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



{{-- stripe --}}

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
</script>


{{-- end stripe --}}

<script>

   	@if(Session::has('status'))
    toastr.success("{{ Session::get('status') }}")
@endif
	@if(Session::has('statusError'))
    toastr.error("{{ Session::get('statusError') }}")
@endif 


  window.addEventListener('login_model', event => {
  
          $('#loginModal').modal('show');
  
  });

  window.addEventListener('checkout_model', event => {
  
  $('#paymentModal').modal('show');

});

	window.addEventListener('emptyproducts', event => {
  
    Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "Your Cart is Empty!",
  footer: '<a href="#">Please Add to Cart First</a>'
});

});

window.addEventListener('cashcheckout_model', event => {
  
  $('#cashModal').modal('show');

});

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

    <!--  -->

    <script>
function formatCardNumber(input) {
    // Remove any spaces or dashes from the input
    var cardNumber = input.value.replace(/\s+/g, '').replace(/-/g, '');
    
    // Add space after every 4 characters
    var formatted = cardNumber.replace(/(.{4})/g, '$1 ');
    
    // Update the input value
    input.value = formatted.trim();
}

function validateCardNumber(input) {
    // Remove any spaces or dashes from the input
    var cardNumber = input.value.replace(/\s+/g, '').replace(/-/g, '');
    
    // Validate the input after formatting
    var isValid = /^\d{16,19}$/.test(cardNumber);
    if (!isValid) {
        input.setCustomValidity('Please enter a valid card number');
    } else {
        input.setCustomValidity('');
    }
}
</script>


    <!--  -->
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
