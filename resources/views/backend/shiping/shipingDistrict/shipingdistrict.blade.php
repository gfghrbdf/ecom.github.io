@extends('admin.admin_master')

@section('admin')
	
	<div class="container">
	
	<div class="row">
		
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Shipping District</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Divison Name</th>
								<th>District Name</th>
								
								<th>Date</th>
								
								<th>Action</th>

								
							</tr>
						</thead>

						<tbody>

							@foreach($districts as $district)

							<tr>
								
								<td>{{$district->division->ship_divition}}</td>
								<td>{{$district->district_name}}</td>
								<td>{{$district->created_at}}</td>
								

								


							

								<td><a class="btn btn-primary btn-sm" href="{{url('shipping/district-update/').'/'.$district->id}}">Edate</a>
									<a class="btn btn-danger btn-sm" href="{{url('shipping/district-delete/').'/'.$district->id}}">Delete</a>
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
				  <h3 class="box-title">ADD District</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('district.store')}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">


						<div class="form-group">
					<h5> District Name <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" name="district_names" class="form-control">

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

							<option value="{{$divison->id}}">{{$divison->ship_divition}}</option>

							@endforeach
							

						</select>
				

						@error('division_name')

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
