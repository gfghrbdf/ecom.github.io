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
								<th>Cupon Name</th>
								<th>Cupon Discount</th>
								<th>Cupon Validity</th>
								<th>Status</th>
								<th>Update Status</th>
								<th>Action</th>

								
							</tr>
						</thead>

						<tbody>

							@foreach($cupons as $cupon)

							<tr>
								
								<td>{{$cupon->cupon_name}}</td>
								<td>{{$cupon->cupon_discount}}%</td>
								<td>{{Carbon\Carbon::parse($cupon->cupon_validity)->format('D d F Y')}}</td>

									<td>

									@if($cupon->cupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))

									<span class="badge badge-success">Active</span>



									@else



									<span class="badge badge-danger">Inactive</span>

									@endif
									

								</td>


								<td>

									@if($cupon->status == 1)

									<a class="btn btn-primary btn-sm" href="#" > <span class="fa fa-arrow-up"></span> Active</a>



									@else

									<a class="btn btn-primary btn-sm" href="" >  <span class="fa fa-arrow-down"></span> Inactive</a>

									@endif
									

								</td>

								<td><a class="btn btn-primary btn-sm" href="{{url('cupon/update/').'/'.$cupon->id}}">Edate</a>
									<a class="btn btn-danger btn-sm" href="{{url('cupon/delete/').'/'.$cupon->id}}">Delete</a>
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

			<form method="post" action="{{route('cupon.store')}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">


						<div class="form-group">
					<h5> Cupon Name <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" name="cupon_name" class="form-control">

						@error('cupon_name')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5> Cupon Discount(%) <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="number" name="cupon_discoubt" class="form-control">

						@error('cupon_discoubt')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5>Cupon Validity  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="date" name="cupon_validity" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" class="form-control">

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
