<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('date');
            $table->integer('today_sale')->nullable();
            $table->integer('today_sale2')->nullable();
            $table->integer('total_sales')->nullable();
            $table->integer('total_sales2')->nullable();
            $table->float('rate')->nullable();
            $table->float('plan_rate')->nullable();
            $table->float('plan_rate2')->nullable();
            $table->integer('last_rate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
