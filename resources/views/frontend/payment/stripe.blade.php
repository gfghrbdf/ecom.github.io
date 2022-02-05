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
			




					<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
	    	

	    		
	    			
	    	<h4>Your Shopping Ammount</h4>
	    	<hr>

	    	<ul>

	    		@if(Session::has('cupon'))


	    		<li><strong>Subtotal :</strong>

	    			${{$total}}

	    		</li>

	    		<hr>

	    		<li><strong>Cupon Name :</strong>

	    			${{Session::get('cupon')['cupon_name']}} ({{Session::get('cupon')['cupon_discount']}}%)

	    		</li>

	    		<hr>

	    		<li><strong>Cupon Discount :</strong>

	    			${{Session::get('cupon')['discount_ammount']}}

	    		</li>

	    		<hr>

	    		<li><strong>Cupon Name :</strong>

	    			${{Session::get('cupon')['total_ammount']}}

	    		</li>

	    		<hr>




	    	

	    		@else


	    			<li><strong>Subtotal :</strong>

	    			${{$total}}

	    		</li>

	    		<hr>

	    		<li><strong>Grandotal :</strong>

	    			${{$total}}

	    		</li>

	    		<hr>

	    		



	    		@endif


	    		
	    	</ul>

	    	
			
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


		    	<form action="{{url('/stripe/order')}} " method="post" id="payment-form">
                            @csrf

                            <input type="hidden" value="{{$data['shipping_name']}}" name="name">
                              <input type="hidden" value="{{$data['shipping_email ']}}" name="email">
                          
                            <input type="hidden" value="{{$data['shipping_phone']}}" name="phone">
                            <input type="hidden" value="{{$data['post_code']}}" name="code">
                            <input type="hidden" value="{{$data['note']}}" name="note">
                            <input type="hidden" value="{{$data['divison_id']}}" name="divison">
                            <input type="hidden" value="{{$data['district_id']}}" name="district">
                            <input type="hidden" value="{{$data['state_id']}}" name="state">



                        <div class="form-row">
                            <label for="card-element">
                            Credit or debit card
                            </label>
                             
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <br>
                        <button class="btn btn-primary">Submit Payment</button>
                        </form>
		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				
</div>






			

</div><!-- /.row -->
		









		
		</div><!-- /.checkout-box -->




@endsection

