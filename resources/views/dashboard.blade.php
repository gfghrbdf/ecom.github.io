
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






            <div class="col-lg-2">sfd</div>

            <div class="col-lg-6">sfd</div>


        </div>

    </div>

</div>

<script type="text/javascript">
    




</script>






    

   





    


               
@endsection