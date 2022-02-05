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
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody id="wist_product">
				
				
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

<div class="my-5">
		
		@include('frontend.body.brand')

</div>

@endsection