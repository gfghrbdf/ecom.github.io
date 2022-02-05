@extends('admin.admin_master')

@section('admin')

<div class="container">
	
	<div class="row">
		
			



			<!-- input brand -->

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edate District</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('district.edate')}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">

											<div class="form-group">
					<h5> District Name <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" value="{{$district->district_name}}" name="district_names" class="form-control">

						@error('district_names')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>

				<div class="form-group">
					<h5> Select Division <span class="text-danger">*</span></h5>
					<div class="controls">

						<select class="form-control" name="division_name">

							<option selected disabled>Select Division...</option>

							@foreach($divisons as $divison)

							<option value="{{$divison->id}}" {{($divison->id == $district->divison_id)? 'selected' : ''}}>{{$divison->ship_divition}}</option>

							@endforeach
							

						</select>
				

						@error('division_name')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>



				<input type="hidden" value="{{$district->id}}" name="ship_district_hid">


					


				

			

						


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
