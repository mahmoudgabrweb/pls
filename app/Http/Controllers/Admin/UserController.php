<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index()
    {
        return view("admin.users.index");
    }

    public function grid()
    {
        $query = User::query();

        return DataTables::of($query)
            ->addColumn("full_name", function ($record) {
                return $record->first_name . " " . $record->last_name;
            })
            ->rawColumns(['full_name'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create");
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
            "first_name" => "required",
            "last_name" => "required",
            "email" => "required",
            "password" => "required|min:6|confirmed",
            "phone" => "required",
            "image" => "required",
        ]);

        $image = $request->file("image")->store("users");

        User::create([
            'first_name' => $request->first_name,
            "last_name" => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->passowrd),
            "phone" => $request->phone,
            'image' => $image,
            'address' => $request->address,
            "company_name" => $request->company_name,
            "company_phone" => $request->company_phone,
            "is_admin" => (isset($request->is_admin)) ? 1 : 0,
            "is_active" => 1
        ]);

        return redirect(route("users.index"))->with("success_message", "User is stored successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $product = RoomProduct::find($product_id);
        $rooms = Room::pluck("name", "id")->toArray();
        $hint_types = HintType::pluck("name", "id")->toArray();
        return view("products.edit", compact("product", 'hint_types', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            "name" => "required",
            "price" => "required",
        ]);

        $updated_data = [
            "name" => $request->name,
            "price" => $request->price,
            "hint_type_id" => $request->hint_type_id,
            "hint_value" => $request->hint_value,
            "act_number" => $request->act_number,
        ];

        if ($request->thumbnail) {
            $image = $request->file('thumbnail');
            $thumbnail = time() . '.' . $image->extension();
            $destinationPath = public_path('/thumbnail');
            $img = Image::make($image->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $thumbnail);
            $updated_data["thumbnail"] = $thumbnail;
        }

        $room_product = RoomProduct::find($product_id);

        $room_product->update($updated_data);

        return redirect(route("general-products.index"))->with("success_message", "Product updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $product = RoomProduct::find($product_id);
        $product->delete();
        return redirect(route("general-products.index"))->with("success_message", "Product deleted successfully successfully.");
    }
}
