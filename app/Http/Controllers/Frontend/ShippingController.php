<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Upazila;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function divToDis(Request $request)
    {
        $districts = District::where('division_id', $request->division_id)->get();
        if($districts->count() == 0){
            $str_to_send = "<option value=''>>--No District at database--<</option>";
        }else{
            $str_to_send = "<option value=''>>--Choose One--<</option>";
        }
        foreach($districts as $district){
            $str_to_send .= "<option value='$district->id'>$district->name</option>";
        }
        echo $str_to_send;
    }

    // public function disToUpazila(Request $request)
    // {
    //     $upazilas = Upazila::where('district_id', $request->district_id)->get();
    //     if($upazilas->count() == 0){
    //         $str_to_send = "<option value=''>>--No Upazila at database--<</option>";
    //     }else{
    //         $str_to_send = "<option value=''>>--Choose One--<</option>";
    //     }
    //     foreach($upazilas as $upazila){
    //         $str_to_send .= "<option value='$upazila->id'>$upazila->name</option>";
    //     }
    //     echo $str_to_send;
    // }
}
