@extends('admin.admin_master')

@section('admin')

<div class="container">
	
	<div class="row">
		
			



			<!-- input brand -->

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Update SUB Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('subcategory.update',$datas->id)}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">



					<div class="form-group">
								<h5> Select Category <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category" id="select"  class="form-control" >
							<option selected="" disabled="">Select Category</option>

							@foreach($allCategories as $category)


							@if($datas->category_id == $category->id)

							<option selected="" value="{{$category->id}}"> {{$category->category_name_eng}}</option>


							@endif


							<option value="{{$category->id}}">{{$category->category_name_eng}}</option>

							@endforeach
								



								</select>

									@error('category')

									<span class="text-danger">{{$message}}</span>

									@enderror

								</div>
							</div>


















					<div class="form-group">
					<h5> SubCategory  English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="subcategory_eng" value="{{$datas->sub_category_eng}}" class="form-control">

						@error('subcategory_eng')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5>Category Name Hindi  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="subcategory_hin" value="{{$datas->sub_category_hin}}" class="form-control">

						@error('subcategory_hin')

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
