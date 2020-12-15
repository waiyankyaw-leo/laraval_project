@extends('master')
@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/styles/main_styles.css')}}">

@endsection

@section('content')
<div class="container " style="margin-top: 120px;">
      
  <table class="table text-center table-bordered table-responsive-lg" >
  <thead style="font-size: 20px;" >
    <tr class="">
       <th scope="col">#</th>
       <th scope="col">Codeno</th>
       <th scope="col">Order Date</th>
       <th scope="col">Total</th>
       <th scope="col">Detail</th>
       <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody >
    
    @php $i=1; @endphp
            @foreach($orders as $order)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$order->codeno}}</td>
              <td>{{$order->orderdate}}</td>
              <td>{{number_format($order->total)}}</td>
              <td><a href="{{route('orderdetail',$order->id)}}" class="btn btn-success">Details</td>
              <td>
                @if($order->status == 0)
                  <a href="#" class="btn btn-info btn-sm">Pending</a>
                @else
                  <a href="#" class="btn btn-success btn-sm">Confirm</a>
                @endif
              </td>
            </tr>
          @endforeach
  </tbody>
</table>
  </div>

  @endsection