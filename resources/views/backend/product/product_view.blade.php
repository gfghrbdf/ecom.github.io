@extends('admin.admin_master')

@section('admin')

<div class="container">
	
	<div class="row">
		
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Manage  Product</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Product En</th>
								<th>Product Price</th>
								<th>Quantity</th>
								<th>Discount</th>
								<th>Status</th>
								<th>Action</th>


								
							</tr>
						</thead>

						<tbody>

							@foreach($allPro as $ppo)


							<tr>


								
							<td width="10%"><img style="width: 100%;" class="img-fluid" src="{{asset($ppo->product_thumbnail)}}"> </td>

							<td>{{$ppo->product_name_eng}}</td>

							<td>{{$ppo->seeling_price}} $</td>

							<td>{{$ppo->product_qty}} pics</td>



							<td> 

			@if($ppo->discount_price != '')

			@php

	$amount = $ppo->seeling_price - $ppo->discount_price;

	$dis = ($amount / $ppo->seeling_price) * 100;

	$mini = 100-$dis;

								@endphp

						<span class="badge badge-primary">
							 {{round($mini) }}% 

							</span>



								@else

								<span class="badge badge-danger">
							 	No Discount 

							</span>

								@endif


								 </td>

							<td>

								@if($ppo->status == '1')

					 <span class="badge badge-success"> Active </span> 

								

								@else

								 <span class="badge badge-danger"> Block </span> 

								 @endif



								</td>

								<td>

						<a title="see Details" href="" class="btn btn-primary btn-sm"><span class="fa fa-eye"></span></a>

						@if($ppo->status == '1')

						<a title="InActive Now" href="{{route('product.inactive',$ppo->id)}}" class="btn btn-danger btn-sm"><span class="fa fa-arrow-down"></span></a>



						@else

						<a title="Active Now" href="{{route('product.active',$ppo->id)}}" class="btn btn-primary btn-sm"><span class="fa fa-arrow-up"></span></a>

						@endif

				

			<a href="{{route('product-edt',$ppo->id)}}" title="Edate" class="btn btn-primary btn-sm" href=""><span class="fa fa-pencil"></span></a>
									
	<a title="Delete" id="delet" class="btn btn-danger btn-sm" href="{{route('delete-product',$ppo->id)}}"><span class="fa fa-trash"></span></a>


									

								

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