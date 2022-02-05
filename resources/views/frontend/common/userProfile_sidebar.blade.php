        <div class="col-lg-2">
                

<?php 

   $ids = Auth::user()->id;

    $data = DB::table('users')->where('id',$ids)->get();

    $geto = json_decode($data,true);

   
    if( $geto[0]['profile_photo_path'] !=''){
        ?>

        <img style=" width: 40%;height: 40%; border-radius: 50%," src="{{url('upload/user_image/'.$geto[0]['profile_photo_path'])}}" class="img-fluid">


        <?php
    }else{

        ?>

          <img style="width: 40%;height: 40%; border-radius: 50%" src="{{url('upload/istockphoto-1193046540-612x612.jpg')}}" class="img-fluid">



        <?php
    }

    ?>


        <div style="margin: 20px 0;">
            
            <div style="margin: 10px 0;" class="mt-3">
                
                <a class="btn btn-primary btn-block" href="{{route('dashboard')}}">Home</a>

            </div>

             <div style="margin: 10px 0;" class="mt-3">
                
                <a class="btn btn-primary btn-block" href="{{route('user.profile')}}">Profile Update</a>

            </div>

             <div style="margin: 10px 0;" class="mt-3">
                
                <a class="btn btn-primary btn-block" href="{{route('change.password')}}">Change Password</a>

            </div>

            <div style="margin: 10px 0;" class="mt-3">
                
                <a class="btn btn-primary btn-block" href="{{route('user.order')}}">My Order</a>

            </div>

             <div style="margin: 10px 0;" class="mt-3">

              
          
                
                <a class="btn btn-danger btn-block" href="{{ route('user.logout') }}">Logout Password</a>

            

            </div>



        </div>


            </div>