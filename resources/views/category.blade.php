@extends('master')

@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/categories_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/styles/categories_responsive.css')}}">
@endsection
@section('content')
<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="{{ route('home')}}">Home</a></li>
						<li class="active"><a href="{{route('category')}}"><i class="fas fa-long-arrow-alt-right"></i>Shop</a></li>
					</ul>
				</div>

				<!-- Sidebar -->

				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Product Category</h5>
						</div>
						<ul class="sidebar_categories">
							<li class="{{Request::routeIs('category')? 'active' : '' }} "><a href="{{route('category')}}" >All</a></li>
							<x-item-component></x-item-component>
						</ul>
					</div>
					


				</div>


				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Default Sorting</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
											</ul>
										</li>
										{{-- <li>
											<span>Show</span>
											<span class="num_sorting_text">6</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>6</span></li>
												<li class="num_sorting_btn"><span>12</span></li>
												<li class="num_sorting_btn"><span>24</span></li>
												
											</ul>
										</li> --}}
									</ul>
									

								</div>

								<!-- Product Grid -->

							@yield('category')

								<!-- Product Sorting -->

							

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
@endsection

@section('script')
<script src="{{ asset('frontend_assets/js/categories_custom.js')}}"></script>
@endsection