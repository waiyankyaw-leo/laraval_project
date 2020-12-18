@extends('backend_master')
@section('content')
    <main class="app-content">
    <div class="app-title ">
      <div>
        <h1><i class="fa fa-dashboard"></i> Orders Detail</h1>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('orders.index')}}">Orders </a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
          <div class="tile">
            <section class="invoice">
              <div class="row mb-4">
                <div class="col-12 ">
                  <h2 class="page-header text-left"><i class="fa fa-globe"></i> Code Shop</h2>
                </div>
                
              </div>
              <div class="row invoice-info">
                <div class="col-4">From
                  <address><strong>Code Shop</strong><br>518 Than Street<br>Hlaing Township<br>Yangon<br>Email: admin@gmail.com</address>
                </div>
                <div class="col-2 offset-1 ">To : <strong>{{$order->user->name}}</strong>
                  <address><strong></strong>Email: {{$order->user->email}}</address>
                </div>
                <div class="col-3 offset-2 "><b>Invoice Id:</b>{{$order->id}} <br><b>Order Date:</b> {{$order->orderdate}}<br><b>Order ID: </b>{{$order->codeno}}<br><b>Payment Due:</b> 2/22/2014<br><b>Account:</b> 968-34567</div>
              </div>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Product</th>                                         
                        <th>Codeno</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1;$total=0; @endphp
                    @foreach($order->items as $item)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->codeno}}</td>
                      <td>{{$item->pivot->qty}}</td>
                      <td>{{$item->price}}</td>
                      <td>{{number_format(($item->price-$item->discount)*$item->pivot->qty)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="5"><b>Total:</b></td>
                      <td>{{number_format($order->total)}}</td>
                    </tr>
                     
                   
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row d-print-none mt-2">
                <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
              </div>
            </section>
          </div>
        </div>
    </div>
  </main>
@endsection