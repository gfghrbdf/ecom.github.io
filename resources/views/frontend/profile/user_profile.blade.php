
@extends('frontend.main_master')

@section('content')


<div class="body-content">
    
    <div class="container">
        
        <div class="row">

             @include('frontend.common.userProfile_sidebar')
            


            <div class="col-lg-2">


                

            </div>

            <div class="col-lg-6" style="padding: 10px 0;">

        <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                    
            
        @csrf


                    <div class="form-group">
                        
                        <label>User Name</label>

                        <input class="form-control" type="hidden" name="hid_id" value="{{ $allData[0]['id'] }}">

                        <input class="form-control" type="text" name="name" value="{{ $allData[0]['name'] }}">

                    </div>

                     <div class="form-group">
                        
                        <label>User email</label>

                        <input class="form-control" type="text" name="email" value="{{ $allData[0]['email'] }}">

                    </div>


                     <div class="form-group">
                        
                        <label>User phone</label>

                        <input class="form-control" type="text" name="phone" value="{{ $allData[0]['phone'] }}">

                    </div>

                     <div class="form-group">
                        
                        <label>Update Profile</label>

                        <input class="form-control" type="file" name="profile_photo_path">

                    </div>



                    <input class="btn btn-primary" type="submit" name="submit" value="sibmit">





                   

                    

                </form>

                

            


            </div>


        </div>

    </div>

</div>






    

   





    


               
@endsection