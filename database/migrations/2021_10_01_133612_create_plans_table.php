<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->id('plan_id');
            $table->double('amount',8,2);
            $table->double('home',8,2);
            $table->double('food',8,2);
            $table->double('transportation',8,2);
            $table->double('bills',8,2);
            $table->double('education',8,2);
            $table->double('entertainment',8,2);
            $table->double('health',8,2);
            $table->double('reserve',8,2);
            $table->double('others',8,2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
