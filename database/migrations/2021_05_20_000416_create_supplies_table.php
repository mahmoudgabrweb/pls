<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->string("name_en");
            $table->string("name_ar");
            $table->text("address_en");
            $table->text("address_ar");
            $table->string("price");
            $table->string("image");
            $table->text("description_en");
            $table->text("description_ar");
            $table->string("country_code");
            $table->string("production_date");
            $table->string("machine_power");
            $table->boolean("type")->default(true)->comment("1 for new, 0 for used");
            $table->boolean("is_active")->default(true);
            $table->boolean("is_approved")->default(false);
            $table->unsignedBigInteger("scategory_id");
            $table->foreign("scategory_id")->references("id")->on("scategories");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
