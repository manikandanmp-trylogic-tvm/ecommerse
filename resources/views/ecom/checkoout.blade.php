@extends('layouts.base')
@section('content')

<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Checkout</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<div class="wrap-address-billing">

               
					<h3 class="box-title">Billing Address</h3>
					<form action="/order" method="POST">
                        @csrf
						<p class="row-in-form">
							<label for="fname">first name<span>*</span></label>
							<input id="fname" type="text" name="first_name" value="" placeholder="Your name">
						</p>
						<p class="row-in-form">
							<label for="lname">last name<span>*</span></label>
							<input id="lname" type="text" name="last_name" value="" placeholder="Your last name">
						</p>
						
						<p class="row-in-form">
							<label for="add">Address:</label>
							<input id="add" type="text" name="address" value="" placeholder="Street at apartment number">
						</p>
						
						<p class="row-in-form">
							<label for="city">phone<span>*</span></label>
							<input id="city" type="text" name="phone" value="" name="phone" placeholder="City name">
						</p>
                        
						
						
						<div class="choose-payment-methods">
                        <h4 class="title-box">Payment Method</h4>
							<label class="payment-method">
								<input  name="payment"  id="payment-method-bank" value="cash" type="radio">
								<span>Direct Bank Transder</span>
								<span class="payment-desc">you can now use payment using your bank account</span>
							</label>
							<label class="payment-method">
								<input  name="payment" id="payment-method-visa" value="cash" type="radio">
								<span>cash on dlivery</span>
								<span class="payment-desc">you can use realmoney </span>
							</label>
							<label class="payment-method">
								<input  name="payment"  id="payment-method-paypal" value="cash " type="radio">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
</div>

<br>

						<input type="hidden" name="product_id" value="{{$products}}">
						<button   clas="btn btn-warning"> order  now</button>
					</form>
				</div>
                
				

				

			</div><!--end main content area-->
		</div><!--end container-->

	</main>

@endsection