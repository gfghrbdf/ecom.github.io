<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title>Easy E-commerce Admin - Dashboard</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">

  <!-- toster -->

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">


  @include('admin.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->

  @include('admin.body.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @yield('admin')

  </div>
  <!-- /.content-wrapper -->

  @include('admin.body.footer')

 
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
    <!-- jquery -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	 
	<!-- Vendor JS -->
	<script src="{{asset('backend/js/vendors.min.js')}}"></script>

    <script src="{{asset('backend/js/custom.js')}}"></script>

  <script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>
    	
	<script src="{{asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
	<script src="{{asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
	
  <script src="{{asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

    <script src="{{asset('assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>

    <script src="{{asset('assets/vendor_components/ckeditor/ckeditor.js')}}"></script>

    <script src="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>


    <script src="{{asset('backend/js/pages/editor.js')}}"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	
	<!-- Sunny Admin App -->
	<script src="{{asset('backend/js/template.js')}}"></script>
	<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>

      <script src="{{asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>

      <script src="{{asset('backend/js/pages/data-table.js')}}"></script>

  <!-- toster js -->

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>





  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



  <script type="text/javascript">


      @if(Session::has('message')){

      let alert_type = "{{ Session::get('type') }}"

      if(alert_type == 'success'){

        toastr.success("{{ Session::get('message') }}")

      }else if(alert_type == 'danger'){

        toastr.warning("{{ Session::get('message') }}")

      }

    }

    @endif

   





    $(function(){


       $(document).on('click','#delet',function(e){

        e.preventDefault();

        let link = $(this).attr('href');





        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link; 
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})





      })



    })
      
     

  </script>









  <script type="text/javascript">







    
    @if(Session::has('message')){

      let alert_ty = "{{ Session::get('alert-type') }}"

     if(alert_ty == 'success'){

      toastr.success("{{Session::get('message')}}")

     }

 

    




    }

    @endif

  </script>

  <script type="text/javascript">
    
    $(document).ready(function(){

      $('select[name="category_id"]').on('change',function(){

      let category_id = $('.cat_id').val();

      if(category_id){

        $.ajax({

          url : "{{url('/category/subcategory/ajax')}}/"+category_id ,

          type : "GET",

          dataType : 'json',

          success : function(data){

            $('.subcat_id').empty();

            $.each(data, function(key, value){

              

               $('.subcat_id').append(`

                <option value="${value.id}">${value.sub_category_eng}</option>

                `)




            })

           



           

          }



        })
    


      }



     

      });

      

    })



    $('.pro_category').change(function(){



      let cat_id = $(this).val();

      $.ajax({

        

        url : "{{url('/product/getCat/ajax')}}/"+cat_id,
        type : 'GET',
        dataType : 'json',
        success : function(data){

          $('.sub_sub_cat_pro').html('');

            $('.sub_cat_pro').empty();

          if(data.length == 1){


          



          $.each(data,function(key,value){

            

            $('.sub_cat_pro').append(`<option value="${value.id }">${value.sub_category_eng }</option>`)

           

            singlesubCat(value.id)



          })









          }else{


             $('.sub_cat_pro').empty();

              $('.sub_cat_pro').append(`<option value="" >Select Sub Cat ....</option>`)

          $.each(data,function(key,value){

            

            $('.sub_cat_pro').append(`<option class="sub_ps_id" value="${value.id }">${value.sub_category_eng }</option>`)



          })


          }

          

          

          
        }

      })

      

    })






    function singlesubCat(dataid){



            $.ajax({

        

        url : "{{url('/product/subCat/ajaxs')}}/"+dataid,
        type : 'GET',
        dataType : 'json',
        success : function(data){

       

          $('.sub_sub_cat_pro').empty();

          $.each(data,function(key,value){

           

            $('.sub_sub_cat_pro').append(`<option value="${value.id }">${value.subsubcategory_eng }</option>`)



          })

          
        }

      })





    }





    $('.sub_cat_pro').change(function(){


            let subcat_id = $(this).val();


            



            $.ajax({

        

        url : "{{url('/product/subCat/ajaxs')}}/"+subcat_id,
        type : 'GET',
        dataType : 'json',
        success : function(data){

       

          $('.sub_sub_cat_pro').empty();

          $.each(data,function(key,value){

           

            $('.sub_sub_cat_pro').append(`<option value="${value.id }" class='fgfdg'>${value.subsubcategory_eng }</option>`)



          })

          
        }

      })











    })

    function mainThumbUrl(input){

     

     
      

     if(input.files && input.files[0]){

      let reader = new FileReader;

      reader.readAsDataURL(input.files[0])
     
      reader.onload=function(e){

        $('.thumb_src').attr('src',e.target.result)

      }






     }


    }






      $(document).ready(function(){
   $('#multi_img').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img class="m-5" />').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#img_show').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });





    $('.slider_imgs').change(function(){

      let load = new FileReader;

      load.readAsDataURL(this.files[0]);

      load.onload=(function(e){

        $('.img_src').attr('src',e.target.result);

      })




    })

  </script>

  <script type="text/javascript">
    
    function div_lod(){

      let id= $('#show_div').val();
      let url = '/shipping/state-district/'+id;






  axios.get(url)
  .then(function (response) {

     $('#dis_show').empty()


    $.each(response.data,function(key,value){

          $('#dis_show').append(`

      <option value="${value.id}">${value.district_name}</option>


      `)


    })



    
  })
  .catch(function (error) {
   
    console.log(error);
  })
  .then(function () {
   
  });

     
    }





  </script>
	
	
</body>
</html>
