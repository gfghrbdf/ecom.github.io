@extends('admin.admin_master')

@section('admin')

<div class="container">
	
	<div class="row">
		
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Data Table With Full Features</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand Name Eng</th>
								<th>Brand Name Hindi</th>
								<th>Image</th>
								<th>Action</th>
								
							</tr>
						</thead>

						<tbody>

							@foreach($datast as $ppo)

							<tr>
								
								<td>{{$ppo->brant_en}}</td>

								<td>{{$ppo->brant_hin}}</td>

							<td><img class="w-50" src="{{asset($ppo->brant_image)}}"></td>

								<td><a title="Edate Data" href="{{route('brand.edate',$ppo->id)}}" class="btn btn-info btn-sm fa fa-pencil"></a>

								<a title="Delete Data" id="delet" href="{{route('brand.delete',$ppo->id)}}" class="btn btn-danger btn-sm fa fa-trash"></a>
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
				  <h3 class="box-title">ADD Brand</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">

					<div class="form-group">
					<h5> Brand Name English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="brant_en" class="form-control">

						@error('brant_en')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5>Brand Name Hindi  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="brant_hin" class="form-control">

						@error('brant_hin')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>

					<div class="form-group">
					<h5>Brand Image <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="file" name="brant_image" class="form-control">

						@error('brant_image')

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

	






	
	@if(Session::has('message')){

		let alert_type = "{{Session::get('type')}}"

		if(alert_type == 'success' || alert_type == 'danger'){

			

			 alert("{{Session::get('message')}}")
		}


	}

	@endif


	


	   








</script>



@endsection
