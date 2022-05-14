<?php

namespace App\Http\Controllers\Reference;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClubClass;

class ClubClassController extends Controller
{
    public function index() {
        $clubclasses = ClubClass::orderBy('code','ASC')->get();

        return view('ClubClass.index', [
            'clubclasses' => $clubclasses,
        ]);
    }
}
