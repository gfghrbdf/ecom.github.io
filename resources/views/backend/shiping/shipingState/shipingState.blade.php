@extends('admin.admin_master')

@section('admin')
	
	<div class="container">
	
	<div class="row">
		
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Product Cupon</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Divison Name</th>
								<th>District Name</th>
								<th>State Name</th>								
								<th>Date</th>
								
								<th>Action</th>

								
							</tr>
						</thead>

						<tbody>

							@foreach($states as $state)

							<tr>
								
								
								<td>{{$state->division->ship_divition}}</td>
								<td>{{$state->district->district_name}}</td>
								<td>{{$state->state_name}}</td>							
								<td><a class="btn btn-primary btn-sm" href="{{url('shipping/state-update/').'/'.$state->id}}">Edate</a>
									<a class="btn btn-danger btn-sm" href="{{url('shipping/state-delete/').'/'.$state->id}}">Delete</a>
								</td>


							</tr>

							@endforeach

							
							
							

						</tbody>


						
						
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			 
			  <!-- /.box -->          
			</div>



			<!-- input brand -->

			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">ADD Cupon</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('state.store')}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">


						<div class="form-group">
					<h5> District Name <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" name="state_name" class="form-control">

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

						<select class="form-control" id="dis_show" name="district_name">

							

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





@endsection
