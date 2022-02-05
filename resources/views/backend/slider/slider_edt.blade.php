@extends('admin.admin_master')

@section('admin')

<div class="container">
	
	<div class="row">
		




			<!-- input brand -->

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Update Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('slider.upd',$slider->id)}}" enctype="multipart/form-data">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">


						<div class="form-group">
					<h5> Slider Title <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" value="{{$slider->title}}" name="title" class="form-control">

						

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5> Slider Description <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" value="{{$slider->description}}" name="slider_description" class="form-control">

						

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5>Slider Image Upload  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input  type="file" name="slider_img" class="form-control slider_imgs">

						

						 <div class="help-block"></div></div>

						 <img style="width: 20%; margin: 15px;" src="{{asset($slider->slider_img)}}">
				
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
