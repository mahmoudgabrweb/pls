<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Material;
use App\Models\Rcategory;
use App\Models\Type;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.materials.index");
    }

    public function grid()
    {
        $query = Material::query();

        return Datatables::of($query)
            ->addColumn("name", function ($record) {
                return $record->name_en . " - " . $record->name_ar;
            })
            ->addColumn("category", function ($record) {
                return $record->rcategory->name_en . " - " . $record->rcategory->name_ar;
            })
            ->editColumn("image", function ($record) {
                $image = Storage::url($record->image);
                return "<img width='40' height='40' src='$image' />";
            })
            ->addColumn("actions", function ($record) {
                $gallery_link = route("materials.gallery", [$record->id]);
                $edit_link = route("materials.edit", [$record->id]);
                $delete_link = route("materials.destroy", [$record->id]);
                $view_link = route("materials.show", [$record->id]);
                $actions = "<a href='$gallery_link' class='badge bg-success'>المعرض</a> ";
                $actions .= "<a href='$view_link' class='badge bg-info'>عرض</a> ";
                $actions .= "<a href='$edit_link' class='badge bg-warning'>تعديل</a>";
                $actions .= " <a href='$delete_link' class='badge bg-danger delete-record'>حذف</a>";
                return $actions;
            })
            ->rawColumns(['image', 'actions'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::pluck("name_ar", "id")->toArray();
        $categories = Rcategory::pluck("name_ar", "id")->toArray();
        $countries = \DB::table("countries")->pluck("name_ar", "code")->toArray();
        return view("admin.materials.create", compact("types", "categories", "countries"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name_en" => "required",
            "name_ar" => "required",
            "address_en" => "required",
            "address_ar" => "required",
            "price" => "required",
            "image" => "required",
            "description_en" => "required",
            "description_ar" => "required",
            "rcategory_id" => "required",
            "country_code" => "required",
            "type_id" => "required",
        ]);

        $image = $request->file("image")->store("materials");

        Material::create([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "address_en" => $request->address_en,
            "address_ar" => $request->address_ar,
            "image" => $image,
            "price" => $request->price,
            "user_id" => auth()->user()->id,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "is_active" => 1,
            "rcategory_id" => $request->rcategory_id,
            "type_id" => $request->type_id,
            "country_code" => $request->country_code,
            "available_amount" => $request->available_amount,
        ]);

        return redirect(route("materials.index"))->with("success_message", "Material has been stored successfully.");
    }

    public function show(Material $material)
    {
        $material = $material->with("rcategory", "country", "user", "type")->first();
        return view("admin.materials.show", compact("material"));
    }

    public function gallery(Material $material)
    {
        return view("admin.materials.gallery", compact("material"));
    }

    public function addGallery(Request $request, Material $material)
    {
        $this->validate($request, [
            "image" => "required",
        ]);

        $image = $request->file("image")->store("gallery");

        Gallery::create([
            "image" => $image,
            "reference_type" => "App\Models\Material",
            "reference_id" => $material->id
        ]);

        return redirect(url("admin/materials/$material->id/gallery"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        $types = Type::pluck("name_ar", "id")->toArray();
        $categories = Rcategory::pluck("name_ar", "id")->toArray();
        $countries = \DB::table("countries")->pluck("name_ar", "code")->toArray();
        return view("admin.materials.edit", compact("material", "types", "categories", "countries"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $this->validate($request, [
            "name_en" => "required",
            "name_ar" => "required",
            "address_en" => "required",
            "address_ar" => "required",
            "price" => "required",
            "description_en" => "required",
            "description_ar" => "required",
            "rcategory_id" => "required",
            "type_id" => "required",
            "country_code" => "required",
        ]);

        $updated_data = [
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "address_en" => $request->address_en,
            "address_ar" => $request->address_ar,
            "price" => $request->price,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "is_active" => (isset($request->is_active)) ? 1 : 0,
            "rcategory_id" => $request->rcategory_id,
            "type_id" => $request->type_id,
            "country_code" => $request->country_code,
            "available_amount" => $request->available_amount,
        ];

        if ($request->image) {
            $image = $request->file("image")->store("materials");
            $updated_data['image'] = $image;
        }

        $material->update($updated_data);

        return redirect(route("materials.index"))->with("success_message", "Material has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect(route("materials.index"))->with("success_message", "Material has been deleted successfully.");
    }
}
