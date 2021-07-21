<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use App\Models\Mcategory;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.machines.index");
    }

    public function grid()
    {
        $query = Machine::query();

        $query->with("mcategory");

        return Datatables::of($query)
            ->addColumn("name", function ($record) {
                return $record->name_en . " - " . $record->name_ar;
            })
            ->addColumn("category", function ($record) {
                return $record->mcategory->name_en . " - " . $record->mcategory->name_ar;
            })
            ->editColumn("image", function ($record) {
                $image = Storage::url($record->image);
                return "<img width='40' height='40' src='$image' />";
            })
            ->addColumn("actions", function ($record) {
                $view_link = route("machines.show", [$record->id]);
                $edit_link = route("machines.edit", [$record->id]);
                $delete_link = route("machines.destroy", [$record->id]);
                $actions = "<a href='$view_link' class='badge bg-info'>عرض</a>";
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
        $categories = Mcategory::get();
        $countries = DB::table("countries")->pluck("name_ar", "code")->toArray();
        return view("admin.machines.create", compact("categories", "countries"));
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
            "mcategory_id" => "required",
            "description_en" => "required",
            "description_ar" => "required",
            "country_code" => "required"
        ]);

        $image = $request->file("image")->store("machines");

        Machine::create([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "address_en" => $request->address_en,
            "address_ar" => $request->address_ar,
            "image" => $image,
            "price" => $request->price,
            "type" => $request->type,
            "mcategory_id" => $request->mcategory_id,
            "user_id" => auth()->user()->id,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "country_code" => $request->country_code,
            "production_date" => $request->production_date,
            "machine_power" => $request->machine_power,
            "is_active" => 1
        ]);

        return redirect(route("machines.index"))->with("success_message", "Machine has been stored successfully.");
    }

    public function show(Machine $machine)
    {
        
        return view("admin.machines.show", compact("machine"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
        $categories = Mcategory::get();
        $countries = DB::table("countries")->pluck("name_ar", "code")->toArray();
        return view("admin.machines.edit", compact("machine", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Machine $machine)
    {
        $this->validate($request, [
            "name_en" => "required",
            "name_ar" => "required",
            "address_en" => "required",
            "address_ar" => "required",
            "price" => "required",
            "type" => "required",
            "mcategory_id" => "required",
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
            "mcategory_id" => $request->mcategory_id,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "is_active" => (isset($request->is_active)) ? 1 : 0
        ];

        if ($request->image) {
            $image = $request->file("image")->store("machines");
            $updated_data['image'] = $image;
        }

        $machine->update($updated_data);

        return redirect(route("machines.index"))->with("success_message", "Machine has been updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
        $machine->delete();
        return redirect(route("machines.index"))->with("success_message", "Product deleted successfully successfully.");
    }
}
