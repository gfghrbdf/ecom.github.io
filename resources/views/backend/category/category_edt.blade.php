@extends('admin.admin_master')

@section('admin')

<div class="container">
	
	<div class="row">
		
			

			<!-- input brand -->

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edate Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">



			<form method="post" action="{{route('category.upd',$singleCat->id)}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">


						<div class="form-group">
					<h5> Category Icon <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" name="category_icn" class="form-control" value="{{$singleCat->category_icon}}">

						@error('category_icn')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5> Category Name English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="category_eng" class="form-control" value="{{$singleCat->category_name_eng}}">

						@error('category_eng')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5>Category Name Hindi  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="category_hin" class="form-control" value="{{$singleCat->category_name_hin}}">

						@error('category_hin')

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

	






	
	// @if(Session::has('message')){

	// 	let alert_type = "{{Session::get('type')}}"

	// 	if(alert_type == 'success' || alert_type == 'danger'){

			

	// 		 alert("{{Session::get('message')}}")
	// 	}


	// }

	// @endif


	


	   








</script>



@endsection
