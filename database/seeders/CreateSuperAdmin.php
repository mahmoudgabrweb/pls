<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "first_name" => "Admin",
            "last_name" => "Admin",
            "email" => "admin@admin.com",
            "password" => bcrypt("admin"),
            "is_admin" => 1
        ]);
    }
}
