@extends('backend_master')
@section('content')



 <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Orders</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Orders</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <h2 class="d-inline-block">Order List</h2>
            
            <div class="table-responsive">
              <table class="table table-hover table-bordered mt-3" id="sampleTable">
                <thead class="thead-dark">
                  <tr>
                     <th scope="col">#</th>
				       <th scope="col">Codeno</th>
				       <th scope="col">Order Date</th>
				       <th scope="col">Total</th>
				       <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i= 1; @endphp             
                  	@foreach($orders as $order)
                  	  <tr>
			              <td>{{$i++}}</td>
			              <td>{{$order->codeno}}</td>
			              <td>{{$order->orderdate}}</td>
			              <td>{{number_format($order->total)}}</td>
			              <td>
			                @if($order->status == 0)
			                  <a href="{{route('orders.confirm',$order->id)}}" class="btn btn-info btn-sm" onclick="return confirm('Are you sure ?')">Confirm</a>
			                @else
			                  <a href="#" class="btn btn-success btn-sm">Success</a>
			                @endif

                      <a href="{{route('orders.show',$order->id)}}" class="btn btn-success btn-sm">Details
			              </td>
			            </tr>

                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>




@endsection

@section('script')
  <script type="text/javascript" src="{{ asset('backend_assets/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('backend_assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection