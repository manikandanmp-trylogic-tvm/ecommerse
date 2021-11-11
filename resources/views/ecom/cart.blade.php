@extends('layouts.base')
@section('content')

<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>login</span></li>
				</ul>
			</div>
			<div class=" main-content-area">

				<div class="wrap-iten-in-cart">
					<h3 class="box-title">Products Name</h3>
					<ul class="products-cart">
						@foreach($products as $product)
						<li class="pr-cart-item">
							<div class="product-image">
								<figure><img src="{{asset('assets/images/products')}}/{{$product->image}}" alt=""></figure>
							</div>
							<div class="product-name">
								<a class="link-to-product" href="#">{{$product->name}}</a>
							</div>
							<div class="price-field produtc-price"><p class="price">{{$product->regular_price}}</p></div>
							<div class="quantity">
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >									
									<a class="btn btn-increase" href="#"></a>
									<a class="btn btn-reduce" href="#"></a>
								</div>
							</div>
							<div class="delete">
								<form action="{{route('deleteto.cart',$product->cart_id)}}"method="get">

								<button class="btn btn-danger">
									delete
									
								</button>
									
</form>	
								</a>
							</div>
						</li>
						@endforeach												
					</ul>
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Subtotal</span><b class="index"></b></p>
						<p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
						<p class="summary-info total-info "><span class="title">Total</span><b class="index">$512.00</b></p>
					</div>
					<div class="checkout-info">
						<label class="checkbox-field">
							<input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
						</label>
						<a class="btn btn-checkout" href="/checkout">Check out</a>
	
					</div>
					
				</div>

				

			</div><!--end main content area-->
		</div><!--end container-->

	</main>

@endsection