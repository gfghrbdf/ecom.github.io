<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{csrf_token()}}">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>



<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

 <script src="https://js.stripe.com/v3/"></script>

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')
<!-- ============================================== HEADER : END ============================================== -->

@yield('content')


<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->


@include('frontend.body.footer')




<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script>

<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('frontend/assets/js/
lightbox.min.js')}}"></script> 

<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript" src="{{asset('js/main.js')}}"></script>


<script type="text/javascript">
                    
               @if(Session::has('message')){


                	toastr.success("{{Session::get('message')}}")


                       

                }

              
               @endif

                    </script>


<script type="text/javascript">
  

  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
  })


  function productView(id){


     $('.csv').empty();

     $('#brand').empty();

     $('#code').empty();
      $('#cat').empty();
      $('#collr').empty();
      $('#size').empty();
      $('#dis').empty();
      $('#stockin').empty();
      $('#stockout').empty();
      $('#cart_id').empty();

    $.ajax({

      type : 'GET',
      url : '/product/view/modal/'+id,
      dataType : 'json',
      success : function(data){



        

        $('.csv').append(

          '<img src='+ data.product.product_thumbnail +' class="card-img-top" alt="..." style="width: 200px;height: 200px;" data-img="'+ data.product.product_thumbnail +'">'


          )

         $('#cart_id').val(data.product.id);

        

        $('#pname').text(data.product.product_name_eng)



        if(data.product.discount_price != null){

          $('#price').text(data.product.discount_price)
          $('#dis').text(data.product.seeling_price)

        }else{

          $('#price').text(data.product.seeling_price)


        }  // price section end

        if(data.product.product_qty !=null){

           $('#stockin').text('Available')



        }else{

          $('#stockout').text('Stock Out')
        }








        $('#code').text(data.product.product_code)
         $('#cat').text(data.product.category.category_name_eng)
          $('#brand').text(data.product.brand.brant_en)

          $.each(data.color,function(ps,dat){


            $('#collr').append(' <option value='+ dat +'>'+ dat  +'</option>')

          })

          

          $.each(data.size,function(val,key){

            $('#size').append('<option value='+ key +'> '+ key +' </option>')

            if(data.size == ''){


              $('#sezeDiv').hide();

            }else{

              $('#sezeDiv').show();

            }

          })

        

        



      }

    })

  }







</script>

<script type="text/javascript">




  
  function miniCart(){

    $.ajax({

      url : "product/mini/cart",
      type : "GET",
      dataType : "Json",
      success : function(data){

        $('#cart_subTotal').text(data.total)
        $('#cart_qrt').text(data.Qunty)
        $('.cart_sub').text(data.total)

                let minicart = "";
       $.each(data.carts,function(key,value){



         minicart += `


            <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name} </a></h3>
                      <div class="price">$${value.price} * ${value.qty}</div>
                    </div>
                    <div data-idd="${value.rowId}" class="col-xs-1 action dlt_iddf"> <button class="remove_crt" onclick="tty()" ><i class="fa fa-trash"></i></button> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>

          `





       })

       $('#miniCartDiv').html(minicart)




       

      }


    })


  }

    miniCart();


    // Cart View






    // Cart View



    function tty(){

      let id = $('.dlt_iddf').data('idd')




        $.ajax({

        url : 'product/cart/remove/'+id,
        type : 'GET',
        dataType : 'Json',
        success : function(data){

          ShowCartc()

           miniCart();



         




        }


      })

     



    }




    

      // alert(id)





      

</script>


<script type="text/javascript">
  
  function addTowis(id) {

        $.ajax({
      url : '/wisList/'+id,
      type: 'GET',
      dataType : 'Json',
      success : function(data){





        if(data.ett){

                    Swal.fire({
                      toast: true,
                      position: 'top-end',
                      icon: 'error',
                      showConfirmButton: false,
                      timer: 3000,
                      type: 'error',
                      title: data.ett
                    })

        }

        if(data.success){


               Swal.fire({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                       type: 'success',
                      showConfirmButton: false,
                      timer: 3000,
                      title: data.success
                    })


        }

        if(data.ess){

                    Swal.fire({
                      toast: true,
                      position: 'top-end',
                      icon: 'error',
                      showConfirmButton: false,
                      timer: 3000,
                      type: 'error',
                      title: data.ett
                    })

        }



      }
    })

   



  }


  datt()


