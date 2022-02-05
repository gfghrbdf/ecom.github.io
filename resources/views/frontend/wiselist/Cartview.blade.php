@extends('frontend.main_master')

@section('content')

<!-- modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" > Producr Name : <span id="pname"></span></h5>

        <button type="button" class="close" id="addto_closeMod" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="row">
          
          <div class="col-lg-4">

            <div class="card csv" style="width: 18rem;">
  
 
</div>
            

          </div>

          <div class="col-lg-4">

            <ul class="list-group">
      <li class="list-group-item" >Product Price : $<span id="price"> </span>

         <del class="text-danger" id="dis"></del> 
       </li>
      <li class="list-group-item">Product Code : <span id="code"> </span>  </li>
      <li class="list-group-item">Category : <span id="cat"> </span> </li>
      <li class="list-group-item">Brand : <span id="brand"> </span> </li>
      <li class="list-group-item">Stock : <span style="background: green;" class="badge badge-danger" id="stockin">  </span>

        <span style="background: red;" class="badge badge-danger" id="stockout">  </span>

      </li>
</ul>
            
            
          </div>

          <div class="col-lg-4">

            <div class="color form-group">


            <small>Choice Color</small>

            <select class="form-control form-control-sm" id="collr">
           
          </select>

        </div>

        <div class="size form-group" id="sezeDiv">


            <small>Choice Size</small>

            <select class="form-control form-control-sm" id="size">
            <option>Small select</option>
          </select>

        </div>




        <div class="Quantity">

            <div class="form-group">
            <label for="exampleFormControlInput1">Product Quantity</label>
            <input type="number" class="form-control" id="qnty"  value="1" min="1">
          </div>


           

        </div>

         <input type="hidden" id="cart_id" name="" >

        <button class="btn btn-primary" onclick="addToCart()">Add To Cart</button>
            
            
          </div>


        </div>

 
      </div>
     
    </div>
  </div>
</div>

<!-- end -->



<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		
				<table class="table ">
			<thead>
				<tr>
					<th style="font-size: 9px;" class="cart-romove ">Image</th>
					<th style="font-size: 9px;" class="cart-description ">Name</th>
					<th style="font-size: 9px;" class="cart-description ">Color</th>
					
					<th style="font-size: 9px;" class="cart-edit ">Size</th>
					<th style="font-size: 9px;" class="cart-qty ">Quantity</th>
					<th style="font-size: 9px;" class="cart-sub-total ">Subtotal</th>
					<th style="font-size: 9px;" class="cart-total last-">Remove</th>
				</tr>
			</thead><!-- /thead -->
			


			<tbody id="Cartpage">
				
				
			</tbody>
		</table>
	</div>
</div>		
<div class="col-md-4 col-sm-12 cart-shopping-total">
</div>	

			<div class="col-md-4 col-sm-12 estimate-ship-tax">

				@if(Session::has('cupon'))

				@else
	<table class="table" id="input_cupon">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<input type="text" class="form-control unicase-form-control text-input" id="cupon_name" placeholder="You Coupon..">
						</div>
						<div class="clearfix pull-right">
							<button type="submit" class="btn-upper btn btn-primary" onclick="applyCuppon()">APPLY COUPON</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->


@endif

</div><!-- /.estimate-ship-tax -->



<div class="col-md-4 col-sm-12 cart-shopping-total p-4">
	<table class="table">
		<thead id="ShowTotalField">
			
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a href="{{route('checkout')}}"  type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
							
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->




</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

	
				



<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

<div class="my-5">
		
		@include('frontend.body.brand')

</div>

@endsection