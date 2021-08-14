<?php

namespace App\Http\Controllers\Front;

use App\Models\Machine;

class MachineController extends FrontController
{
    public function show($slug)
    {
        $id = decryptSlug($slug);
        $details = Machine::find($id);
        return view("front.machines.show", compact("details"));
    }
}
