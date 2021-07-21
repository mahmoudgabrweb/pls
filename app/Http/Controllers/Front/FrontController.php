<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Supply;

class FrontController extends Controller
{
    public function __construct()
    {
        // parent::__construct();

        $new_machines = Machine::where("type", 1)->orderBy("id", "desc")->pluck("name_ar", "id")->toArray();
        $used_machines = Machine::where("type", 0)->orderBy("id", "desc")->pluck("name_ar", "id")->toArray();

        view()->share("new_machines", $new_machines);
        view()->share("used_machines", $used_machines);

        $new_supplies = Supply::where("type", 1)->orderBy("id", "desc")->pluck("name_ar", "id")->toArray();
        $used_supplies = Supply::where("type", 0)->orderBy("id", "desc")->pluck("name_ar", "id")->toArray();

        view()->share("new_supplies", $new_supplies);
        view()->share("used_supplies", $used_supplies);
    }
}
