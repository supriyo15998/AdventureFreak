<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageTable extends Migration
{
    /**
     * Run the migrations.
     //wait... fix kiya abhi..
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('package_category');
            $table->string('package_name');
            $table->bigInteger('amount_per_head');
            $table->string('facilities');
            $table->string('depart_date');
            $table->string('arrival_date');
            $table->bigInteger('days');
            $table->bigInteger('nights');
            $table->string('image')->nullable();
            $table->timestamps();//yaha v naam same hona chaohye?
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package');
    }
}
