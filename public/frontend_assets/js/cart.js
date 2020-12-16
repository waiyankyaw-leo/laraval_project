$(document).ready(function(){

	cartNoti();
	showItem();
	showTotal();
	$('.cartBtn').on('click', function(){
		// console.log('abc');
		var id = $(this).data('id');
		var name = $(this).data('name');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		var photo = $(this).data('photo');
		var codeno = $(this).data('codeno');
		var qty = 1;


		var mylist ={
			id:id, 
			name:name,
			codeno:codeno,
			qty:qty, 
			price:price, 
			discount:discount,
			photo:photo
		}
        
        // console.log(mylist);
		var cart = localStorage.getItem('cart');
		var cartArray;

		if (cart == null) {
			cartArray = Array();
		}else{
			cartArray = JSON.parse(cart);
		}

		var status = false;


		$.each(cartArray, function(i,v){
			if (id == v.id) {
				v.qty++;
				status = true;
			}
		})


		if (!status) {
			cartArray.push(mylist);
		}



		var cartData = JSON.stringify(cartArray);
		localStorage.setItem('cart',cartData);

		cartNoti();

	});

	function cartNoti(){
		var cart = localStorage.getItem('cart');

		if (cart) {
			var cartArray = JSON.parse(cart);

			var totalAmount=0;
			var notiCount=0;

			$.each(cartArray, function(i,v){
				var unitprice = v.price;
				var discount = v.discount;
				var qty = v.qty;

				if (discount) {
					var price = (unitprice-discount) * qty;
				}else{
					var price = unitprice * qty;
				}

				totalAmount += price++;
				notiCount += qty++;
			})

			$('.cartNoti').html(notiCount);
			$('.cartAmount').html(new Intl.NumberFormat().format(totalAmount)+' Ks');

		}

		else{

			$('.cartNoti').html(0);
			$('.cartAmount').html(0+' Ks');

		}
	}

	function showItem(){
      var cartlist=localStorage.getItem("cart");
      if(cartlist)
      {
        var tmp="";
        var itemArray=JSON.parse(cartlist);

        var j=1;
        var temp=0;
        $.each(itemArray,function(i,v){

        
          tmp+=` <tr >
				      <th scope="row" class="align-middle">${j++}</th>
				      <td class="d-flex text-left"><img src="${v.photo[0]}" alt="" style="width: 100px;height: 100px;">
				        <div class="py-4">
				          <h5 class="ml-3">${v.name}</h5>
				          <h6 class="ml-3">Item Code: ${v.codeno}</h6>
				       </div>
				      </td>
				      <td style="font-size: 16px;" class="text-danger align-middle">${new Intl.NumberFormat().format(v.price-v.discount)}</td>
				      <td class="align-middle">
				        <div class="d-inline">
				        <button class="btn btn-light rounded-circle" data-id="${i}" id="btnincrease">
				          <i class="fas fa-plus"></i>
				        </button>
				        <span>${v.qty}</span>
				        <button class="btn btn-light rounded-circle" data-id="${i}" id="btndecrease">
				          <i class="fas fa-minus"></i>
				        </button>
				      </div>
				      </td>
				      <td style="font-size: 16px;" class="text-danger align-middle">
				        ${new Intl.NumberFormat().format((v.price-v.discount)*v.qty)}
				      </td>
				      <td class="align-middle">
				        <button class="btn btn-light rounded-circle" data-id="${i}" id="delete" ><i class="fas fa-times"></i></button>

				      </td>
				    </tr>`
        
      })
        //console.log(tmp);
        $(".tbody").html(tmp);
      }
    }

    $(".tbody").on('click','#delete',function(){
    	
         var id=$(this).data("id");
         
         var cartList=localStorage.getItem("cart");
         var cartArr=JSON.parse(cartList);
         cartArr.splice(id,1);
         var stringCart=JSON.stringify(cartArr);
         localStorage.setItem("cart",stringCart);
         showItem();
         cartNoti();
         showTotal();
         
      })

    $(".tbody").on('click','#btndecrease',function(){
        var id=$(this).data("id");
        //console.log(id);
        var cartList=localStorage.getItem("cart");
        if(cartList){
          var  cartArray=JSON.parse(cartList);
          $.each(cartArray,function(i,v){
          	//console.log(i);
                  if(i==id){
                  	//console.log("abc");
                    v.qty--;
                    if(v.qty==0){
                      cartArray.splice(id,1);
                    }
                  }
                })
          var cartString=JSON.stringify(cartArray);
          localStorage.setItem("cart",cartString);
          cartNoti();
          showItem();
          showTotal();
        }
      })
    
    $(".tbody").on('click','#btnincrease',function(){
        var id=$(this).data("id");
        // console.log(id);
        var cartList=localStorage.getItem("cart");
        if(cartList){
          var  cartArray=JSON.parse(cartList);
          $.each(cartArray,function(i,v){
                  if(i==id){
                    v.qty++;
                    if(v.qty==0){
                      cartArray.splice(id,1);
                    }
                  }
                })
          var cartString=JSON.stringify(cartArray);
          localStorage.setItem("cart",cartString);
          cartNoti();
          showItem();
          showTotal();
        }
      })

 	function showTotal(){
      	var cartlist=localStorage.getItem("cart");
      	var total=0;
      	if(cartlist){
      		
      		var cartArray=JSON.parse(cartlist);
      		$.each(cartArray,function(i,v){

      		total += (v.price-v.discount)*v.qty;	
      		})
      		
      		var tmp=`${new Intl.NumberFormat().format(total)} MMK`;
      		$('.subtotal').html(tmp);
      		$('.total').html(tmp);
      	}
    }

    $('.detailbtn').on('click', function(){
		// console.log('abc');
		var qty=$('.qty').text();
		
		var qty= parseInt(qty);
		var id = $(this).data('id');
		var name = $(this).data('name');
		var price = $(this).data('price');
		var discount = $(this).data('discount');
		var photo = $(this).data('photo');
		var codeno = $(this).data('codeno');

		var mylist ={
			id:id, 
			name:name,
			codeno:codeno,
			qty:qty, 
			price:price, 
			discount:discount,
			photo:photo
		}
		var cart = localStorage.getItem('cart');
		var cartArray;

		if (cart == null) {
			cartArray = Array();
		}else{
			cartArray = JSON.parse(cart);
		}

		var status = false;
		$.each(cartArray, function(i,v){
			if (id == v.id) {
				v.qty+=qty;
				status = true;
			}
		})


		if (!status) {
			cartArray.push(mylist);
		}



		var cartData = JSON.stringify(cartArray);
		localStorage.setItem('cart',cartData);

		cartNoti();
	});

});