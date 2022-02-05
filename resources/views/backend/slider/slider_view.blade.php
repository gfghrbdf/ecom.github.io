@extends('admin.admin_master')

@section('admin')

<div class="container">
	
	<div class="row">
		
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Your Product Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Slider Image</th>
								<th>Slider Title</th>
								<th>Slider Description</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>

						<tbody>

							@foreach($slider as $ppo)

							<tr>
								
							<td width="20%"> <img style="width: 100%;" class="img-fluid" src="{{asset($ppo->slider_img)}}"> </td>

								<td>{{$ppo->title}}</td>

							<td>{{$ppo->description}}</td>

							<td>

								@if($ppo->status == 1)

								<span class="badge badge-primary">Active</span>

								@else

								<span class="badge badge-danger">Block</span>

								@endif
								

							</td>

								<td width="25%">

									@if($ppo->status == 1)

			<a title="InActive Now" class="btn btn-danger btn-sm" href="{{route('slider.inactive',$ppo->id)}}"><span class="fa fa-arrow-down"></span></a>

									@else

				<a title="Active Now" class="btn btn-primary btn-sm" href="{{route('slider.active',$ppo->id)}}"><span class="fa fa-arrow-up"></span></a>

									@endif

					<a title="Edate Data" href="{{route('slider.edate',$ppo->id)}}" class="btn btn-info btn-sm fa fa-pencil"></a>



		<a title="Delete Data" id="delet" href="{{route('slider.delete',$ppo->id)}}" class="btn btn-danger btn-sm fa fa-trash"></a>
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
				  <h3 class="box-title">ADD Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('slider.store')}}" enctype="multipart/form-data">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">


						<div class="form-group">
					<h5> Slider Title <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" name="title" class="form-control">

						@error('title')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5> Slider Description <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="slider_description" class="form-control">

						@error('slider_description')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5>Slider Image Upload  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input  type="file" name="slider_img" class="form-control slider_imgs">

						@error('slider_img')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>

						 <img style="width: 60%;" src="" class="img_src">
				
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

	






	
	// @if(Session::has('message')){

	// 	let alert_type = "{{Session::get('type')}}"

	// 	if(alert_type == 'success' || alert_type == 'danger'){

			

	// 		 alert("{{Session::get('message')}}")
	// 	}


	// }

	// @endif


	


	   








</script>



@endsection
