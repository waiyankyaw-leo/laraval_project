@extends('master')
@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/styles/main_styles.css')}}">

@endsection
@section('content')




<div class="jumbotron jumbotron-fluid subtitle bg-danger " style="margin-top: 100px;">
  		<div class="container">
    		<h2 class="text-center text-white"> Order Received </h2>
  		</div>
	</div>

	<!-- Content -->
	<div class="container my-5">

		<div class="row justify-content-center">
			<div class="col-10 shadow p-3 mb-5 bg-white rounded">
				<div class="row">
					<div class="col-4">
						<img src="{{asset('frontend_assets/images/success-tick-dribbble.gif')}}" class="img-fluid">
					</div>
					<div class="col-8 pt-5">
						<h2> Your order is complete </h2>
						<p> You order will be delivered in 4 days. </p>
					</div>
					
				</div>
				
			</div>
			<div class="col-12 ">
						<a href="{{route('home')}}" class="btn btn-danger">Continue Shopping</a>
					</div>
		</div>
	</div>

	@endsection