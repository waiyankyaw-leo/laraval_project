@extends('master')

@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/styles/responsive.css')}}">
<link rel="stylesheet" href="{{ asset( 'frontend_assets/plugins/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/styles/single_styles.css')}}" >
@endsection
@section('content')

<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="categories.html"><i class="fa fa-angle-right" aria-hidden="true"></i>details</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Single Product</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									@php $photo=json_decode($item->photo) 
                    				@endphp
									@foreach($photo as $row )							
									<li><img src="{{ $row}}" alt="" data-image="{{$row}}" style="width: 136px;height: 136px;"></li>
									@endforeach
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background border-dark border" style="background-image:url({{$photo[0]}});">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2>{{$item->name}}</h2>
						<p>{!!$item->description!!}</p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>free delivery</span>
					</div>
					@if($item->discount >0)
					<div class="original_price">{{number_format($item->price)}}MMK</div>
					<div class="product_price">{{number_format($item->price - $item->discount)}}MMK</div>
					@else
					<div class="product_price">{{number_format($item->price - $item->discount)}}MMK</div>
					@endif
					<ul class="star_rating">
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star" aria-hidden="true"></i></li>
						<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
					</ul>
					<div class="product_color">
						<span>Select Color:</span>
						<ul>
							<li style="background: #e54e5d"></li>
							<li style="background: #252525"></li>
							<li style="background: #60b3f3"></li>
						</ul>
					</div>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						<div class="quantity_selector">
							<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<span id="quantity_value" class="qty">1</span>
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>
						<div class="red_button add_to_cart_button"><a href="javascript:" class="detailbtn"data-id=" {{ $item->id}} " data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}">add to cart</a></div>
						<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
					</div>
				</div>
			</div>
		</div>
		{{-- <h1>{{ $item->subcategory->items}}</h2> --}}

		<div class="row mt-5">
			<div class="col-12">
				<h3> Related Item </h3>
				<hr>
			</div>
						@foreach($related_items as $related_item)

			@if($related_item->subcategory_id == $item->subcategory_id && $item->id != $related_item->id )
			@php
				$photo=json_decode($related_item->photo)
			@endphp
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
				<a href="{{route('detail',$related_item->id)}}" class="text-decoration-none text-dark">
					<img src="{{$photo[0]}}" class="img-fluid mx-3">
					<span class="text-center d-block">{{ $related_item->name}}</span>
				</a>
			</div>
			@endif
			@endforeach
			

			
		</div>

	</div>


@endsection

@section('script')

<script src="{{ asset('frontend_assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{ asset('frontend_assets/js/single_custom.js')}}"></script>


@endsection