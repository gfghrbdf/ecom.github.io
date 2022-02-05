@extends('admin.admin_master')

@section('admin')

<div class="container-full">

		<!-- Main content -->
<section class="content">
<div class="row">


	<div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-black">
					  <h3 class="widget-user-username">  Admin Name :  {{ $data[0]['name']}}</h3> 

					  <a href="{{route('admin.profile.edit')}}" style="float: right;" class="btn btn-rounded btn-success mb-5">Edate Profile</a>
					 

					  <h6 class="widget-user-desc">Email :  {{ $data[0]['email']}} </h6>
					</div>
					<div class="widget-user-image">

						<?php 

						if($data[0]['profile_photo_path'] != ''){

							?>

						<img class="rounded-circle" src="{{url('upload/admin_image/'.$data[0]['profile_photo_path'])}}" alt="User Avatar">

							<?php


						}else{


							?>

							<img class="rounded-circle" src="{{url('upload/istockphoto-1193046540-612x612.jpg')}}" alt="User Avatar">
							

							<?php


						}

						?>

	
					</div>
					<div class="box-footer">
					  <div class="row">
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">12K</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4 br-1 bl-1">
						  <div class="description-block">
							<h5 class="description-header">550</h5>
							<span class="description-text">FOLLOWERS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
						<div class="col-sm-4">
						  <div class="description-block">
							<h5 class="description-header">158</h5>
							<span class="description-text">TWEETS</span>
						  </div>
						  <!-- /.description-block -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->
					</div>
				  </div>













</div>
		</section>
		<!-- /.content -->
	  </div>




@endsection
