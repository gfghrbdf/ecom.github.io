@extends('admin.admin_master')

@section('admin')








	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
<section class="content">

<!-- Basic Forms -->
<div class="box">
<div class="box-header with-border">
  <h4 class="box-title">Edite Product</h4>
  <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
</div>
<!-- /.box-header -->
<div class="box-body">
  <div class="row">
	<div class="col">
		<form action="{{route('product-upd',$all_product->id)}}" method="post">

			@csrf

		  <div class="row">
			<div class="col-12">	

			<div class="row">

								<div class="col-lg-4">

					<div class="form-group">
					<h5>Select Brands <span class="text-danger">*</span></h5>
					<div class="controls">
						<select name="brand_pro" id="select" class="form-control pro_category" >
							<option selected="" disabled="" value="">Select Your Brands</option>

							@foreach($brand as $data)

							<option value="{{$data->id}}" {{($all_product->brand_id == $data->id) ? 'selected' : '' }}>{{$data->brant_en}}</option>

							@endforeach

							




							
						</select>

						@error('brand_pro')
						<span class="text-danger">{{$message}}</span>
						@enderror
					</div>
				</div>
						


				</div>




				
				<div class="col-lg-4">

					<div class="form-group">
					<h5>Select Category <span class="text-danger">*</span></h5>
					<div class="controls">
						<select name="category_pro" id="select" class="form-control pro_category" >
							<option selected="" disabled="" value="">Select Your Category</option>

							@foreach($category as $data)

							<option value="{{$data->id}}" {{($data->id == $all_product->category_id) ? 'selected' : ''}}>{{$data->category_name_eng}}</option>



							@endforeach

							

							

							




							
						</select>

						@error('category_pro')
						<span class="text-danger">{{$message}}</span>
						@enderror
					</div>
				</div>
						


				</div>


				<div class="col-lg-4">

					<input type="hidden" name="" class="hide_sub_cat_id">


					<div class="form-group">
					
					<h5>Sub Category <span class="text-danger">*</span></h5>
					<div class="controls">
						<select name="sub_category" id="select" class="form-control sub_cat_pro" >
							<option selected="" disabled="" value="">Select Your Sub Category</option>



							

								@foreach($subcategory as $data)

							<option value="{{$data->id}}" {{($data->id == $all_product->subcategory_id) ? 'selected' : ''}} >{{$data->sub_category_eng}}</option>



							@endforeach




							
						</select>

						@error('sub_category')

						<span class="text-danger">{{$message}}</span>

						@enderror

					</div>
				</div>
						
					

				</div>


				<div class="col-lg-4">


					<div class="form-group">
					
					<h5>Sub Sub Category <span class="text-danger">*</span></h5>
					<div class="controls">
						
						<select name="sub_sub_category" id="select" class="form-control sub_sub_cat_pro" >


							<option selected="" disabled="" value="">Select Your Category</option>


								@foreach($subsubcategory as $data)

							<option value="{{$data->id}}" {{($data->id == $all_product->subsubcategory_id) ? 'selected' : ''}} >{{$data->subsubcategory_eng}}</option>



							@endforeach


							
						</select>

						@error('sub_sub_category')

						<span class="text-danger">{{$message}}</span>

						@enderror
					
					</div>
				
				</div>
						
					

				</div>


					<div class="col-lg-4">

				<div class="form-group">
					<h5>Product Name English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" value="{{$all_product->product_name_eng}}" name="product_name_eng" class="form-control"> <div class="help-block"></div></div>

						@error('product_name_eng')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>
				
			</div>



					<div class="col-lg-4">

				<div class="form-group">
					<h5>Product Name Hindi <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" value="{{$all_product->product_name_hin}}" name="product_name_hindi" class="form-control"> <div class="help-block"></div></div>

						@error('product_name_hindi')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>
				
			</div>


				<div class="col-lg-4">

				<div class="form-group">
					<h5>Product Code <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" value="{{$all_product->product_code}}" name="product_code" class="form-control"> <div class="help-block"></div></div>

						@error('product_code')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>
				
			</div>


			<div class="col-lg-4">

				<div class="form-group">
					<h5>Product Quantity <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" value="{{$all_product->product_qty}}" name="product_qty" class="form-control"> <div class="help-block"></div></div>

						@error('product_qty')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>
				
			</div>


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Tags Eng <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" value="{{$all_product->product_tags_eng}}" name="product_tags_eng" class="form-control"  data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_tags_eng')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>









			</div>	


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Tags Hindi <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" value="{{$all_product->product_tags_hin}}" name="product_tags_hin" class="form-control" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_tags_hin')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>




			</div>


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Size English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_size_eng" class="form-control" value="{{$all_product->product_sige_eng}}" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_size_eng')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>	


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Size Hindi <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_size_hin" class="form-control" value="{{$all_product->product_sige_hin}}" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_size_hin')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>	



			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Color English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_color_eng" class="form-control" value="{{$all_product->product_color_eng}}" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_color_eng')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Color Hindi <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_color_hin" class="form-control" value="{{$all_product->product_color_hin}}" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_color_hin')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Seeling Price <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" value="{{$all_product->seeling_price}}" name="product_seeling_price" class="form-control" > <div class="help-block"></div></div>

						@error('product_seeling_price')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>	


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Discount Price <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" value="{{$all_product->discount_price}}" name="product_discount_price" class="form-control" > <div class="help-block"></div></div>

						@error('product_discount_price')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>	


			<div class="col-lg-4">






			</div>	


			<div class="col-lg-4">


			



			</div>

			
			<div class="col-lg-6">

				<div class="form-group">
					<h5>Short Description English <span class="text-danger">*</span></h5>
					<div class="controls">
						<textarea name="short_des_eng" id="textarea" class="form-control" placeholder="Textarea text">
							
							{{$all_product->short_descrip_eng}}
						</textarea>
					</div>

					@error('short_des_eng')
					<span class="text-danger">{{$message}}</span>
					@enderror


				</div>
				


			</div>	


				<div class="col-lg-6">

				<div class="form-group">
					<h5>Short Description Hindi <span class="text-danger">*</span></h5>
					<div class="controls">
						<textarea name="short_des_hin" id="textarea" class="form-control" placeholder="Textarea text">
							{{ $all_product->short_descrip_hin }}
						</textarea>
					</div>

					@error('short_des_hin')
					<span class="text-danger">{{$message}}</span>
					@enderror


				</div>
				


			</div>



	<div class="col-lg-6">

					 <div class="box">
				<div class="box-header">
				  <h4 class="box-title">Long Description<br>
					<!-- <small>Advanced and full of features</small> -->
				  </h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				 
			<textarea id="editor1" name="long_description_eng" rows="10" cols="80">

					{{$all_product->long_descrip_eng}}
									
			</textarea>

			@error('long_description_eng')

			<span>{{$message}}</span>

			@enderror
				 
				</div>
			  </div>
				


			</div>



				<div class="col-lg-6">

						 <div class="box">
				<div class="box-header">
				  <h4 class="box-title">Long Description Hindi<br>
					<!-- <small>Advanced and full of features</small> -->
				  </h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				 
			<textarea id="editor2" name="long_description_hin" rows="10" cols="80">

				{{$all_product->long_descrip_hin}}
									
			</textarea>

			@error('long_description_hin')

			<span>{{$message}}</span>

			@enderror
				 
				</div>
			  </div>
				


			</div>

			<hr>



					<div class="col-md-6">
					<div class="form-group">
						
						<div class="controls">
							<fieldset>

								@if($all_product->hot_deals == 1)

								<input name="hot_deals" checked type="checkbox" id="checkbox_2"  value="1">

								@else

									<input name="hot_deals" type="checkbox" id="checkbox_2"  value="1">

								@endif


								
								<label for="checkbox_2">Hot Deals</label>
							</fieldset>
							<fieldset>

									@if($all_product->featured == 1)

								<input checked name="featured" type="checkbox" id="checkbox_3" value="1">

								@else

									<input name="featured" type="checkbox" id="checkbox_3" value="1">

								@endif



							
								<label for="checkbox_3">Featured</label>
							</fieldset>
						</div>
					</div>
				</div>


						<div class="col-md-6">
					<div class="form-group">
						
						<div class="controls">
							<fieldset>

								@if($all_product->spacial_offer == 1)

								<input name="special_offer" checked type="checkbox" id="checkbox_4"  value="1">

								@else

								<input name="special_offer" type="checkbox" id="checkbox_4"  value="1">

								@endif


								
								<label for="checkbox_4">Special Offers</label>
							</fieldset>
							<fieldset>

								@if($all_product->spacial_deals == 1)

								<input name="special_deals" checked type="checkbox" id="checkbox_5" value="1">

								@else

							<input name="special_deals" type="checkbox" id="checkbox_5" value="1">

								@endif



								
								<label onautocomplete="special_deals" for="checkbox_5">Special Deals</label>
							</fieldset>
						</div>
					</div>
				</div>



















			</div>				
			
			
				

				


				







				


				
			</div>
		  </div>
		
			
			
			<div class="text-xs-right">

				<input type="submit" class="btn btn-rounded btn-primary" name="" value="Update Product">

			
				
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


		<div class="container">
			
			<div class="row">
				
				<div class="col-md-12 col-12">
				<div class="box box-outline-info">
				  <div class="box-header">
					<h4 class="box-title"><strong>Product Multiple Image Update</strong></h4>


				



					<div class="box-tools pull-right">					
						<ul class="box-controls">
						  <li><a class="box-btn-close" href="#"></a></li>
						</ul>
					</div>

				  </div>

				  <!-- multiple img upd -->

			<form style="margin: 20px 0" method="post" action="{{route('multiimg-upload',$all_product->id)}}" enctype="multipart/form-data">
				  	
				  	@csrf

				  	<div style="margin: 15px 15px;" class="upload_more">

				  		<small>More Image Upload</small>
						
						<div class="form-group"> <input type="file" class="form-control" name="upd_img[]" id="multi_img" multiple> </div>

						<div style="margin: 10px 10px;">

							<div class="row" id="img_show"></div>
							

						</div>

						<hr>

					</div>

					<button class="btn btn-primary">Upload Image</button>


				  </form>

				
				 



				  <form action="{{route('update-pro-image')}}" method="post" enctype="multipart/form-data">

				  	@csrf	




				  	<div class="row">






				  		@foreach($multi as $data)

				  			<div class="col-md-3">

				  				<div class="container">

				  				<div class="card">
				  					
				  					<img src="{{asset($data->photo_name)}}">

				  				</div>

				  				<a href="{{route('multiimg-delete',$data->id)}}" id="pro_delete" title="delete" class="btn btn-danger fa fa-trash"></a>
				  			</div>

				  			<div class="form-group container m-5">

				  				<label class="form-control-label">Upload Image</label>


				  				<input type="file" name="multi_img[{{$data->id}}]" class="form-control">
				  				


				  			</div>
				  				

				  			</div>



				  		@endforeach
				  		
				  	

				  	</div>


				  	<button style="margin: 15px;" class="btn btn-primary">Update Multi Image</button>

							  	

				  </form>




				</div>
			  </div>

			</div>

		</div>


		<!-- img thumb -->

		<div class="col-md-6 col-12">
				<div class="box box-outline-info">
				  <div class="box-header">
					<h4 class="box-title"><strong>Thumb Image Upload</strong></h4>
					<div class="box-tools pull-right">					
						<ul class="box-controls">
						  <li><a class="box-btn-close" href="#"></a></li>
						</ul>
					</div>
				  </div>


				  <form method="post" action="
				  {{route('upload-thumb',$all_product->id)}}" enctype="multipart/form-data">
				  		
				  	@csrf

				  	<div class="form-group" style=" margin: 20px;width: 90%;">

				  		<small>Thumb Image Upload</small>
				  		
				  		<input type="file" name="product_image" class="form-control thumb_pro_img" onchange="mainThumbUrl(this)"> 
						
					

				  	</div>

				 
				  	<button style="margin: 20px" class="btn btn-primary">Upload Thumb</button>








				  </form>

				   <img style="width: 25%; margin: 20px" src="{{asset($all_product->product_thumbnail)}}" >

				 

				 
				</div>
			  </div>



		<!-- end -->






	  </div>
  



@endsection
