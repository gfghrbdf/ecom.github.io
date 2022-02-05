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


			<form method="post" action="{{route('state.edate')}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">

					<input type="hidden" name="ship_state_hid" value="{{$states->id}}">


						<div class="form-group">
					<h5> State Name <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" value="{{$states->state_name}}" name="state_name" class="form-control">

						@error('state_name')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>

				<div class="form-group">
					<h5> Select Division <span class="text-danger">*</span></h5>
					<div class="controls">

						<select onchange="div_lod()" id="show_div" class="form-control" name="division_name">

							<option selected disabled>Select Division...</option>

							@foreach($divisons as $divison)

			<option value="{{$divison->id}}" {{($divison->id == $states->divison_id) ? 'selected' : ''}} >{{$divison->ship_divition}}</option>

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

						<select class="form-control" id="dis_show" name="district_name">

						<option selected disabled>Select District...</option>

					@foreach($districts as $district)

			<option value="{{$district->id}}" {{($district->id == $states->district_id) ? 'selected' : ''}} >{{$district->district_name}}</option>

					@endforeach
							

						</select>
				

						@error('district_name')

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
