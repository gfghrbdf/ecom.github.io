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

			<form method="post" action="{{route('shipping.edate')}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">


						<div class="form-group">
					<h5> Division Name <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" name="ship_name" value="{{$divition->ship_divition}}" class="form-control">

						

						 <div class="help-block"></div></div>
				
				</div>

				<input type="hidden" value="{{$divition->id}}" name="ship_divition_hid">


					


				

			

						


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
