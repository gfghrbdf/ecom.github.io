  function addToCart(){

    
    let pro_name = $('#pname').text();
    let color = $('#collr').val();
    let size = $('#size').val();
    let quantity = $('#qnty').val();
    let id = $('#cart_id').val();


    $.ajax({
      url : "/cart/data/store/"+id,

       type: "post",
      
      // dataType : 'Json',
      
      data : {
      colors: color,
      sizes : size,
      quantitys : quantity,
      pro_names : pro_name,
    },
      
      success : function(data){

      



    if(data.success == 'Product Added On Cart'){

      ShowTotalPrice()
     

        miniCart();

      

               Swal.fire({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000,
                      title: data.success
                    })
             


    }

    $('#addto_closeMod').click();

        

      }

    })

     







  }


    function ShowCartc(){

          $.ajax({

      url : "product/mini/cart",
      type : "GET",
      dataType : "Json",



      success : function(data){

        $('#Cartpage').empty();

        console.log(data)

        $.each(data.carts,function(key,value){

        $('#Cartpage').append(`

          <tr>
          <td class="col-md-2"><img src="${value.options.image}" alt="imga"></td>
          <td class="col-md-7">
            <div class="product-name"><a href="product/details/${value.id}">${value.name}</a></div>
            <div class="rating">
              <i class="fa fa-star rate"></i>
              <i class="fa fa-star rate"></i>
              <i class="fa fa-star rate"></i>
              <i class="fa fa-star rate"></i>
              <i class="fa fa-star non-rate"></i>
              <span class="review">( 06 Reviews )</span>
            </div>
            <div class="price">



           ${value.price}
              
             
            </div>
          </td>
          <td class="col-md-2">

          ${value.options.color}

           
          </td>
            <td class="col-md-2">

          ${value.options.size == null ? `<span>...</span>` :  value.options.size}

           
          </td>

           <td class="col-md-2">

           <button id="${value.rowId}" onclick="Crtinc(this.id)" class="btn btn-primary">+</button>

          <input style="width: 46px;" type="number" min="1" value="${value.qty}">


          ${ value.qty == 1 ? `<button disabled id="${value.rowId}" onclick="CrtDec(this.id)" class="btn btn-danger">-</button>`:`<button id="${value.rowId}" onclick="CrtDec(this.id)" class="btn btn-danger">-</button>`}

          

           
          </td>

        
          

          <td class="col-md-2">

         $ ${value.price * value.qty}

           
          </td>


          <td class="col-md-1 close-btn">
            <a href="#" class="" id="${value.rowId}" onclick="CrtRemov(this.id)"><i class="fa fa-times"></i></a>
          </td>
        


        </tr>


          

          `);




        });

        
  


       

      }


    })


      
    }

    ShowCartc()

    function CrtRemov(id){

      // Cart::remove()

      $.ajax({

        url : "product/cart/remove/"+id,
        type : 'GET',
        dataType : 'Json',
        success : function(data){

          // $('#input_cupon').show()

         ShowTotalPrice()

          miniCart()

          ShowCartc()

          $('#cupon_name').val('')


          
        }

      })



    }

   
  // incre

    function Crtinc(id){


      axios.get('/cartudate/'+id)
  .then(function (response) {
    // handle success
    if(response.data == 1){

       ShowTotalPrice()
      ShowCartc()
        miniCart()
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



    // Dec

    

    function CrtDec(id){

  axios.get('/cartdec/'+id)
  .then(function (response) {
    // handle success
    if(response.data == 1){
       ShowTotalPrice()
      ShowCartc()
        miniCart()
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



    
