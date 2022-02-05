@extends('admin.admin_master')

@section('admin')

<div class="container">
	
	<div class="row">
		
			



			<!-- input brand -->

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">ADD Cupon</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('cupon.edate')}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">


						<div class="form-group">
					<h5> Cupon Name <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" name="cupon_name" value="{{$cupon->cupon_name}}" class="form-control">

						@error('cupon_name')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>

				<input type="hidden" value="{{$cupon->id}}" name="cupon_hid">


					<div class="form-group">
					<h5> Cupon Discount(%) <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="number" name="cupon_discoubt" value="{{$cupon->cupon_discount}}" class="form-control">

						@error('cupon_discoubt')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5>Cupon Validity  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="date" name="cupon_validity" value="{{$cupon->cupon_validity}}" class="form-control">

						@error('cupon_validity')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>

			

						


				</div>


				<!-- user name -->


				




			</div>						
			

				
				






			</div>
			<div class="text-xs-right">
			

				<input type="submit" class="btn btn-rounded btn-info" value="Update">

			</div>
		</form>

					

				</div>

			</div>

		</div>



			<!-- end input div -->

	</div>

</div>

<script type="text/javascript">
		
	

</script>





@endsection