function datt(){


    $.ajax({
    url : '/wisList-data-view',
    type : 'GET',
    dataType : 'Json',
    success : function(data){

      $('#wist_product').empty();

            $.each(data,function(key,value){

        $('#wist_product').append(`

          <tr>
          <td class="col-md-2"><img src="${value.product.product_thumbnail}" alt="imga"></td>
          <td class="col-md-7">
            <div class="product-name"><a href="{{url('product/details/${value.product.id}')}}">${value.product.product_name_eng}</a></div>
            <div class="rating">
              <i class="fa fa-star rate"></i>
              <i class="fa fa-star rate"></i>
              <i class="fa fa-star rate"></i>
              <i class="fa fa-star rate"></i>
              <i class="fa fa-star non-rate"></i>
              <span class="review">( 06 Reviews )</span>
            </div>
            <div class="price">

            ${value.product.discount_price == null  ? 

              value.product.seeling_price :

              `${value.product.discount_price}

              <span> ${value.product.seeling_price} $ </span>

              `


            } 
              
             
            </div>
          </td>
          <td class="col-md-2">

      



            <a href="#" class="btn-upper btn btn-primary" id="${value.product.id}" type="button" title="Add Cart " data-toggle="modal" data-target="#exampleModal"  onclick="productView(this.id)">Add to cart</a>
          </td>
          <td class="col-md-1 close-btn">
            <a href="#" class="" id="${value.product.id}" onclick="wisRemov(this.id)"><i class="fa fa-times"></i></a>
          </td>
        </tr>

          `);


      })





    }
  })




}

 function wisRemov(id){

    $.ajax({
      url : '/wist/delet/'+id,
      type : 'GET',
      dataType : 'Json',
      success : function(data){

        if(data == 1){

          Swal.fire({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                       type: 'success',
                      showConfirmButton: false,
                      timer: 3000,
                      title: 'product' 
                    })

           datt()

        }
       
         


        
      }
    })
     
    }




</script>

<script type="text/javascript">
  

  function applyCuppon(){

    let cupon = $('#cupon_name').val();

    axios.post('/cupon-check', {
    cupon_name: cupon,
    
  })
  .then(function (response) {



    if(response.data.succ){

      ShowTotalPrice();

      $('#input_cupon').hide()


      
      Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
     type: 'success',
    showConfirmButton: false,
    timer: 3000,
    title: response.data.succ, 
  })     

      


    }

    if(response.data.err){

     Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'error',
     type: 'success',
    showConfirmButton: false,
    timer: 3000,
    title: response.data.err, 
  })





    }



     




    
  })
  .catch(function (error) {
    console.log(error);
  });

    
  }

</script>

<script type="text/javascript">

  ShowTotalPrice()
    
    function ShowTotalPrice(){

    axios.get('/cupon-get')
  .then(function (response) {

    $('#ShowTotalField').empty()

    if (response.data.total) {

       $('#ShowTotalField').append(`

        <tr>
        <th>
          <div class="cart-sub-total">
            SubTotal<span class="inner-left-md">$${response.data.total}</span>
          </div>
          <div class="cart-grand-total">
            Grand Total<span class="inner-left-md">$${response.data.total}</span>
          </div>
        </th>
      </tr>


        `);


    }else{


      $('#ShowTotalField').append(`

        <tr>
        <th>
          <div class="cart-sub-total">
            Subtotal<span class="inner-left-md">$${response.data.subtotal}</span>
          </div>
          <div class="cart-cupon-name" style="margin: 10px 0;">
            Cupon Name<span class="inner-left-md">${response.data.cupon_name}</span>
            <button title="Remove Cupon" onclick="removeCupon()"><span class="fa fa-times"></span></button>
          </div>
          <div class="cart-cupon-name" style="margin: 10px 0;">
            Discount Ammount<span class="inner-left-md">${response.data.discount_ammount}</span>
          </div>
          <div class="cart-grand-total">
          Grand Ammount <span class="inner-left-md">$${response.data.total_ammount}</span>
          </div>
        </th>
      </tr>


        `);

    }

   
   
    
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });


    }


    // cupon remove


    function removeCupon(){




      axios.get('/cupon-remove')
  .then(function (response) {



     $('#input_cupon').show()

       ShowTotalPrice()
       $('#cupon_name').val('')

    if(response.data.succ){


       Swal.fire({
    toast: true,
    position: 'top-end',
    icon: 'success',
     type: 'success',
    showConfirmButton: false,
    timer: 3000,
    title: response.data.succ, 
  })



    }
    
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });




    }


</script>

  <script type="text/javascript">
    
    function div_lod(){

      let id= $('#show_div').val();
      let url = '/shipping/state-district/'+id;






  axios.get(url)
  .then(function (response) {

     $('#dis_show').empty()

     $('#dis_show').append(`<option disabled selected >Select District...</option>`)


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


    function disChng(){
    let id =  $('#dis_show').val();


     axios.get('/shipping/state-state/'+id)
  .then(function (response) {

    $('#state_show').empty()


   $('#state_show').append(`<option disabled selected >Select State...</option>`)

    $.each(response.data,function(key,value){


      $('#state_show').append(`

        <option value="${value.id}">${value.state_name}</option>

        `)


    })
    
    
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });





    }







  </script>


   
    <script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_51KNxu8IlnHT65dgdiF72dzrpRwFDyRR0DTP8batoTq9AWEuKurIgf9T572Zyq2iYo6soQSU1Kk5IO9tAXJ05a8SL00WGVXEJu7');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
}
</script>








</body>
</html>