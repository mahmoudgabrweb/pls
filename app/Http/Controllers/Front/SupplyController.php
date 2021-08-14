<?php

namespace App\Http\Controllers\Front;

use App\Models\Supply;

class SupplyController extends FrontController
{
    public function show($slug)
    {
        $id = decryptSlug($slug);
        $details = Supply::find($id);
        return view("front.supplies.show", compact("details"));
    }
}
