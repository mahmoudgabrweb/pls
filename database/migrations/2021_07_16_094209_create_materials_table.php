<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string("name_en");
            $table->string("name_ar");
            $table->text("address_en");
            $table->text("address_ar");
            $table->integer("country_code");
            $table->string("price");
            $table->string("image");
            $table->boolean("is_active")->default(false);
            $table->text("description_en");
            $table->text("description_ar");
            $table->string("available_amount")->nullable();
            $table->unsignedBigInteger("rcategory_id");
            $table->foreign("rcategory_id")->references("id")->on("rcategories");
            $table->unsignedBigInteger("type_id");
            $table->foreign("type_id")->references("id")->on("types");
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
        Schema::dropIfExists('materials');
    }
}
