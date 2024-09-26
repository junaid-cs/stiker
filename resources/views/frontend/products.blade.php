@extends('../frontend/layout/main')

@section('content')
<style>
    .mt-124{
        margin-top: 122px;
    }

</style>
    <div class="w3l_banner_nav ">
        <div class="overlay_parent">
        @if (@$categorydata->banner)
        <img src="{{asset($categorydata->banner)}}" alt="" style="width:100%; max-height:370px; object-fit:cover; object-position: top">
        @else
        <img src="{{asset('../asset2/images/Dresses.png')}}" alt="" style="width:100%; max-height:370px; object-fit:cover; object-position: top;">

        @endif
        <!--<div class="cat_banner_overlay">-->
            
        <!--<h2>{{@$categorydata->name}}</h2>-->
            
        <!--</div>-->
</div>
        <!---728x90--->
        <!---728x90--->
        <livewire:all-products :category="@$category" :search="@$search" :subcat="@$subcategory"/>
    </div>
    <div class="clearfix"></div>
    <div class="w3l_banner_nav_right_banner3_btm">
            <div class="clearfix"> </div>
        </div>
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

    <script>
        function addtocart(productid,actualprice,totalprice) {
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
    </script>
@endsection
