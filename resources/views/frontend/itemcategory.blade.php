@extends('category')
@section('category')
<div class="product-grid">

	

									<!-- Product 1 -->
									@foreach($category->subcategories as $sub)
										@foreach($sub->items as $item)
									 @php $photo=json_decode($item->photo,TRUE) 
           							 @endphp
           							 <a href="{{route('detail',$item->id)}}">
									<div class="product-item ">
										<div class="product discount product_filter">
											<div class="product_image">
												<img src="{{$photo[0]}}" alt="" style="height: 220px;">
											</div>
											<div class="favorite favorite_left"></div>
											<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>New </span></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.html">{{$item->name}}</a></h6>
												<div class="product_price"> @if($item->discount >0)
								                   {{number_format($item->price - $item->discount)}}MMK
								                    <span>{{number_format($item->price)}}MMK</span>
								                    @else
								                    {{number_format($item->price)}}MMK
								                    @endif
								                </div>
											</div>
										</div>
										<div class="red_button add_to_cart_button " >
						                <a href="javascript:" class="cartBtn" data-id=" <?= $item->id ?>" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}">add to cart</a>
						              </div>
									</div>
								</a>
								@endforeach
									@endforeach

								</div>
								@endsection