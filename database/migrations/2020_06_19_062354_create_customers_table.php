<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Customer', function (Blueprint $table) {
            $table->uuid('CustomerId');
            $table->primary('CustomerId');
            
            $table->uuid('CustomerStatusId')->nullable();
            $table->foreign('CustomerStatusId')
            ->references('CustomerStatusId')
            ->on('CustomerStatus')
            ->onDelete('set null')
            ;
            $table->string('Name',100);
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
        Schema::dropIfExists('Customer');
    }
}
