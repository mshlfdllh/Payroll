<?php

namespace App\Livewire\Admin;

use App\Models\Attendance as ModelsAttendance;
use Livewire\Component;

class Attendaces extends Component
{
    public function render()
    {
        $attendances = ModelsAttendance::all();
        return view('livewire.admin.attendaces', compact('attendances'));
    }
}
