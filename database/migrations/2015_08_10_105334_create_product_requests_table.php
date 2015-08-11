<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('list_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('product_description');
            $table->string('category');
            $table->string('sku')->nullable();
            $table->string('uom')->nullable();
            $table->string('purchase_recurrence');
            $table->integer('volume_requested');
            $table->integer('current_price')->nullable();
            $table->string('current_supplier')->nullable();
            $table->text('remarks')->nullable();

            $table->string('state');
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
        Schema::drop('product_requests');
    }
}
