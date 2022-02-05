@extends('frontend.main_master')

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			

	<form method="post" action="{{route('checkout.store')}}">

		@csrf


					<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
	    	

	    		<div class="row">		

				<!-- guest-login -->	


					<div class="col-md-6 col-sm-6 already-registered-login">
						
						<h4>Shiping Address</h4>
					
						<div class="form-group">
						
					    <label class="info-title" for="exampleInputEmail1">Shiping Name <span>*</span></label>
					    <input type="text" name="name" class="form-control unicase-form-control text-input" value="{{Auth::user()->name}}"  placeholder="user">
					  </div>
					  <div class="form-group">
						
					    <label class="info-title" for="exampleInputEmail1"> Email <span>*</span></label>
					    <input type="email" name="email" class="form-control unicase-form-control text-input" value="{{Auth::user()->email}}"  placeholder="user@gmail.com">
					  </div>

					   <div class="form-group">
						
					    <label class="info-title" for="exampleInputEmail1"> Phone <span>*</span></label>
					    <input type="number" name="number" class="form-control unicase-form-control text-input" value="{{Auth::user()->phone}}"  placeholder="019******">
					  </div>

					   <div class="form-group">
						
					    <label class="info-title" for="exampleInputEmail1"> Post Code <span>*</span></label>
					    <input type="text" name="codes" class="form-control unicase-form-control text-input"  placeholder="11978">
					  </div>
					 
					  
					
				</div>
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">

					<h4> Shipping Devision </h4>

					<div class="form-group">
					<h5> Select Division <span class="text-danger">*</span></h5>
					<div class="controls">

						<select onchange="div_lod()" id="show_div" class="form-control" name="division_name">

							<option selected disabled>Select Division...</option>

							@foreach($divisons as $divison)

							<option value="{{$divison->id}}">{{$divison->ship_divition}}</option>

							@endforeach
							

						</select>
				

						@error('division_name')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5> Select District <span class="text-danger">*</span></h5>
					<div class="controls">

						<select class="form-control" id="dis_show" name="district_name" onchange="disChng()">

							

							

						</select>
				

						@error('district_name')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
					</div>

					<div class="form-group">
					<h5> Select State <span class="text-danger">*</span></h5>
					<div class="controls">

						<select class="form-control" id="state_show" name="state_name">

							

							

						</select>
				

						@error('district_name')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
					</div>

					<div class="form-group">
					<h5> Note <span class="text-danger">*</span></h5>
					<div class="controls">

						<textarea rows="6" class="form-control" name="note" placeholder="Enter Some Note"></textarea>


					</div>

					</div>
					
					
						
					  
					
				</div>	
				<!-- already-registered-login -->		

			</div>
	    			


	    	
			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					

					  	
					</div><!-- /.checkout-steps -->
				</div>




				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">

					@foreach($cartcontent as $items)


					
					<li><strong>Image:</strong>

						<img style="width: 10%" src="{{asset($items->options->image)}}"><br>
						<strong>quantity : ({{$items->qty}})</strong>
						<strong>Color : ({{$items->options->color}})</strong>
						<strong>Size : {{($items->options->size) ? $items->options->size :'No size' }}</strong><br>
						<strong>Price : (${{$items->subtotal}})</strong>
						<button href="" id="{{$items->rowId}}" class="btn btn-danger btn-sm" onclick="CrtRemov(this.id)"><span class="fa fa-trash"></span></button>


					</li>
					<hr>
					


					
					<!-- <li><a href="#">Shipping Method</a></li>
					<li><a href="#">Payment Method</a></li> -->
					@endforeach
					
					<hr>
					@if(Session::has('cupon'))
					<li><strong>Cupon Name : {{Session::get('cupon')['cupon_name']  }} ({{Session::get('cupon')['cupon_discount']}}%)</strong></li>
					<hr>
					<li><strong>Cupon Discount : ${{Session::get('cupon')['discount_ammount']}}</strong></li>
					<hr>
					<li><strong>Grand Total : ${{Session::get('cupon')['total_ammount']}}</strong></li>
					@else

					<li><strong>Subtotal : ${{$carttotal}}</strong></li>
					<li><strong>GrandTotal : ${{$carttotal}}</strong></li>


					@endif
					
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				
</div>



				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Payment Method</h4>
		    </div>
		    <div class="row">

		    	<div class="col-md-4">

		    		<label>Stripe</label>

		    		<input type="radio" name="payment_method" value="stripe">
		    		<img src="{{asset('frontend/assets/images/payments/4.png')}}" class="img-fluid">
		    		
		    	</div>

		    	<div class="col-md-4">

		    		<label>Card</label>

		    		<input type="radio" name="payment_method" value="card">
		    		<img src="{{asset('frontend/assets/images/payments/3.png')}}" class="img-fluid">
		    		
		    	</div>

		    	<div class="col-md-4">

		    		<label>Cash</label>

		    		<input type="radio" name="payment_method" value="cash">
		    		<img src="{{asset('frontend/assets/images/payments/5.png')}}" class="img-fluid">
		    		
		    	</div>

		    	<br>

		    	
		    		
		    		<button  type="submit" class="btn-upper btn btn-primary checkout-page-button ">Payment Stape</button>

		    	

					
			</div>

		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				
</div>





			

</div><!-- /.row -->
		


	</form>






		
		</div><!-- /.checkout-box -->




@endsection