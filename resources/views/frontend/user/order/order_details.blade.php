
@extends('frontend.main_master')

@section('content')

 @if(Session::has('message'))


  <div style="background: red; width: 60%; margin: auto;">
        
        <h1 style="color: #fff;">

        {{Session::get('message')}}
            

        </h1>
        

</div>





    @endif




<div class="body-content">
    
    <div class="container">
        
        <div class="row">

            @include('frontend.common.userProfile_sidebar')

            <div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4>Shipping Details</h4></div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th> Shipping Name : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> Shipping Phone : </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th> Shipping Email : </th>
               <th> {{ $order->email }} </th>
            </tr>

             <tr>
              <th> Division : </th>
               <th> {{ $order->division->ship_divition }} </th>
            </tr>

             <tr>
              <th> District : </th>
               <th> {{ $order->district->district_name }} </th>
            </tr>

             <tr>
              <th> State : </th>
               <th>{{ $order->state->state_name }} </th>
            </tr>

            <tr>
              <th> Post Code : </th>
               <th> {{ $order->post_code }} </th>
            </tr>

            <tr>
              <th> Order Date : </th>
               <th> {{$order->ordar_date}} </th>
            </tr>

           </table>


         </div> 

        </div>

      </div> <!-- // end col md -5 -->


<!--       <div class="col-md-5">

        @foreach($orderItem as $data)

        @php

        $pro =  DB::table('products')->where('id',$data->product_id)->first();


         @endphp

          <img src="{{asset($pro->product_thumbnail)}}">


        @endforeach


            

            

      </div> -->

                  <div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4>Order Invoice : <span class="text-danger"> {{ $order->invoice_no }}</span> </h4></div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th>  Name : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th>  Phone : </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th> Payment Type : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

             <tr>
              <th> Trnx ID : </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>

             <tr>
              <th> Invoice : </th>
               <th> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th> Order Total : </th>
               <th>${{ $order->ammount }} </th>
            </tr>

            <tr>
              <th> Order : </th>
               <th> {{ $order->post_code }} </th>
            </tr>

            <tr>
              <th> Order Date : </th>
               <th> <span class="badge badge-info">{{$order->status}}</span> </th>
            </tr>

           </table>


         </div> 

        </div>

      </div> <!-- // end col md -5 -->
            

             
             
          




        </div>

      <table style="margin: 10rem 0;" class="table table-striped">
            
            <thead>
                
                <tr>
                        
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Color</th>
                    <th>size</th>
                     <th>Quantity</th>
                     <th>Price</th>


                </tr>

            </thead>
            <tbody>

         @foreach($orderItem as $data)

        @php

        $pro =  DB::table('products')->where('id',$data->product_id)->first();


         @endphp

          <tr>
           
            <td width="10%"><img style="width: 100%" src="{{asset($pro->product_thumbnail)}}"></td>

            <td width="10%">{{$pro->product_name_eng}}</td>
             <td width="10%">{{$data->color}}</td>
              <td width="10%">{{$data->size}}</td>
               <td width="10%">{{$data->qty}}</td>
               <td width="10%">${{$data->price}}</td>

            

        </tr>

          


        @endforeach



                
               

            </tbody>  


      </table>



    </div>

    @if($order->status !== 'Delevared')

    @else

   <div class="container">
        
     <div class="form-group">

        <strong>Return Reason : </strong>
            
        <textarea rows="10" class="form-control" placeholder="Enter Order Reason"> Return Reason </textarea>

    </div>

   </div>

   @endif

</div>

<script type="text/javascript">
    




</script>






    

   





    


               
@endsection