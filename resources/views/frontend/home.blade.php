@extends('master')

@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/styles/main_styles.css')}}">
@endsection
@section('content')


  <div class="main_slider" style="background-image:url({{ asset('frontend_assets/images/slider_1.jpg')}})">
    <div class="container fill_height">
      <div class="row align-items-center fill_height">
        <div class="col">
          <div class="main_slider_content">
            <h6>Spring / Summer Collection 2017</h6>
            <h1>Get up to 30% Off New Arrivals</h1>
            <div class="red_button shop_now_button"><a href="#">shop now</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Banner -->

  <div class="banner">
    <div class="container">
      <div class="row">

        @foreach($categories as $category)
        <div class="col-md-4 px-3 my-3">
          <div class="banner_item align-items-center border" style="background-image:url({{$category->photo}})" >
            <div class="banner_category">
              <a href="{{route('itemcategory',$category->id)}}">{{$category->name}}</a>
            </div>
          </div>
        </div>
       @endforeach
      </div>
    </div>
  </div>

  <!-- New Arrivals -->

  <div class="new_arrivals">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="section_title new_arrivals_title">
            <h2>New Arrivals</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col text-center">
          <div class="new_arrivals_sorting">
            <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
              <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
              <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".Accessories">Accessories</li>
              <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".Clothes">Cloth</li>
              <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".Cosmetics">Cosmetics</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

            <!-- Product 1 -->
            @foreach($items as $item)
            @php $photo=json_decode($item->photo,TRUE) 
            @endphp
            <a href="{{route('detail',$item->id)}}">
            <div class="product-item {{$item->cname}} mt-4">
              <div class="product discount product_filter">
                <div class="product_image">
                  <img src="{{$photo[0]}}" alt="" style="height: 220px;">
                </div>
                <div class="favorite favorite_left"></div>
                <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
                <div class="product_info">
                  <h6 class="product_name"><a href="{{route('detail',$item->id)}}">{{$item->name}}</a></h6>
                  <div class="product_price">
                    @if($item->discount >0)
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
           

           
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <!-- Best Sellers -->

  <div class="best_sellers">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="section_title new_arrivals_title">
            <h2>Best Sellers</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="product_slider_container">
            <div class="owl-carousel owl-theme product_slider">

              <!-- Slide 1 -->
               @foreach($items as $item)
              @php $photo=json_decode($item->photo,TRUE) 
              @endphp
              
              <div class="owl-item product_slider_item">
                <div class="product-item">
                  <a href="{{route('detail',$item->id)}}">
                  <div class="product discount">
                    <div class="product_image">
                      <img src="{{$photo[0]}}" alt="" style="height: 200px;">
                    </div>
                    <div class="favorite favorite_left"></div>
                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>Hot</span></div>
                    <div class="product_info">
                      <h6 class="product_name"><a href="{{route('detail',$item->id)}}">{{$item->name}}</a></h6>
                      <div class="product_price">
                        @if($item->discount >0)
                   {{number_format($item->price - $item->discount)}}MMK
                    <span>{{number_format($item->price)}}MMK</span>
                    @else
                    {{number_format($item->price)}}MMK
                    @endif
                      </div>
                      
                    </div>
                    <div class="red_button add_to_cart_button mt-3 "><a href="javascript:" class="cartBtn" data-id=" <?= $item->id ?>" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}" data-discount="{{$item->discount}}">add to cart</a></div>
                  </div>
                  </a>
                </div>
              </div>
            
              @endforeach
             
            </div>

            <!-- Slider Navigation -->

            <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
              <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </div>
            <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
              <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Discount -->

  <div class="best_sellers">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="section_title new_arrivals_title">
            <h2>Discount Items</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="product_slider_container">
            <div class="owl-carousel owl-theme product_slider">

              <!-- Slide 1 -->
               @foreach($discounts as $discount)
              @php $photo=json_decode($discount->photo,TRUE) 
              @endphp

              <div class="owl-item product_slider_item">
                <div class="product-item">
                  <a href="{{route('detail',$discount->id)}}">
                  <div class="product discount">
                    <div class="product_image">
                      <img src="{{$photo[0]}}" alt="" style="height: 200px;">
                    </div>
                    <div class="favorite favorite_left"></div>
                    <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>Hot</span></div>
                    <div class="product_info">
                      <h6 class="product_name"><a href="single.html">{{$discount->name}}</a></h6>
                      <div class="product_price">
                        @if($discount->discount >0)
                   {{number_format($discount->price - $discount->discount)}}MMK
                    <span>{{number_format($discount->price)}}MMK</span>
                    @else
                    {{number_format($discount->price)}}MMK
                    @endif
                      </div>
                      
                    </div>
                    <div class="red_button add_to_cart_button mt-3 "><a href="javascript:" class="cartBtn" data-id=" <?= $discount->id ?>" data-name="{{$discount->name}}" data-codeno="{{$discount->codeno}}" data-photo="{{$discount->photo}}" data-price="{{$discount->price}}" data-discount="{{$discount->discount}}">add to cart</a></div>
                  </div>
                  </a>
                </div>
              </div>
              @endforeach
             

              
            </div>

            <!-- Slider Navigation -->

            <div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
              <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </div>
            <div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
              <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection