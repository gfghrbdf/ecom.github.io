
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
            

             <div class="col-lg-2">
             </div>
          

            <div class="col-lg-8">

                <table class="table table-striped">

                    <tr>
                        <td> <div class="col-lg-1">
                            Date
                        </div></td>

                        <td> <div class="col-lg-3">
                            Total
                        </div></td>

                        <td> <div class="col-lg-1">
                            Payment
                        </div></td>

                        <td> <div class="col-lg-1">
                            Invoice
                        </div></td>

                        <td> <div class="col-lg-1">
                            Order
                        </div></td>

                        <td> <div class="col-lg-1">
                            Action
                        </div></td>
                       
                    </tr>
                   

                    <tbody>
                            
                        @foreach($orders as $order)

                        <tr>

                            <td>{{$order->ordar_date}}</td>
                            <td>${{$order->ammount}}</td>
                            <td>{{$order->payment_method}}</td>
                            <td>{{$order->invoice_no}}</td>
                            <td><span class="badge badge-info">{{$order->status}}</span></td>
                            <td><div><a class="btn btn-primary btn-sm" href="{{url('user/order_details/'.$order->id)}}"><i class="fa fa-eye"></i>View</a></div>

                                <div><a style="margin-top: 10px;" class="btn btn-danger btn-sm" href="{{url('user/invoice_download/'.$order->id)}}"><i class="fa fa-download"></i>Invoice</a></div>

                            </td>
                           
                                    
                                


       
                        </tr>

                        @endforeach



                    </tbody>
                    

                </table>
                


            </div>


        </div>

    </div>

</div>

<script type="text/javascript">
    




</script>






    

   





    


               
@endsection