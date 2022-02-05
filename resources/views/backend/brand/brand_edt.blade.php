@extends('admin.admin_master')

@section('admin')

<div class="container">
	
	<div class="row">
		




			<!-- input brand -->

			<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('brand.update',$dat['id'])}}" enctype="multipart/form-data">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">

					<div class="form-group">
					<h5> Brand Name English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="brant_en" class="form-control" value="{{$dat->brant_en}}">

						@error('brant_en')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5>Brand Name Hindi  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="brant_hin" class="form-control" value="{{$dat['brant_hin']}}">

						@error('brant_hin')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>

					<div class="form-group">
					<h5>Brand Image <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="file" name="brant_image" class="form-control">

						<input type="hidden" name="oldimage" class="form-control" value="{{$dat['brant_image']}}">

						



						<img class="img-fluid pt-4 pb-5"  src="{{asset($dat['brant_image'])}}">
						<span class="text-danger">

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
