<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rizqel</title>
    <style>
      #om-bmfrltdyrytgkiod0ppo-yesno{
	display: none !important;
}
    </style>

    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/">
    
    
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('../asset2/images/rizqel_fav.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('../assets/assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{asset('../assets/assets/vendor/fonts/fontawesome.css')}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('../assets/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('../assets/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('../assets/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('../assets/assets/css/demo.css')}}" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('../assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('../assets/assets/vendor/libs/typeahead-js/typeahead.css')}}" /> 
    <link rel="stylesheet" href="{{asset('../assets/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{asset('../assets/assets/vendor/css/pages/card-analytics.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('../assets/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('../assets/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('../assets/assets/js/config.js')}}"></script>
    <!-- Add this to your main layout or component -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<style>
 
</style>
</head>

<body>

@include('../admin/layout/sidebar')
@include('../admin/layout/header')


@yield('content')


@include('../admin/layout/footer')


 <!-- build:js assets/vendor/js/core.js -->
  
 <script src="{{asset('../assets/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('../assets/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('../assets/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('../assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('../assets/assets/vendor/libs/hammer/hammer.js')}}"></script>
  <script src="{{asset('../assets/assets/vendor/libs/i18n/i18n.js')}}"></script>
  <script src="{{asset('../assets/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
  <script src="{{asset('../assets/assets/vendor/js/menu.js')}}"></script>
  
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{asset('../assets/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

  <!-- Main JS -->
  <script src="{{asset('../assets/assets/js/main.js')}}"></script>
  

  <!-- Page JS -->
  <script src="{{asset('../assets/assets/js/app-ecommerce-dashboard.js')}}"></script>
  
    <!-- toastr links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>

<!-- beautify ignore:end -->
@yield('script')
