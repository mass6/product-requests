<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_request_id')->unsigned()->nullable();

            $table->string('product_name');
            $table->string('product_description')->nullable();
            $table->string('sku')->nullable();
            $table->string('uom')->nullable();
            $table->integer('price')->nullable();
            $table->string('supplier')->nullable();
            $table->string('state');
            $table->integer('created_by_id')->unsigned();
            $table->timestamps();
            $table->integer('updated_by_id')->unsigned()->nullable();
            $table->integer('assigned_to_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_proposals');
    }
}
