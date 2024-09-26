
  <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  
  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">

<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme ">

  
  <div class="app-brand demo  bg-dark">
    <a href="{{route('index')}}" class="app-brand-link">
      <span class="app-brand-logo demo">

</span>
      <span class=" fw-bold ms-2"><img src="{{asset('../asset2/images/logo-3.png')}}" style="width:150px;">
</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle" style="background-color:green;"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  
  
  <ul class="menu-inner py-1">
    <!-- Dashboards -->
   
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
      </a>
      <ul class="menu-sub">
        @can('Admins')
      <li class="menu-item">
          <a href="{{route('admin')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">Admins</div>
          </a>
        </li>
        @endcan
        @can('Users')
        <li class="menu-item">
          <a href="{{route('user')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">Users</div>
          </a>
        </li>
        @endcan
        @can('Roles')
        <li class="menu-item">
          <a href="{{route('role')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">Roles</div>
          </a>
        </li>
        @endcan
        @can('Permissions')
        <li class="menu-item">
          <a href="{{route('permissions')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">Permissions</div>
          </a>
        </li>
        @endcan
      </ul>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
        <div class="text-truncate" data-i18n="Dashboards">Banner</div>
      </a>
      <ul class="menu-sub">
      <li class="menu-item">
          <a href="{{route('Banner')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">View Banner</div>
          </a>
        </li>
      </ul>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-category"></i>
        <div class="text-truncate" data-i18n="Dashboards">Categories</div>
      </a>
      <ul class="menu-sub">
        @can('View Categories')
      <li class="menu-item">
          <a href="{{route('category')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">View Categories</div>
          </a>
        </li>
        @endcan
        @can('Sub Categories')
        <li class="menu-item">
          <a href="{{route('subcategory')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">Sub Categories</div>
          </a>
        </li>
        @endcan
      </ul>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-box"></i>
        <div class="text-truncate" data-i18n="Dashboards">Products</div>
      </a>
      <ul class="menu-sub">
        @can('View Products')
      <li class="menu-item">
          <a href="{{route('products')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">View Products</div>
          </a>
        </li>
       @endcan
      </ul>
    </li>
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
        <div class="text-truncate" data-i18n="Dashboards">Orders</div>
      </a>
      <ul class="menu-sub">
        @can('View Order')
      <li class="menu-item">
          <a href="{{route('orderview')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">View Orders</div>
          </a>
        </li>
       @endcan
      </ul>
    </li>

    
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
        <div class="text-truncate" data-i18n="Dashboards">Sub Order</div>
      </a>
      <ul class="menu-sub">
        @can('View Sub Orders')
      <li class="menu-item">
          <a href="{{route('sub_order')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">View Sub_Orders</div>
          </a>
        </li>
       @endcan
      </ul>
    </li>

    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-envelope"></i>
        <div class="text-truncate" data-i18n="Dashboards">Contact Us</div>
      </a>
      <ul class="menu-sub">
        @can('View Contact')
      <li class="menu-item">
          <a href="{{route('view_contact')}}" class="menu-link">
            <div class="text-truncate" data-i18n="Analytics">View Contact</div>
          </a>
        </li>
        @endcan
       
      </ul>
    </li>
    <!-- Layouts -->
   
   

  </ul>
  
  

</aside>
<!-- / Menu -->