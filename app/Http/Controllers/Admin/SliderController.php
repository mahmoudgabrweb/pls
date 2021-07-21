<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.sliders.index");
    }

    public function grid()
    {
        $query = Slider::query();

        return Datatables::of($query)
            ->addColumn("name", function ($record) {
                return $record->title_en . " - " . $record->title_ar;
            })
            ->editColumn("image", function ($record) {
                $image = Storage::url($record->image);
                return "<img width='40' height='40' src='$image' />";
            })
            ->editColumn("is_active", function ($record) {
                return ($record->is_active == 1) ? "Active" : "In active";
            })
            ->addColumn("actions", function ($record) {
                $edit_link = route("sliders.edit", [$record->id]);
                $delete_link = route("sliders.destroy", [$record->id]);
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
        return view("admin.sliders.create");
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
            "title_en" => "required",
            "title_ar" => "required",
            "image" => "required",
            "text_en" => "required",
            "text_ar" => "required"
        ]);

        $image = $request->file("image")->store("sliders");

        Slider::create([
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "text_en" => $request->text_en,
            "text_ar" => $request->text_ar,
            "image" => $image,
            "is_active" => 1
        ]);

        return redirect(route("sliders.index"))->with("success_message", "Slider stored successfully.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view("admin.sliders.edit", compact("slider"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            "title_en" => "required",
            "title_ar" => "required",
            "text_en" => "required",
            "text_ar" => "required"
        ]);

        $updated_data = [
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "text_en" => $request->text_en,
            "text_ar" => $request->text_ar,
            "is_active" => (isset($request->is_active)) ? 1 : 0
        ];

        if ($request->image) {
            $image = $request->file("image")->store("sliders");
            $updated_data['image'] = $image;
        }

        $slider->update($updated_data);

        return redirect(route("sliders.index"))->with("success_message", "Slider updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect(route("sliders.index"))->with("success_message", "Slider has deleted successfully.");
    }
}
