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
<h1>Product return policy</h1>
<p>Items shipped from fay.ae can be returned within 3 days of receipt of shipment in most cases subject
to each item category return rules. Some products have different policies or requirements
associated with them. Perfumes, cosmetics and other luxury items should not be open to avail
return option.</p>

<h2>Product refund policy</h2>
<p>rizqel.com items can take up to 3-6 days for an item to reach us once you return it. Once the item reaches our fulfillment center, allow for up to 3-5 business days for us to receive and process your return. After the return is processed it may take 7 to 15 business days for the refund to show up depending on the refund method. The amount will be refunded in Dirhams (UAE), and is according to the conversion rate at the time the refund was issued.</p>
<h2>Damaged or Defective policy</h2>
<p>Damaged products during shipping can only be exchanged for the same product; by sending it to Rizqqel Portal, Dubai. Shipping and credit card costs are non-refundable for undelivered, unclaimed or returned packages unless an error made by us. Any cost incurred to return the product/Products to us will not be refunded unless an error with your order made by us.</p>
<p>In the case of products which are delivered to you by signed-for delivery, you should inspect the products prior to signing for delivery. If you are not a consumer, we shall not be liable for any obvious damage or defects to products which would have been apparent on inspection at the point of delivery if you have signed for the delivery of the products without noting on the delivery paperwork that the products are “damaged”. If upon such inspection at the point of delivery you discover damage or defects to products you should either refuse delivery or clearly write “damaged” on the delivery paperwork which you are requested to sign.</p>
<p>Once delivered, the products ordered will become your responsibility and, except in relation to products that are damaged or faulty when delivered or have been incorrectly delivered, we will not accept any liability for their loss, damage or destruction after they have been delivered. We also accept no liability where you provide an incorrect delivery address or where you fail to collect the products from the delivery address which you specified.</p>
<h2>Availability of goods</h2>
<p>The site may contain information on the availability of goods. This information can be used that the product will be shipped after the order received successfully to the admin within 1-5 days period as mentioned by the vendor. As per Islamic sharia law, the vendor should have the possession of the products showed on the website to sale. However, Rizqel Portal management distinguished the store owners in to two groups. 1-The “Direct Owners” of the products who have the products in their possession what they displayed on rizqel.com website. 2-And the “Selling Agents” who are supposed to arrange products as per the order received. Selling agents must have to mention either on their store or each product that displayed products are not in their possession and they are not the direct owners. Customers should select “Cash on Delivery” option to buy goods from selling agents. But incase if they pay before delivery, then rizqel.com will not transfer customer’s paid amount to the vendor unless they arrange and deliver the goods to the customer. In rare cases, if the product may not be available when requested by the customer, the vendor will let you know by email or by phone call if this occurs.</p>
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