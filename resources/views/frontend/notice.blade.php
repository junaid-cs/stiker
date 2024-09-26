@extends('../frontend/layout/main')

@section('content')
<style>
         p {
            margin: 10px 0;
        }
        h1{
            margin: 20px 0;
        }
</style>
<div class="container" style="margin:30px auto">
    <h1>Official Rizqel.com Online Sale Website</h1>
    <p>All products displayed on the website of rizqel.com may be available at official Rizqel Portal Office or with the approved suppliers, vendors and distributors. To ensure the authenticity, genuine Rizqel Portal products are sold exclusively through official Rizqel Portal Office or approved distributors, wholesalers, vendors and retailers across UAE.</p>
    <p>Rizqel Portal reserves the rights at all times to modify its products, descriptions and models featured in the Website. While Rizqel Portal has tried to accurately display the pictures of packaging, color and design of its products on the Website. These mostly depend on your screen setting and may therefore be perceived differently.</p>
    <p>All intellectual property rights such as trademarks, trade names, designs and copyrights are reserved and are exclusively owned by either Rizqel Portal or our partners or third-party owners. All the logos, product images and product ads are displayed just to sale the products on Rizqel Portal (Rizqel.com).</p>
    <h2>Privacy Policy</h2>
    <p>Rizqel Portal respects your right of privacy and is committed to maintaining your confidence and trust. This Privacy Policy (the “Policy”) describes the privacy practices of the www.rizqel.com or <a href="https://rizqel.com">https://rizqel.com</a> website (the “Website”). The Policy applies to all the types of information collected from you while you are using the Website.</p>
    <p>Please read the following carefully to understand our policies and practices regarding the treatment of personal information. This Policy does not apply to the information you provide to Rizqel Portal or to the information that Rizqel Portal may collect offline or through other means. It also does not apply to the information collected by another affiliated or third-party website or application that may link to or be accessible from the Website.</p>
    <h2>Information Collected</h2>
    <p>Rizqel Portal does not collect your personal information from you without your knowledge or permission and does not ask you for such information to access and use the Website.</p>
    <p><strong>Rizqel.com and Rizqel Portal may collect the following information from you</strong></p>
    <p>•	The personal information you voluntarily provide to Rizqel Portal, such as your full name and email address, contact number etc.</p>
    <p>•	Passive information collected as you use the Website, which may include your IP address and other information relevant to customer surveys and offers.</p>
    <p><strong>What we do with the information we gather?</strong></p>
    <p>We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:</p>
    <p>•	Internal record keeping.
</p>
<p>•	We may use the information to improve our products and services.</p>
<p>•	We may periodically send promotional emails about new products, special offers or other information which we think you may find interesting using the email address which you have provided.</p>
<p>

•	From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone, fax or mail. We may use the information to customize the website according to your interests.</p>
<h2>Security</h2>
<p>Protecting your information and personal data is of primary concern to Rizqel Portal. The information and personal data that is collected is stored on secure servers and Rizqel Portal otherwise takes reasonable precautions to protect it.</p>
<p>However, Rizqel Portal cannot warrant and does not represent that our level of security meets or exceeds any specific standards. No internet transmission is 100% secure, nor is stored data free from vulnerabilities. Rizqel Portal cannot guarantee the security of the Website, databases or services, nor can Rizqel Portal guarantee that the personal information you supply will not be intercepted while being transmitted over the internet.</p>
<h2>Changes to This Privacy Policy</h2>
<p>Rizqel Portal reserves the right to modify, alter or otherwise update this Policy from time to time and you agree to be bound by such modifications, alterations or updates. If there are any Policy changes, the revised policy will be posted on the Website. Please check back periodically and/or before you provide any personally identifiable information.</p>
<h2>Copyright</h2>
<p>All content on the Rizqel.com including text, graphics, logos, designs, photographs, button icons, images, audio/video clips, and digital downloads, data compilations, and software, is the property of www.rizqel.com , <a href="https://rizqel.com">https://rizqel.com</a>  and Rizqel Portal, Dubai, UAE and is protected by UAE and international copyright laws. The compilation of all content on this site is also the exclusive property of www.rizqel.com and Rizqel Portal and is protected by UAE and international copyright laws. They should not be reproduced or used without express written permission from www.rizqel.com and Rizqel Portal.</p>

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