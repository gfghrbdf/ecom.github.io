
@extends('frontend.main_master')

@section('content')


<div class="body-content">
    
    <div class="container">
        
        <div class="row">
            
        




            @include('frontend.common.userProfile_sidebar')

            <div class="col-lg-2">




               

                


                

            </div>

            <div class="col-lg-6" style="padding: 10px 0;">

        <form method="post" action="{{route('user.profile.password')}}" >
                    
            
        @csrf


                    

                     <div class="form-group">
                        
                        <label>Current Password</label>

                        <input class="form-control" type="password" name="curpassword" >

                    </div>


                     <div class="form-group">
                        
                        <label>New Password</label>

                        <input class="form-control" type="password" name="npassword">

                    </div>


                      <div class="form-group">
                        
                        <label>Conform Password</label>

                        <input class="form-control" type="password" name="cpassword">

                    </div>

                    <?php  echo $id = Auth::user()->id; 





                    ?>

                    <input type="hidden" name="hid_id" value="{{$id}}">

                     



                    <input class="btn btn-primary" type="submit" name="submit" value="sibmit">





                   

                    

                </form>

                

            


            </div>


        </div>

    </div>

</div>






    

   





    


               
@endsection