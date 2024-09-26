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
<div class="container">
<h1>
Privacy Policy
</h1>
<p>
This website is owned and operated by BlackShine Technologies INC. We are committed to protecting the privacy of all visitors to our site, and this policy outlines our approach to privacy-related matters. It applies to all information shared with us directly through rizqel.com or via email. The management team at BlackShine Technologies INC has developed this privacy policy, which we may update periodically. We encourage you to review it regularly. This policy explains how we handle any personal data that you provide to us or that we collect from you through this Website or via email.
</p>
<h3>
1. Information We Collect
</h3>
<p>
In the course of operating our website, we may collect and process the following types of data:
</p>
<p>1.1 Information about your visits to our site and the resources you access, including but not limited to traffic data, location data, web logs, and other communication data.</p>
<p>1.2 Information you provide when filling out forms on our site, such as when you register to receive updates, subscribe to a newsletter, or make a purchase.</p>
<p>1.3 Information shared with us when you communicate with us for any purpose.</p>
<h3>
2. Use of Cookies
</h3>
<p>
We may occasionally gather information about your computer to enhance our services and to compile statistical data regarding website usage for our advertisers. This information is purely statistical and does not identify you personally. It helps us understand how visitors interact with the site so we can continually improve your experience.
</p>
<p>Cookies may be used to collect information about your general internet usage. These cookies are automatically downloaded to your computer and stored on its hard drive. They help us improve our website and provide better services to you.</p>
<p>You can decline cookies by adjusting the settings on your browser. However, please note that disabling cookies may prevent you from accessing certain parts of our site.</p>
<p>Our advertisers may also use cookies over which we have no control. These cookies may be downloaded when you click on advertisements on our site.</p>
<h3>3. Use of Your Information</h3>
<p>The information we collect from you is primarily used to provide our services. We may also use your data for the following purposes:</p>
<p>3.1 To provide you with the information you request about our products or services, including details on products that may interest you if you have opted to receive such information.</p>
<p>3.2 To fulfill our contractual obligations to you.</p>
<p>3.3 To notify you about changes to our website, including improvements or changes to our products or services.</p>
<p>3.4 If you are a returning customer, we may contact you with information about similar goods and services to those you have previously purchased.</p>
<p>3.5 We may use your data or allow selected third parties to use your data to provide you with information about unrelated products and services that we believe may interest you. We or they may contact you through the channels you have consented to.</p>
<p>3.6 If you are a new customer, we will contact you or allow third parties to contact you only if you have given your consent, and only by the means you agreed upon.</p>
<p>3.7 You have the right to withhold consent for your data to be used for purposes not directly related to our services. You can exercise this right when you provide your details on the form used to collect your data.</p>
<p>3.8 We do not disclose information about identifiable individuals to our advertisers. However, we may provide them with aggregate statistical information about our visitors.</p>
<h3>
4. Storing Your Personal Data
</h3>
<p>4.1 We may transfer and store data that we collect from you to locations outside the UAE. It may also be processed by staff operating outside the UAE who work for us or one of our suppliers. For example, such staff may be involved in processing your orders, payment details, and providing support services. By submitting your personal data, you agree to this transfer, storage, and processing. We will take all necessary steps to ensure that your data is handled securely and in accordance with this Privacy Policy.</p>
<p>4.2 Data provided to us is stored on secure servers. All transactions entered into on our site are encrypted for your safety.</p>
<p>4.3 The transmission of information via the internet is not entirely secure. While we strive to protect your personal data, we cannot guarantee the security of data transmitted electronically, and any transmission is at your own risk. You are responsible for keeping any passwords associated with access to certain parts of our site confidential.</p>
<h3>
5. Disclosing Your Information
</h3>
<p>5.1 We may disclose your personal information to any member of our group, which includes our subsidiaries, our holding company, and its other subsidiaries (if any).</p>
<p>5.2 We may also disclose your personal information to third parties under the following circumstances:</p>
<p>5.2.1 If we sell any or all of our business and/or assets to a third party.</p>
<p>5.2.2 If we are legally required to disclose your information.</p>
<p>5.2.3 To help prevent fraud and minimize credit risk.</p>
<h3>6. Third-Party Links</h3>
<p>Our website may contain links to third-party websites. These websites have their own privacy policies, and you should review them. We do not accept any responsibility or liability for their policies as we have no control over them.</p>
<h3>7. Contacting Us</h3>
<p>If you have any questions, comments, or requests regarding this Privacy Policy, please feel free to contact us at info@rizqel.com.</p>

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