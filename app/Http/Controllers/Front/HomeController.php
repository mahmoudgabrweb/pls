<?php

namespace App\Http\Controllers\Front;

use App\Models\Engineer;
use App\Models\Slider;
use App\Models\Machine;
use App\Models\Material;
use App\Models\Supply;

class HomeController extends FrontController
{
    public function index()
    {
        $data['sliders'] = Slider::where("is_active", 1)->orderBy("the_order", "asc")->get();

        $data['new_machines'] = Machine::where("is_active", 1)->where("type", 1)->get();
        $data['used_machines'] = Machine::where("is_active", 1)->where("type", 0)->get();

        $data['new_supplies'] = Supply::where("is_active", 1)->where("type", 1)->get();
        $data['used_supplies'] = Supply::where("is_active", 1)->where("type", 0)->get();

        $data['materials'] = Material::where("is_active", 1)->get();

        $data['engineers'] = Engineer::where("is_active", 1)->get();

        return view("front.index", compact("data"));
    }

    public function engineers()
    {
        $records = Engineer::where("is_active", 1)->paginate(12);

        return view("front.engineers.index", compact("records"));
    }
}
