<?php

namespace App\Http\Controllers\backend;
use App\Models\ShipDivition;
use App\Models\ShipDistrict;
use App\Models\ShipState;




use Carbon\Carbon;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ShippingController extends Controller
{
    function ShippingView(){
         $divisons =  ShipDivition::orderBy('id','DESC')->get();

       

        return view('backend.shiping.shipingDivision.shipingdivision',compact('divisons'));
    }

    public function ShippingStore(Request $request){

        $request->validate([

            'division_name' => 'required',


        ]);

        $ins = ShipDivition::insert(['ship_divition'=>$request->division_name,'created_at'=>Carbon::now()]);

        if ($ins) {

        $notification = [

                'message' => 'ship Division Added Sussfully',

                'type' => 'success',
            ];

        
           return redirect()->back()->with($notification);
       }

    }

    public function ShippingUpdate($id){

        $divition = ShipDivition::find($id);  
        return view('backend.shiping.shipingDivision.shipingdivision_edt',compact('divition'));
              

    }

        public function ShippingEdate(Request $request){

        $ins = ShipDivition::where('id',$request->ship_divition_hid)->update(['ship_divition'=>$request->ship_name,'updated_at'=>Carbon::now()]);

        if ($ins) {

        $notification = [

                'message' => 'ship Division updated Sussfully',

                'type' => 'success',
            ];

        
           return redirect('shipping/view')->with($notification);
       }

    }

    

        public function ShippingDelete($id){

        $dlt = ShipDivition::find($id)->delete(); 

        if ($dlt) {

        $notification = [

                'message' => 'ship Division deleted Sussfully',

                'type' => 'danger',
            ];

        
           return redirect('shipping/view')->with($notification);
       }

      
              

    }

     function DistrictView(){

         $divisons =  ShipDivition::orderBy('id','DESC')->get();
      
        $districts =  ShipDistrict::with('division')->orderBy('id','DESC')->get();
      
        return view('backend.shiping.shipingDistrict.shipingdistrict',compact('districts','divisons'));
    }


    

        public function districtStore(Request $request){

        $request->validate([

            'district_names' => 'required',
            
            'division_name' => 'required',


        ]);

        $ins = ShipDistrict::insert(['divison_id'=>$request->division_name,'district_name'=>$request->district_names,'created_at'=>Carbon::now()]);

        if ($ins) {

        $notification = [

                'message' => 'Ship District Added Sussfully',

                'type' => 'success',
            ];

        
           return redirect()->back()->with($notification);
       }

    }


            public function districtDelete($id){

        $dlt = ShipDistrict::find($id)->delete(); 

        if ($dlt) {

        $notification = [

                'message' => 'Ship District deleted Sussfully',

                'type' => 'danger',
            ];

        
           return redirect('shipping/district-view')->with($notification);
       }

      
              

    }

    public function districtUpdate($id){

         $divisons =  ShipDivition::orderBy('id','DESC')->get();

          $district = ShipDistrict::find($id);  
        return view('backend.shiping.shipingDistrict.shipingdistrict_edt',compact('district','divisons'));



    }

         public function districtEdate(Request $request){

        $request->validate([

            'district_names' => 'required',
            
            'division_name' => 'required',


        ]);

        $ins = ShipDistrict::where('id',$request->ship_district_hid)->update(['divison_id'=>$request->division_name,'district_name'=>$request->district_names,'updated_at'=>Carbon::now()]);

        if ($ins) {

        $notification = [

                'message' => 'Ship District updated Sussfully',

                'type' => 'success',
            ];

        
           return redirect('shipping/district-view')->with($notification);
       }

    }

    // Ship State

    public function stateView(){

         $divisons =  ShipDivition::orderBy('id','DESC')->get();
          $districts =  ShipDistrict::orderBy('id','DESC')->get();

         $states =  ShipState::with('division','district')->orderBy('id','DESC')->get();

       

        return view('backend.shiping.shipingState.shipingState',compact('states','divisons','districts'));


    }

    public function stateStore(Request $request){

         $request->validate([

            'state_name' => 'required',           
            'division_name' => 'required',
            'district_name' => 'required',


        ]);

         $ins = ShipState::insert(['divison_id'=>$request->division_name,'district_id'=>$request->district_name,'state_name'=>$request->state_name]);

        if ($ins) {

        $notification = [

                'message' => 'Ship District Inserted Sussfully',

                'type' => 'success',
            ];

        
           return redirect('shipping/state-view')->with($notification);
       }





    }


    public function stateDelete($id){

        $dlt = ShipState::find($id)->delete(); 

        if ($dlt) {

        $notification = [

                'message' => 'Ship State deleted Sussfully',

                'type' => 'danger',
            ];

        
           return redirect('shipping/state-view')->with($notification);
       }


    }


    public function getDistrtict($id){

        $dis = ShipDistrict::where('divison_id',$id)->orderBy('id','DESC')->get();

        return $dis;




    }


    public function StateUpdate($id){
        $states = ShipState::find($id);

        $divisons =  ShipDivition::orderBy('id','DESC')->get();
         $districts =  ShipDistrict::orderBy('id','DESC')->get();
return view('backend.shiping.shipingState.shipingdivision_edt',compact('states','divisons','districts'));


        
    }

    public function stateEdate(Request $request){


        $ins = ShipState::where('id',$request->ship_state_hid)->update(['divison_id'=>$request->division_name,'district_id'=>$request->district_name,'state_name'=>$request->state_name]);

        if ($ins) {

        $notification = [

                'message' => 'Ship State updated Sussfully',

                'type' => 'success',
            ];

        
           return redirect()->route('state-show')->with($notification);
       }



    }


    public function getState($id){

        $state = ShipState::where('district_id',$id)->get();

        return $state;
       

    }

    // end Ship State

    

    
}
