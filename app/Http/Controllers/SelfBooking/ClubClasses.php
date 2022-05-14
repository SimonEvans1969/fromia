<?php

namespace App\Http\Controllers\SelfBooking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClubClass;

class ClubClasses extends Controller
{
    public function showClubClasses(){
        $clubclasses =
            ClubClass::where('status','LIVE')
            ->whereIn('clubclasses.id',function($query){
                $query->select('clubclass_id')->from('classattributes')
                      ->where('classattributes.attribute', '=', 'SelfBook')
                      ->where('classattributes.value', '=', 'Y');
            })->get();

        return view('SelfBooking.index', [
            'clubclasses' => $clubclasses,
        ]);
    }
}
