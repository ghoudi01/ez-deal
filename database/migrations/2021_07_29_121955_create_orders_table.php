<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('realestate_type_id')->index();
            $table->unsignedBigInteger('contract_type_id')->index();
            $table->unsignedBigInteger('city_id')->index();
            $table->unsignedBigInteger('governorates_id')->index();
            $table->float('price');
            $table->float('space');
            $table->float('number_building');
            $table->float('age_building');
            $table->float('street_width');
            $table->integer('street_number');
            $table->string('view');
            $table->boolean('elevator')->default(false);
            $table->boolean('parking')->default(false);
            $table->boolean('ac')->default(false);
            $table->boolean('furniture')->default(false);
            $table->text('note');
            $table->boolean('is_active')->default(false);
            $table->integer('number_of_views')->default(0);
            $table->string('status')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
