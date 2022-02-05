@extends('admin.admin_master')

@section('admin')



    

<div class="container">

	<button class="wow">Wow</button>
	
	<div class="row">
		
			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Your Product Sub Sub Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Category </th>
								<th>Sub category</th>
								<th>Sub Sub  English</th>
								

								<th>Action</th>
								
							</tr>
						</thead>

						<tbody>

							@foreach($allsubsubcategory as $ppo)

							<tr>

						<td>{{$ppo['category']['category_name_eng']}}</td>

						<td>{{$ppo['subcategory']['sub_category_eng']}}</td>
								
							
							

							<td>{{$ppo->subsubcategory_eng}}</td>
						

								<td><a title="Edate Data" href="{{route('subsubcategory.edt',$ppo->id)}}" class="btn btn-info btn-sm fa fa-pencil"></a>

								<a title="Delete Data" id="delet" href="{{route('subsubcategory.delete',$ppo->id)}}" class="btn btn-danger btn-sm fa fa-trash"></a>
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
				  <h3 class="box-title">ADD SUB SUB Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('subsub.sotre')}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">



					<div class="form-group">
								<h5> Select Category <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" id="select"  class="form-control cat_id" >
							<option selected="" disabled="">Select Category</option>

							@foreach($allCategories as $category)


							<option value="{{$category->id}}">{{$category->category_name_eng}}</option>

							@endforeach
								



								</select>

									@error('category_id')

									<span class="text-danger">{{$message}}</span>

									@enderror

								</div>
							</div>



							<div class="form-group">
								<h5> Select Sub Category <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory" id="select"  class="form-control subcat_id" >
							<option selected="" disabled="">Select Category</option>



							
								



								</select>

									@error('subcategory')

									<span class="text-danger">{{$message}}</span>

									@enderror

								</div>
							</div>



						


















					<div class="form-group">
					<h5> Sub SubCategory  English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="subsubcategory_eng" class="form-control">

						@error('subsubcategory_eng')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5>Sub Sub Category Hindi  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="subsubcategory_hin" class="form-control">

						@error('subsubcategory_hin')

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
