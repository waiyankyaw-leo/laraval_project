@extends('backend_master')
@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Categories</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Categories</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2>Order Detail</h2>

        <p>{{$order->codeno}} | {{$order->orderdate}} | {{$order->user->name}}</p>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Item Name</th>
              <th>Item Price</th>
              <th>Quantity</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            @php $i=1;$total=0; @endphp
            @foreach($order->items as $item)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->price}}</td>
              <td>{{$item->pivot->qty}}</td>
              <td>{{number_format(($item->price-$item->discount)*$item->pivot->qty)}}</td>
            </tr>
            @endforeach
            <tr>
              <td colspan="4">Total:</td>
              <td>{{number_format($order->total)}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
@endsection