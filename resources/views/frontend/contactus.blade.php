
@extends('../frontend/layout/main')

@section('content')





<div class="w3l_banner_nav">
    <!-- mail -->
            <div class="mail">
            <!---728x90--->
    
                <h3>Mail Us</h3>
                <div class="agileinfo_mail_grids">
                    <div class="col-md-4 agileinfo_mail_grid_left">
                        <ul>
                            <li><i class="fa fa-home" aria-hidden="true"></i></li>
                            <li>address<span>Business Bay, Dubai United Arab Emirates</span></li>
                        </ul>
                        <ul>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
                            <li>email<span><a href="mailto:info@rizqel.com"><span class="__cf_email__" data-cfemail="info@rizqel.com">info@rizqel.com</span></a></span></li>
                        </ul>
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i></li>
                            <li>call to us<span>+971506573479 </span></li>
                        </ul>
                    </div>
                    <div class="col-md-8 agileinfo_mail_grid_right">
                        <form action="{{route('store_contact_msg')}}" method="post">
                            @csrf
                            <div class="col-md-6 wthree_contact_left_grid">
                                <input type="text" name="name" value="Name*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required="">
                                <input type="email" name="email" value="Email*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email*';}" required="">
                            </div>
                            <div class="col-md-6 wthree_contact_left_grid">
                                <input type="text" name="phone" value="Telephone*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone*';}" required="">
                                <input type="text" name="subject" value="Subject*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject*';}" required="">
                            </div>
                            <div class="clearfix"> </div>
                            <textarea  name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                            <input type="submit" value="Submit">
                            <input type="reset" value="Clear">
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
    <!-- //mail -->
            </div>
            <div class="clearfix"></div>
            <!---728x90--->
        </div>
    <!-- //banner -->
    <!-- map -->
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722544.9309954857!2d51.30530124741183!3d24.33611753087446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e48dfb1ab12bd%3A0x33d32f56c0080aa7!2sUnited%20Arab%20Emirates!5e0!3m2!1sen!2s!4v1721106049296!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
        </div>
    <!-- //map -->
    <!---728x90--->
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