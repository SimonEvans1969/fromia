<?php

namespace App\View\Components\SelfBooking;

use Illuminate\View\Component;
use App\Models\ClubClass;
use App\Models\ClassAttribute;
use Illuminate\Support\Facades\Auth;

class ClassPanel extends Component
{
    public $classId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $classId )
    {
        $this->classId = $classId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $clubclass = ClubClass::find($this->classId);

        $membersOnly = ClassAttribute::where('clubclass_id','=',$this->classId)
            ->where('attribute','=','MembersOnly')->first();

        $bookable = new \stdClass();
        if ((!$membersOnly) || ($membersOnly->value == 'N') || (Auth::check()) ) { // Add type later
            $bookable->canBook = true;
            $bookable->message = null;
        } else {
            $bookable->canBook = false;
            $bookable->message = "Members Only Class";
        }

        return view('components.self-booking.class-panel',
            [
                'clubclass' => $clubclass,
                'bookable' => $bookable,
            ]);
    }
}
