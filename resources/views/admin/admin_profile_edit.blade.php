@extends('admin.admin_master')

@section('admin')

<div class="container-full">

<!-- Main content -->

<section class="content">

<!-- Basic Forms -->
<div class="box">
<div class="box-header with-border">
  <h4 class="box-title">Admin Profile Edit</h4>

</div>
<!-- /.box-header -->
<div class="box-body">
  <div class="row">
	<div class="col">
		<form method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-6">

					<div class="form-group">
					<h5>Admin Email <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="email" name="email" class="form-control" value="{{$data[0]['email']}}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
				
				</div>
						


				</div>


				<!-- user name -->


				<div class="col-lg-6">

					<div class="form-group">
					<h5>Admin Name <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="name" class="form-control" value="{{$data[0]['name']}}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
				
				</div>
						


				</div>




			</div>						
			

			<div class="row">
				
				<div class="col-lg-6">

					<div class="form-group">
					<h5>Admin Image <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="file" name="profile_photo_path" class="form-control" id="image"> <div class="help-block"></div></div>
				</div>
					

				</div>

				<input type="hidden" name="hide_id" value="{{$data[0]['id']}}">

				<div class="col-lg-6">

				<?php 


				if($data[0]['profile_photo_path'] != ''){

					?>

				<img id="upd_img" class="rounded-circle" src="{{url('upload/admin_image/'.$data[0]['profile_photo_path'])}}" alt="User Avatar">

					<?php


				}else{


					?>

					<img id="upd_img"  style="width: 50%;" class="rounded-circle" src="{{url('upload/istockphoto-1193046540-612x612.jpg')}}" alt="User Avatar">

					
					

					<?php


				}

				?>


					

				</div>


			</div>
				
				






			</div>
			<div class="text-xs-right">
			

				<input type="submit" class="btn btn-rounded btn-info" value="Update">
			</div>
		</form>

	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->

</section>






<!-- /.content -->
</div>






@endsection
