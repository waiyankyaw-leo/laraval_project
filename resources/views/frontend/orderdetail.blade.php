@extends('master')
@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/styles/main_styles.css')}}">

@endsection

@section('content')
<div class="container " style="margin-top: 120px;">
   <div class="row">
   	<div class="col-4">
   		<p class="font-weight-bolder text-dark">Order Date: {{$orders->orderdate}}</p>
   	</div>
	<div class="col-4 offset-4 text-right">
   		<p class="font-weight-bolder text-dark">Order Number: {{$orders->codeno}}</p>
   	</div>
   </div>
  <table class="table text-center table-bordered table-responsive-lg" >
  <thead style="font-size: 16px;" >
    <tr class="">
       <th scope="col">#</th>
       <th scope="col">Item Name</th>
       <th scope="col">Qty</th>
       <th scope="col">Price</th>

    </tr>
  </thead>
  <tbody >
    
    @php $i=1; @endphp
           
          {{--  join with items table connected in mode --}}
           @foreach($orders->items as $order)
           	 <tr>
           	 	<td>{{ $i++}}</td>
           	 	<td>{{$order->name}}</td>

              {{-- pivot connect --}}
           	 	<td>{{$order->pivot->qty}}</td>
           	 	<td>{{number_format(($order->price-$order->discount)*$order->pivot->qty)}}</td>
           	 </tr>

           @endforeach
       		<tr>
           	 	<td colspan="3" class="font-weight-bold"> Total Price</td>
           	 	<td>{{number_format($orders->total)}}</td>
           	 </tr>

  </tbody>
</table>
  </div>

  @endsection