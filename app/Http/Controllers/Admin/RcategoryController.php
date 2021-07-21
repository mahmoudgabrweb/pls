<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rcategory;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class RcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.materials_categories.index");
    }

    public function grid()
    {
        $query = Rcategory::with("parentCategory");

        return Datatables::of($query)
            ->addColumn("name", function ($record) {
                return $record->name_en . " - " . $record->name_ar;
            })
            ->addColumn("status", function ($record) {
                return ($record->is_active) ? "Active" : "In Active";
            })
            ->addColumn("parent_name", function ($record) {
                $parent_name = ($record->parentCategory) ? $record->parentCategory->name_ar : "لا يوجد تصنيف رئيسي";
                return $parent_name;
            })
            ->addColumn("actions", function ($record) {
                $edit_link = route("materials-categories.edit", [$record->id]);
                $delete_link = route("materials-categories.destroy", [$record->id]);
                $actions = "<a href='$edit_link' class='badge bg-warning'>تعديل</a>";
                $actions .= " <a href='$delete_link' class='badge bg-danger delete-record'>حذف</a>";
                return $actions;
            })
            ->rawColumns(['actions'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Rcategory::pluck("name_ar", "id")->toArray();
        return view("admin.materials_categories.create", compact("categories"));
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
        ]);

        Rcategory::create([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "is_active" => 1,
            "parent_id" => $request->parent_id
        ]);

        return redirect(route("materials-categories.index"))->with("success_message", "Product stored successfully.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scategory  $scategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Rcategory::where("parent_id", "!=", $id)->pluck("name_ar", "id")->toArray();
        $record = Rcategory::find($id);
        return view("admin.materials_categories.edit", compact("record", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rcategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name_en" => "required",
            "name_ar" => "required",
        ]);

        $updated_data = [
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "is_active" => (isset($request->is_active)) ? 1 : 0,
            "parent_id" => $request->parent_id
        ];

        $category = Rcategory::find($id);

        $category->update($updated_data);

        return redirect(route("materials-categories.index"))->with("success_message", "Category updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mcategory  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Rcategory::find($id);
        $category->delete();
        return response()->json(['message' => "Materials Category has been deleted successfully."]);
    }
}
