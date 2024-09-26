@extends('../admin/layout/main')



@section('content')
<div class="page-header">
    <div class="container-fluid my-3 d-flex justify-content-between align-items-center">
        <h1 class="fs-2">Orders</h1>
        <div class="pull-right">
            <a href="{{route('printpage',$orders->id)}}" target="_blank" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="Print Invoice"><i class="fa fa-print"></i></a>
             <a href="#" target="_blank" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="Print Shipping List"><i class="fa fa-truck"></i></a>
              <a href="#" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a> <a href="https://www.fishermens.co.uk/admin/index.php?route=sale/order&amp;user_token=vmhhvtkloSg5Gm6bKrxTLxMqsgCpn3V8" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="İptal"><i class="fa fa-reply"></i></a></div>
    </div>
    
  </div>



<div class="container-fluid ">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title fs-5 mb-0">
                        <i class="fa fa-shopping-cart"></i> Order Details</h3>
                </div>
                <table class="table bg-white mb-0">
                    <tbody>
                        <tr>
                            <td style="width: 1%;"><button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                    data-original-title="Store"><i class="fa fa-shopping-cart fa-fw"></i></button></td>
                            <td><a href="#" target="_blank">Rizqel</a></td>
                        </tr>
                        <tr>
                            <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                    data-original-title="Date Added"><i class="fa fa-calendar fa-fw"></i></button></td>
                            <td>{{$orders->created_at}}</td>
                        </tr>
                        <tr>
                            <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                    data-original-title="Payment Method"><i
                                        class="fa fa-credit-card fa-fw"></i></button></td>
                            <td>{{$orders->paymenttype}}</td>
                        </tr>


                    </tbody>

                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title fs-5 mb-0"><i class="fa fa-user"></i> Customer Details</h3>
                </div>
                <table class="table bg-white mb-0">
                    <tbody>
                        <tr>
                            <td style="width: 1%;"><button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                    data-original-title="Customer"><i class="fa fa-user fa-fw"></i></button></td>
                            <td> <a href="#"
                                    target="_blank">{{$orders->full_name}}</a> </td>
                        </tr>
                       
                        <tr>
                            <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                    data-original-title="E-Mail"><i class="fa fa-envelope fa-fw"></i></button></td>
                            <td><a href="mailto:youremail@gmail.com">{{$userdata->email}}</a></td>
                        </tr>
                        <tr>
                            <td><button data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                    data-original-title="Telephone"><i class="fa fa-phone fa-fw"></i></button></td>
                            <td>{{$orders->mobile_no}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title mb-0 fs-5"><i class="fa fa-cog"></i> Options</h3>
                </div>
                <table class="table bg-white mb-0">
                    <tbody>
                        <tr>
                            <td>Invoice</td>
                            <td id="invoice" class="text-right"></td>
                            <td style="width: 1%;" class="text-center"> <button id="button-invoice"
                                    data-loading-text="Loading..." data-toggle="tooltip" title=""
                                    class="btn btn-success btn-xs" data-original-title="Generate"><i
                                        class="fa fa-cog"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Reward Points</td>
                            <td class="text-right">0</td>
                            <td class="text-center"> <button disabled="disabled" class="btn btn-success btn-xs"><i
                                        class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>Affiliate
                            </td>
                            <td class="text-right">£0.00</td>
                            <td class="text-center"> <button disabled="disabled" class="btn btn-success btn-xs"><i
                                        class="fa fa-plus-circle"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title fs-5 mb-0"><i class="fa fa-info-circle"></i> Order (#{{$orders->id}})</h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td style="width: 50%;" class="text-left">Delivery Address</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-left">{{$orders->location}},{{$orders->city}}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td class="text-left">Product</td>
                        <td class="text-left">Category</td>
                        <td class="text-right">Quantity</td>
                        <td class="text-right">Unit Price</td>
                        <td class="text-right">Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suborders as $item)
                    <tr>
                        <td class="text-left"><a
                                href="#">{{$item->products->name}}</a> </td>
                        <td class="text-left">{{$item->products->category}}</td>
                        <td class="text-right">{{$item->qty}}</td>
                        <td class="text-right">{{$item->price}} AED</td>
                        <td class="text-right">{{$item->total}} AED</td>
                    </tr>
                    @endforeach
                 
                  
                    <tr>
                        <td colspan="4" class="text-end">Total</td>
                        <td class="">{{$orders->total_amount}} AED</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
 
</div>


@endsection