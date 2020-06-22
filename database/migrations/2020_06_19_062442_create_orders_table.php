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
        Schema::create('Order', function (Blueprint $table) {
            $table->uuid('OrderId');
            $table->primary('OrderId');

            $table->uuid('CustomerId')->nullable();
            $table->foreign('CustomerId')
                ->references('CustomerId')
                ->on('Customer')
                ->onDelete('set null')
            ;
            
            $table->enum('OrderStatus', ['Pending', 'Completed'])->default('Pending');
            $table->decimal('OrderTotal')->default(0);
            $table->dateTime('CreatedDateTime')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Order');
    }
}
