<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->double('amount');
            $table->unsignedBigInteger('supplier_id')->nullable();           
            $table->text('description')->nullable();
            $table->unsignedBigInteger('payment_method_id');           
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('added_by');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('cats')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('expenses');
    }
}
