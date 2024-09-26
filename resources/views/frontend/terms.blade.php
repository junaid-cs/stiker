@extends('../frontend/layout/main')

@section('content')

<div class="w3l_banner_nav_right_banner3">
    <h3>About Us<span class="blink_me"></span></h3>
</div>
<h2>Terms of Service</h2>
<div class="" style="padding: 50px; font-size: 18px; font-weight:600;">
    These terms of service (“Terms”, “Agreement”) are an agreement between the operator of Rizqel.com (“Website operator”, “us”, “we” or “our”) and you (“User”, “you” or “your”). This Agreement sets forth the general terms and conditions of your use of the https://rizqel.com website and any of its products or services (collectively, “Website” or “Services”).
<div class="about-text" style="padding: 50px; font-size: 18px; font-weight:600;">
   If you create an account at the Website, you are responsible for maintaining the security of your 
   account and you are fully responsible for all activities that occur under the account and any other actions
   taken in connection with it. Providing false contact information of any kind may result in the termination of
   your account. You must immediately notify us of any unauthorized uses of your account or any other breaches of
   security. We will not be liable for any acts or omissions by you, including any damages of any kind incurred as
   a result of such acts or omissions. We may suspend, disable, or delete your account (or any part thereof) if we
   determine that you have violated any provision of this Agreement or that your conduct or content would tend to
   damage our reputation and goodwill. If we delete your account for the foregoing reasons, you may not re-register
   for our Services. We may block your email address and Internet protocol address to prevent further registration.
</div>
<div class="about-text" style="padding: 50px; font-size: 18px; font-weight:600;">
   We are not responsible for content residing on the Website. In no event shall we be held liable for any loss of any Content.
   It is your sole responsibility to maintain appropriate backup of your Content. Not withstanding the foregoing, on some occasions
   and in certain circumstances, with absolutely no obligation, we may be able to restore some or all of your data that has been deleted as
   of a certain date and
   time when we may have backed up data for our own purposes. We make no guarantee that the data you need will be available.
</div>
<div class="about-text" style="padding: 50px; font-size: 18px; font-weight:600;">
   In addition to other terms as set forth in the Agreement, you are prohibited from using the website or its content: 
   (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any 
   international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate
   our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage,
   intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability;
   (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may 
   be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet;
   (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or
   immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, 
   or the Internet. We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.
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