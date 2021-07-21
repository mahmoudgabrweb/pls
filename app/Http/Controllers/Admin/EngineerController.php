<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Engineer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class EngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.engineers.index");
    }

    public function grid()
    {
        $query = Engineer::query();

        return Datatables::of($query)
            ->addColumn("name", function ($record) {
                return $record->name_en . " - " . $record->name_ar;
            })
            ->editColumn("image", function ($record) {
                $image = Storage::url($record->image);
                return "<img width='40' height='40' src='$image' />";
            })
            ->addColumn("actions", function ($record) {
                $edit_link = route("engineers.edit", [$record->id]);
                $delete_link = route("engineers.destroy", [$record->id]);
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
        return view("admin.engineers.create");
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
            "phone" => "required",
            "email" => "required",
            "image" => "required",
            "address_en" => "required",
            "address_ar" => "required"
        ]);

        $image = $request->file("image")->store("engineers");

        Engineer::create([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "address_en" => $request->address_en,
            "address_ar" => $request->address_ar,
            "image" => $image,
            "rate" => 0,
            "phone" => $request->phone,
            "email" => $request->email,
            "is_active" => 1
        ]);

        return redirect(route("engineers.index"))->with("success_message", "Engineer stored successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    public function show(Engineer $engineer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    public function edit(Engineer $engineer)
    {
        return view("admin.engineers.edit", compact("engineer"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Engineer $engineer)
    {
        $this->validate($request, [
            "name_en" => "required",
            "name_ar" => "required",
            "phone" => "required",
            "email" => "required",
            "address_en" => "required",
            "address_ar" => "required"
        ]);

        $updated_data = [
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "address_en" => $request->address_en,
            "address_ar" => $request->address_ar,
            "phone" => $request->phone,
            "email" => $request->email,
            "is_active" => (isset($request->is_active)) ? 1 : 0
        ];

        if ($request->image) {
            $image = $request->file("image")->store("engineers");
            $updated_data['image'] = $image;
        }

        $engineer->update($updated_data);

        return redirect(route("engineers.index"))->with("success_message", "Engineer updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Engineer $engineer)
    {
        $engineer->delete();
        return response()->json(['message' => "Engineer has been deleted successfully."]);
    }
}
