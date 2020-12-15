@extends('master')

@section('link')
<link rel="stylesheet" type="text/css" href="{{ asset( 'frontend_assets/styles/main_styles.css')}}">

@endsection
@section('content')

  <div class="container " style="margin-top: 120px;">
      
  <table class="table text-center border-top table-responsive-lg" >
  <thead style="font-size: 20px;" >
    <tr class="">
      <th scope="col">No</th>
      <th scope="col" class="text-left">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody  class="tbody">
    
  </tbody>
</table>
  </div>
  <div class="container mt-5"> 
    <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                      <a href="{{ route('home')}}">
                            <button type="submit" class="btn ">Continue Shopping</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 bg-light">
                    <div class=" m-4">
                        <h4>Cart total</h4>
                        <table class="table">
                          <tr>
                            <td>Subtotal:</td>
                            <td align="right"><h4 class="subtotal ">0</h4></td>
                          </tr>
                          <tr >
                            <td>Total:</td>
                            <td align="right"><h4 class="total ">0</h4></td>
                          </tr>
                        </table>
                        @auth
                        <button class="btn btn-danger rounded-pill mt-3 checkout">Proceed to Checkout</button>
                        @else
                        <a href="{{route('login')}}" class="btn btn-danger rounded-pill mt-3 checkout">Login to Checkout</a>
                        @endauth
                    </div>
                </div>
            </div>
  </div>





  @endsection

  @section('script')

  <script type="text/javascript">
    $(document).ready(function(){
       $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
     })

      $('.checkout').click(function(){

        let ls=localStorage.getItem('cart');

        if(ls !==null){
       let total = JSON.parse(ls).reduce((acc, item) => acc + ((item.price-item.discount)*item.qty), 0);

        //console.log(ls);
        //console.log(total);
        $.post("{{route('orders.store')}}",{ls:ls,total:total},function (response) {
          localStorage.clear();
          location.reload(); 
          location.href = "{{ route('success')}}"
        })
      }
      else{
        location.href = "{{ route('cart')}}"
      }
      })
    });
  </script>
  @endsection


