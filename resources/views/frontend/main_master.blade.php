<!DOCTYPE html>
  <html lang="en">

<head>

  @php
    $seo = App\Models\Seo::find(1);
  @endphp

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="description" content="{{ $seo->meta_description }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="{{ $seo->meta_author }}">
  <meta name="keywords" content="{{ $seo->meta_keyword }}">
  <meta name="robots" content="all">
  <script>
    {{ $seo->google_analytics }}
  </script>
  <title>@yield('title')</title>

  <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

  <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css')}}">
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script src="https://js.stripe.com/v3/"></script>
  
</head>

<body class="cnt-home">

  @include('frontend.body.header')

  @yield('content')

  @include('frontend.body.footer')

  <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
  <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
  <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
  <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
  <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
  <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
  <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
  <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
  <script type="{{ asset('frontend/text/javascript" src="assets/js/lightbox.min.js') }}"></script> 
  <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
  <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
  <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

		<script>
			@if(Session::has('message'))
				var type = "{{ Session::get('alert-type', 'info') }}"
				switch(type){

					case 'info':
					toastr.info("{{ Session::get('message') }}");
					break;

					case 'success':
					toastr.success("{{ Session::get('message') }}");
					break;

					case 'warning':
					toastr.warning("{{ Session::get('message') }}");
					break;

					case 'error':
					toastr.error("{{ Session::get('message') }}");
					break;
				}
			@endif
		</script>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <strong>
              <span id="name"></span>
            </strong>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" width="200" height="200" id="image">
              </div>
            </div>
            <div class="col-md-4">
              <ul class="list-group">
                <li class="list-group-item"> 
                  Price 
                  <strong class="text-danger">
                    $<span id="price"></span>  
                  </strong> 
                  <del id="oldprice">$</del>
                </li>
                <li class="list-group-item">
                   Code 
                   <strong id="code"></strong>
                </li>
                <li class="list-group-item">
                   Category
                  <strong id="category"></strong>
                </li>
                <li class="list-group-item"> 
                  Brand
                  <strong id="brand"></strong> 
                </li>
                <li class="list-group-item"> 
                  Stock 
                  <span class="badge badge-pill badge-success" id="available" style="background: green; color: white;"></span> 
                  <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span> 
                </li>
              </ul>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="color">Choose Color</label>
                <select class="form-control" id="color" name="color">
                </select>
              </div>
              <div class="form-group" id="sizeArea">
                <label for="size">Choose Size</label>
                <select class="form-control" id="size" name="size">
                </select>
              </div>
              <div class="form-group">
                <label for="qty">Qty</label>
                <input type="number" class="form-control" id="qty" value="1" min="1">
              </div>
              <div class="form-group">
                <input type="hidden" id="product_id">
              </div>
              <div class="form-group">
                <button type="submit" class="form-control btn btn-primary mb-2" onclick="addToCart()">
                  Add to Cart
                </button>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
    })

    function productReview(id){
      $.ajax({
        type : 'GET',
        url : '/product/modal/' + id,
        dataType : 'json',
        success : function (data){
          $('#image').attr('src', '/' + data.product.thumbnail);          
          $('#name').text(data.product.name);
          $('#price').text(data.product.price);
          $('#code').text(data.product.code);
          $('#category').text(data.product.category.name);
          $('#brand').text(data.product.brand.name);  
          $('select[name="color"]').empty();
          $('#product_id').val(id);
          $('#qty').val(1);
          $.each(data.color, function(key, value){
            $('select[name="color"]').append('<option value=" '+value+' ">'+value+'</option>')
          })
          $('select[name="size"]').empty();
          $.each(data.size, function(key, value){
            $('select[name="size"]').append('<option value=" '+value+' ">'+value+'</option>')
              if(data.size == "") {
                $('#sizeArea').hide();
              }else{
                $('#sizeArea').show();
              }
          })
          if(data.product.discount == null) {
            $('#price').text('')                  
            $('#oldprice').text('')                  
            $('#price').text(data.product.price)
          }else{
            $('#price').text(data.product.discount)
            $('#oldprice').text(data.product.price)
          }
          if(data.product.qty > 0) {
            $('#available').text('');
            $('#stockout').text('');
            $('#available').text('available');
          }else{
            $('#available').text('');            
            $('#stockout').text('');
            $('#stockout').text('stockout');
          }
        }
      })
    }

    function addToCart(){
      var name = $('#name').text();
      var id = $('#product_id').val();
      var color = $('#color option:selected').text();
      var size = $('#size option:selected').text();
      var quantity = $('#qty').val();
      $.ajax({
        type : 'POST',
        dataType : 'json',
        data : {
          color : color, size : size, quantity:quantity, name:name
        },
        url : '/product/mini/cart-store/'+ id,
        success : function(data){
          miniCart()
          $('#closeModal').click();

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
            })

            if($.isEmptyObject(data.error)){
              Toast.fire({
                type: 'success',
                title: data.success
              })
            }else{
              Toast.fire({
                type: 'error',
                title: data.error
              })
            }

        }
      })
    }

  </script>

  <script type="text/javascript">

    function miniCart(){
      $.ajax({
        type: 'GET',
        url: '/product/mini/cart',
        dataType: 'json',
        success: function(response){
          $('span[id="cartSubTotal"]').text(response.totals)
          $('#cartQty').text(response.quantities)
          var miniCart = ""

          $.each(response.carts, function(key, value){
            miniCart +=   `<div class="cart-item product-summary">
                            <div class="row">
                              <div class="col-xs-4">
                                <div class="image"> <a href="detail.html"><img src="/${value.options.image}"></a> </div>
                              </div>
                              <div class="col-xs-7">
                                <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                <div class="price">${value.price} * ${value.qty}</div>
                              </div>
                              <div class="col-xs-1 action"> 
                                <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)">
                                  <i class="fa fa-trash"></i>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <hr>`
          });

          $('#miniCart').html(miniCart);

        }
      })
    }
    miniCart();

    function miniCartRemove(rowId){
      $.ajax({
        type: 'GET',
        url: '/product/mini/cart-remove/' +rowId,
        dataType: 'json',
        success: function(data){
          miniCart();

          const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 3000
          })

          if($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              title: data.success
            })
          }else{
            Toast.fire({
              type: 'error',
              title: data.error
            })
          }

        }
      });
    }

  </script>

  <script type="text/javascript">

    function wishlist(){
      $.ajax({
        type: 'GET',
        url: '/user/get-wishlist',
        dataType: 'json',
        success: function(response){
          var rows = ""

          $.each(response, function(key, value){
            rows +=  `<tr>
                            <td class="col-md-2"><img src="/${value.product.thumbnail}"></td>
                              <td class="col-md-7">
                                <div class="product-name">
                                  <a href="#">
                                    ${value.product.name}
                                  </a>
                                </div>
                                <div class="price">
                                  ${value.product.discount == null ? `${value.product.price}` : `${value.product.discount} <span>${value.product.price}</span>`}
                                  <span>$900.00</span>
                                </div>
                              </td>
                              <td class="col-md-2">
                                  <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary icon" type="button" title="Add Cart" onclick="productReview(this.id)" id="${value.product_id}">Add to Cart</button>
                              </td>
                              <td class="col-md-1 close-btn">
                                <button type="submit" id="${value.id}" onclick="RemoveWishlist(this.id)">
                                  <i class="fa fa-times"></i>
                                </button>
                              </td>
                          </tr>`
          });

          $('#wishlist').html(rows);

        }
      })
    }
    wishlist();

    function addToWishlist(product_id){
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/user/add-to-wishlist/' + product_id,
              
        success:function(data){
          
          const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
              })

          if($.isEmptyObject(data.error)) {
              Toast.fire({
                type: 'success',
                icon: 'success',
                title: data.success
                })
          }else{
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error
            })
          }

        }
      })

    }

    function RemoveWishlist(id){
      $.ajax({
        type: 'GET',
        url: '/user/remove-wishlist/' +id,
        dataType: 'json',
        success: function(data){
          wishlist();

          const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
          })

          if($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success
            })
          }else{
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error
            })
          }

        }
      });
    }

  </script>

  <script type="text/javascript">

    function cart(){
      $.ajax({
        type: 'GET',
        url: '/get-cart',
        dataType: 'json',
        success: function(response){
          var rows = ""

          $.each(response.carts, function(key, value){
            rows +=  `<tr>
                              <td class="col-md-2">
                                <img src="/${value.options.image}" width="60" height="60">
                              </td>
                              <td class="col-md-2">
                                <div class="product-name">
                                  <a href="#">
                                    ${value.name}
                                  </a>
                                </div>
                                <div class="price">
                                  ${value.price}
                                </div>
                              </td>
                              <td class="col-md-2">
                                <strong>${value.options.color}</strong>
                              </td>
                              <td class="col-md-2">
                                ${value.options.size == null ? `<span> ... </span>` : `<strong>${value.options.size}</strong>`}
                              </td>
                              <td class="col-md-2">
                                ${value.qty > 1 
                                 ? `<button type="submit" class="btn btn-sm btn-danger" id="${value.rowId}" onclick="DecrementCart(this.id)">-</button>`
                                 : `<button type="submit" class="btn btn-sm btn-danger" disabled>-</button>`
                                }
                                    <input type="text" value="${value.qty}" min="1" max="100" style="width:25px;" disabled>
                                    <button type="submit" class="btn btn-sm btn-success" id="${value.rowId}" onclick="IncrementCart(this.id)">+</button>                                    
                              </td>
                              <td class="col-md-2">
                                <strong>${value.subtotal}</strong>
                              </td>
                              <td class="col-md-1 close-btn">
                                <button type="submit" id="${value.rowId}" onclick="RemoveCart(this.id)">
                                  <i class="fa fa-times"></i>
                                </button>
                              </td>
                          </tr>`
          });

          $('#cartPage').html(rows);

        }
      })
    }
    cart();

    function RemoveCart(id){
      $.ajax({
        type: 'GET',
        url: '/remove-cart/' +id,
        dataType: 'json',
        success: function(data){
          couponCalculation();
          cart();
          miniCart();
          $('#couponField').show();
          $('#name').val();

          const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
          })

          if($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success
            })
          }else{
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error
            })
          }

        }
      });
    }

    function IncrementCart(rowId){
      $.ajax({
        type: 'GET',
        url: '/increment-cart/' + rowId,
        dataType: 'json',
        success: function(data){
          couponCalculation();
          cart();
          miniCart();
        }
      });
    }

    function DecrementCart(rowId){
      $.ajax({
        type: 'GET',
        url: '/decrement-cart/' + rowId,
        dataType: 'json',
        success: function(data){
          couponCalculation();
          cart();
          miniCart();
        }
      });
    }

  </script>

  <script type="text/javascript">

    function applyCoupon(){
      var name = $('#name').val();
      $.ajax({
        type: 'POST',
        dataType: 'json',
        data: {name:name},
        url: "{{ url('/coupon-apply') }}",
        success: function(data){
          couponCalculation();
          if(data.validity == true){
            $('#couponField').hide();
          }

          const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
          })

          if($.isEmptyObject(data.error)) {
            Toast.fire({
              type: 'success',
              icon: 'success',
              title: data.success
            })
          }else{
            Toast.fire({
              type: 'error',
              icon: 'error',
              title: data.error
            })
          }

        }
      })
    }

    function couponCalculation(){
      $.ajax({
        type: 'GET', 
        url : "{{ url('/coupon-calculation') }}",
        dataType: 'json',
        success: function(data){
          if(data.total){ 
            $('#couponCalField').html(
              `<tr>
                  <th>
                    <div class="cart-sub-total">
                      Subtotal<span class="inner-left-md">$ ${data.total}</span>
                    </div>
                    <div class="cart-grand-total">
                      Grand Total<span class="inner-left-md">$ ${data.total}</span>
                    </div>
                  </th>
                </tr>`
            )
          }else{
            $('#couponCalField').html(
              `<tr>
                  <th>
                    <div class="cart-sub-total">
                      Subtotal<span class="inner-left-md">$ ${data.subtotal}</span>
                    </div>
                    <div class="cart-sub-total">
                      Coupon<span class="inner-left-md"> ${data.name}</span>
                      <button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="cart-sub-total">
                      Discount Amount<span class="inner-left-md">$ ${data.discount_amount}</span>
                    </div>
                    <div class="cart-grand-total">
                      Grand Total<span class="inner-left-md">$ ${data.total_amount}</span>
                    </div>
                  </th>
                </tr>`
            )
          }
        }
      });
    }
    couponCalculation();

    function couponRemove(){
      $.ajax({
        type: 'GET',
        url: "{{ url('/coupon-remove') }}",
        dataType: 'json',
        success: function(data){
          couponCalculation();
          $('#couponField').show();  
          $('#name').val();

           const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            })

            if($.isEmptyObject(data.error)) {
              Toast.fire({
                type: 'success',
                icon: 'success',
                title: data.success
              })
            }else{
              Toast.fire({
                type: 'error',
                icon: 'error',
                title: data.error
              })
            }
        }
      })
    }

  </script>

</body>

</html>