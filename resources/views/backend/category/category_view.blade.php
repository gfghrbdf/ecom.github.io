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
								<th>Category Icon</th>
								<th>Category English</th>
								<th>Category Hindi</th>
								<th>Action</th>
								
							</tr>
						</thead>

						<tbody>

							@foreach($category as $ppo)

							<tr>
								
							<td> <span class="{{$ppo->category_icon}}"></span> </td>

								<td>{{$ppo->category_name_eng}}</td>

							<td>{{$ppo->category_name_hin}}</td>

								<td><a title="Edate Data" href="{{route('category.edate',$ppo->id)}}" class="btn btn-info btn-sm fa fa-pencil"></a>

								<a title="Delete Data" id="delet" href="{{route('category.delete',$ppo->id)}}" class="btn btn-danger btn-sm fa fa-trash"></a>
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
				  <h3 class="box-title">ADD Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">

			<form method="post" action="{{route('category.store')}}">

			@csrf

		  <div class="row">
			<div class="col-12">


			<div class="row">
					
				<div class="col-lg-12">


						<div class="form-group">
					<h5> Category Icon <span class="text-danger">*</span></h5>
					<div class="controls">
				<input type="text" name="category_icn" class="form-control">

						@error('category_icn')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5> Category Name English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="category_eng" class="form-control">

						@error('category_eng')

						<span class="text-danger"> {{$message}}  </span>

						

						@enderror

						 <div class="help-block"></div></div>
				
				</div>


					<div class="form-group">
					<h5>Category Name Hindi  <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="category_hin" class="form-control">

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
