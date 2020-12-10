@extends('backend_master')
@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Items</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('items.index')}}">Items</a></li>
      </ul>
    </div>
    
    <div class="row">
      
      <div class="col-md-5">
         @php $photo=json_decode($item->photo,TRUE) 
         @endphp      
        <img src="{{ $photo[0]}}" class="w-100" style="height:300px;" >
      </div>
      <div class="col-md-4 text-left" style="font-size: 16px;" >
        <h2 style="text-align: left">{{$item->name}}</h2>
        <span style="font-weight: bolder;" style="font-size: 18">Item Code :</span>
        <span>{{$item->codeno}}</span>
        <br class="mb-2">
          <span class="text-uppercase " style="font-weight: bolder;"> Brand : </span>
          <span class="ml-3"> <a href="" class="text-decoration-none text-black-50"> {{$item->brand->name}} </a> </span><br class="mb-2">
          <span class="text-uppercase " style="font-weight: bolder;"> Current Price : </span> 
                     @if($item->discount > 0)
                    <span>{{$item->price - $item->discount}}Ks<span>
                      <small><strike>{{$item->price}}Ks</strike></small></td>
                    @else
                    <span>{{$item->price}}Ks</span>
                    @endif
                 <br class="mb-2">
          <span style="font-weight: bolder;">Description :</span>
        <span>{!!$item->description!!}</span>
        <br class="mb-2">
        <div class="star-rating">
                  <ul class="list-inline">
                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                    <li class="list-inline-item"><i class="fas fa-star"></i></li>
                    <li class="list-inline-item"><i class="far fa-star"></i></li>
                    <li class="list-inline-item"><i class="far fa-star"></i></li>
                  </ul>
              </div>
      </div>
    </div>
    <div class="carousel col-5">
      @foreach($photo as $row)
  <div class="carousel-cell">
    
    <img src="{{ $row}}" style="height: 100px;width: 200px;" />
    
  </div>
  @endforeach
</div>



  </main>
@endsection