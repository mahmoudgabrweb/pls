<?php

namespace App\Http\Controllers\Front;

use App\Models\Material;

class MaterialController extends FrontController
{
    public function index()
    {
        $records = Material::where("is_active", 1)->paginate(12);
        return view("front.materials.index", compact("records"));
    }

    public function show($slug)
    {
        $id = decryptSlug($slug);
        $details = Material::find($id);
        return view("front.materials.show", compact("details"));
    }
}
