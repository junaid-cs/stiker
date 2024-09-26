<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rizqel Invoice</title>
<link rel="stylesheet" href="{{asset('../assets/assets/css/printpage.css')}}" />
</head>
<body>
    
 <div class="invoice">
        <h2>Ship To:</h2>
        <p><strong>{{$userdata->name}}</strong><br>{{$orders->location}}</p>

        <div class="order-info">
            <p><strong>Order ID:</strong> {{$orders->id}}</p>
            <p>Thank you for buying from Rizqel Marketplace.</p>
        </div>

        <div class="shipping-details">
            <div>
                <p><strong>Shipping Address:</strong></p>
                <p>{{$orders->location}}</p>
            </div>
            <div>
                <p><strong>Order Date:</strong>{{ date('D, M j, Y', strtotime($userdata->created_at)) }}</p>
                <p><strong>Shipping Service:</strong> Standard</p>
            </div>
            <div>
                <p><strong>Buyer Name:</strong> {{$userdata->name}}</p>
                <p><strong>Seller Name:</strong> Rizqel</p>
            </div>
        </div>

        <table class="product-table">
            <thead>
                <tr>
                    <th>Quantity</th>
                    <th>Product Details</th>
                    <th>Item Price</th>
                </tr>
            </thead>
            <tbody>
                
             @foreach ($suborders as $item)
                <tr>
                    <td>{{$item->qty}}</td>
                    <td>
                       {{$item->products->title}} <br><br>
                        <!--ASIN: B08LG8SMR5<br>-->
                        Order Item ID: {{$item->products->id}}
                    </td>
                    <td>AED {{ number_format($item->total, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="totals">
            <div class="subtotal">
                <p>Item subtotal</p>
                <p>AED {{number_format($orders->total_amount, 2)}}</p>
            </div>
            <div class="shipping">
                <p>Shipping total</p>
                <p>AED 0.00</p>
            </div>
            <div class="item-total">
                <p>Item total</p>
                <p>AED {{number_format($orders->total_amount, 2)}}</p>
            </div>
        </div>

        <h3>Grand total: AED {{number_format($orders->total_amount, 2)}}</h3>

        <div class="footer">
            <p>Thanks for buying on Rizqel Marketplace. To provide feedback for the seller, please visit: <a href="https://rizqel.com/orderslist">www.rizqel.com</a></p>
         
        </div>
    </div>
    
    
<!--<div class="row expanded">-->
<!--  <main class="columns">-->
<!--    <div class="inner-container">-->
<!--    <section class="row aaaa">-->
<!--      <div class="callout large invoice-container">-->
<!--        <a href="{{route('orderview')}}">Back</a>-->
<!--        <table class="invoice">-->
<!--               <tr class="intro">-->
<!--            <td class="">-->
<!--              Hello, {{$userdata->name}}.<br>-->
<!--              Thank you for your order.-->
<!--            </td>-->
<!--            <td class="text-right">-->
<!--              <span class="num">Order #{{$orders->id}}</span><br>-->
<!--              {{$orders->created_at}}-->
<!--            </td>-->
<!--          </tr>-->
<!--          <tr class="details">-->
<!--            <td colspan="2">-->
<!--              <table>-->
<!--                <thead>-->
<!--                  <tr>-->
<!--                    <th class="desc">Item Name</th>-->
<!--                    <th class="id">Item ID</th>-->
<!--                    <th class="qty">Quantity</th>-->
<!--                    <th class="amt">Subtotal</th>-->
<!--                  </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                  @foreach ($suborders as $item)-->
<!--                  <tr class="item">-->
<!--                    <td class="desc">{{$item->products->name}}</td>-->
<!--                    <td class="id num">{{$item->products->id}}</td>-->
<!--                    <td class="qty">{{$item->qty}}</td>-->
<!--                    <td class="amt">{{$item->total}}</td>-->
<!--                  </tr>   -->
<!--                  @endforeach-->
                 
<!--                </tbody>-->
<!--              </table>-->
<!--            </td> -->
<!--          </tr>-->
<!--          <tr class="totals">-->
<!--            <td></td>-->
<!--            <td>-->
<!--              <table>-->
  
<!--                </tr>-->
<!--                <tr class="total">-->
<!--                  <td>Total</td>-->
<!--                  <td>AED{{$orders->total_amount}}</td>-->
<!--                </tr>-->
<!--              </table>-->
<!--            </td>-->
<!--          </tr>-->
<!--        </table>-->
        
<!--        <section class="additional-info">-->
<!--        <div class="row">-->
<!--          <div class="columns">-->
<!--            <h5>Billing Information</h5>-->
<!--            <p>{{$orders->location}}<br>-->
<!--              {{$orders->city}}<br>-->
<!--             </p>-->
<!--          </div>-->
<!--          <div class="columns">-->
<!--            <h5>Payment Information</h5>-->
<!--            <p>{{$orders->paymenttype}}-->
<!--              </p>-->
<!--          </div>-->
<!--        </div>-->
<!--        </section>-->
    
<!--        <table class="invoice">-->
<!--          <tr class="details">-->
<!--            <td colspan="2">-->
<!--              <table>-->
<!--                <thead>-->
<!--                  <tr>-->
<!--                    <th class="desc">Customer Name</th>-->
<!--                    <th class="id">Customer Email</th>-->
<!--                    <th class="amt">Customer Mobile</th>-->
<!--                    <th class="qty">Customer Address</th>-->
<!--                  </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
              
<!--                  <tr class="item">-->
<!--                    <td class="desc">{{$userdata->name}}</td>-->
<!--                    <td class="id num">{{$userdata->email}}</td>-->
<!--                    <td class="qty">{{$orders->mobile_no}}</td>-->
<!--                    <td class="amt">{{$orders->location}}</td>-->
<!--                  </tr>   -->
               
                 
<!--                </tbody>-->
<!--              </table>-->
<!--            </td> -->
<!--          </tr>-->
        
<!--        </table>-->
<!--      </div>-->
<!--    </section>-->
<!--    </div>-->
<!--  </main>-->
<!--</div>-->
<script>
  // JavaScript code to print the page when it loads
  window.onload = function() {
    window.print();
 
  }
  window.addEventListener('afterprint', function() {
    // window.close();
    window.location.href = "{{route('orderview')}}";

  });
</script>
</body>
</html>
