@extends('admin.admin_master')

@section('admin')








	  <div class="container-full">
		<!-- Content Header (Page header) -->
		  

		<!-- Main content -->
<section class="content">

<!-- Basic Forms -->
<div class="box">
<div class="box-header with-border">
  <h4 class="box-title">Add Product</h4>
  <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
</div>
<!-- /.box-header -->
<div class="box-body">
  <div class="row">
	<div class="col">
		<form action="{{route('product-store')}}" method="post" enctype="multipart/form-data">

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

							<option value="{{$data->id}}">{{$data->brant_en}}</option>



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

							<option value="{{$data->id}}">{{$data->category_name_eng}}</option>



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
							<option selected="" disabled="" value="">Select Your Category</option>



							

							




							
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
						<input type="text" name="product_name_eng" class="form-control"> <div class="help-block"></div></div>

						@error('product_name_eng')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>
				
			</div>



					<div class="col-lg-4">

				<div class="form-group">
					<h5>Product Name Hindi <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_name_hindi" class="form-control"> <div class="help-block"></div></div>

						@error('product_name_hindi')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>
				
			</div>


				<div class="col-lg-4">

				<div class="form-group">
					<h5>Product Code <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_code" class="form-control"> <div class="help-block"></div></div>

						@error('product_code')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>
				
			</div>


			<div class="col-lg-4">

				<div class="form-group">
					<h5>Product Quantity <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_qty" class="form-control"> <div class="help-block"></div></div>

						@error('product_qty')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>
				
			</div>


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Tags Eng <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_tags_eng" class="form-control" value="" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_tags_eng')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>









			</div>	


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Tags Hindi <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_tags_hin" class="form-control" value="" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_tags_hin')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>




			</div>


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Size English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_size_eng" class="form-control" value="Small,Medium,Large" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_size_eng')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>	


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Size Hindi <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_size_hin" class="form-control" value="Small,Medium,Large" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_size_hin')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>	



			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Color English <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_color_eng" class="form-control" value="Red,Black,Blue" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_color_eng')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Color Hindi <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_color_hin" class="form-control" value="Red,Black,Blue" data-role="tagsinput" placeholder="add tags"> <div class="help-block"></div></div>

						@error('product_color_hin')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Seeling Price <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_seeling_price" class="form-control" > <div class="help-block"></div></div>

						@error('product_seeling_price')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>	


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Product Discount Price <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="text" name="product_discount_price" class="form-control" > <div class="help-block"></div></div>

						@error('product_discount_price')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>



			</div>	


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Main Thumbnail <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="file" name="product_image_thumb" class="form-control thumb_pro_img" onchange="mainThumbUrl(this)"> <div class="help-block"></div></div>

						@error('product_image_thumb')

						<span class="text-danger">{{$message}}</span>

						@enderror
				</div>

				<img style="width: 60%;" src="" class="thumb_src">



			</div>	


			<div class="col-lg-4">


				<div class="form-group">
					<h5>Multi Image <span class="text-danger">*</span></h5>
					<div class="controls">
						<input type="file" name="multi_img[]" class="form-control" multiple id="multi_img"> <div class="help-block"></div></div>

						@error('multi_img')

						<span class="text-danger">{{$message}}</span>

						@enderror


						<div class="row" id="img_show"></div>

				</div>



			</div>

			
			<div class="col-lg-6">

				<div class="form-group">
					<h5>Short Description English <span class="text-danger">*</span></h5>
					<div class="controls">
						<textarea name="short_des_eng" id="textarea" class="form-control" placeholder="Textarea text"></textarea>
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
						<textarea name="short_des_hin" id="textarea" class="form-control" placeholder="Textarea text"></textarea>
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
								<input name="hot_deals" type="checkbox" id="checkbox_2"  value="1">
								<label for="checkbox_2">Hot Deals</label>
							</fieldset>
							<fieldset>
								<input name="featured" type="checkbox" id="checkbox_3" value="1">
								<label for="checkbox_3">Featured</label>
							</fieldset>
						</div>
					</div>
				</div>


						<div class="col-md-6">
					<div class="form-group">
						
						<div class="controls">
							<fieldset>
								<input name="special_offer" type="checkbox" id="checkbox_4"  value="1">
								<label for="checkbox_4">Special Offers</label>
							</fieldset>
							<fieldset>
								<input name="special_deals" type="checkbox" id="checkbox_5" value="1">
								<label onautocomplete="special_deals" for="checkbox_5">Special Deals</label>
							</fieldset>
						</div>
					</div>
				</div>



















			</div>				
			
			
				

				


				







				


				
			</div>
		  </div>
		
			
			
			<div class="text-xs-right">

				<input type="submit" class="btn btn-rounded btn-primary" name="" value="Add Producr">

			
				
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
