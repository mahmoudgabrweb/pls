<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scategory;
use App\Models\Supply;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class SupplyController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.supplies.index");
    }

    public function grid()
    {
        $query = Supply::query();

        $query->with("scategory");

        return Datatables::of($query)
            ->addColumn("name", function ($record) {
                return $record->name_en . " - " . $record->name_ar;
            })
            ->addColumn("category", function ($record) {
                return $record->scategory->name_en . " - " . $record->scategory->name_ar;
            })
            ->editColumn("image", function ($record) {
                $image = Storage::url($record->image);
                return "<img width='40' height='40' src='$image' />";
            })
            ->addColumn("actions", function ($record) {
                $edit_link = route("supplies.edit", [$record->id]);
                $delete_link = route("supplies.destroy", [$record->id]);
                $actions = "<a href='$edit_link' class='badge bg-warning'>تعديل</a>";
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
        $categories = Scategory::get();

        return view("admin.supplies.create", compact("categories"));
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
            "type" => "required",
            "scategory_id" => "required",
            "description_en" => "required",
            "description_ar" => "required"
        ]);

        $image = $request->file("image")->store("supplies");

        Supply::create([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "address_en" => $request->address_en,
            "address_ar" => $request->address_ar,
            "image" => $image,
            "price" => $request->price,
            "type" => $request->type,
            "scategory_id" => $request->scategory_id,
            "user_id" => auth()->user()->id,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "is_active" => 1
        ]);

        return redirect(route("supplies.index"))->with("success_message", "Supply has been stored successfully.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply)
    {
        $categories = Scategory::get();

        return view("admin.supplies.edit", compact("supply", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supply $supply)
    {
        $this->validate($request, [
            "name_en" => "required",
            "name_ar" => "required",
            "address_en" => "required",
            "address_ar" => "required",
            "price" => "required",
            "type" => "required",
            "scategory_id" => "required",
            "description_en" => "required",
            "description_ar" => "required"
        ]);

        $updated_data = [
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "address_en" => $request->address_en,
            "address_ar" => $request->address_ar,
            "price" => $request->price,
            "type" => $request->type,
            "scategory_id" => $request->scategory_id,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "is_active" => (isset($request->is_active)) ? 1 : 0
        ];

        if ($request->image) {
            $image = $request->file("image")->store("supplies");
            $updated_data['image'] = $image;
        }

        $supply->update($updated_data);

        return redirect(route("supplies.index"))->with("success_message", "Supply has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {
        $supply->delete();
        return redirect(route("supplies.index"))->with("success_message", "Supply has been deleted successfully.");
    }
}
