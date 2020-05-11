<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('bookings')) {
            Schema::create('bookings', function (Blueprint $table) {
                $table->increments('id');
                $table->datetime('time_from')->nullable();
                $table->datetime('time_to')->nullable();
                $table->integer('adult_count')->nullable();
                $table->integer('kids_count')->nullable();

                $table->integer('adult_nutrition_count')->nullable();
                $table->integer('adult_breakfast')->default(0);
                $table->integer('adult_lunch')->default(0);
                $table->integer('adult_afternoon_tea')->default(0);
                $table->integer('adult_dinner')->default(0);

                $table->integer('kids_nutrition_count')->nullable();
                $table->integer('kids_breakfast')->default(0);
                $table->integer('kids_lunch')->default(0);
                $table->integer('kids_afternoon_tea')->default(0);
                $table->integer('kids_dinner')->default(0);

                $table->text('additional_information')->nullable();

                $table->integer('prepay_cache')->default(0);
                $table->integer('prepay_kaspi')->default(0);
                $table->integer('prepay_eurasian')->default(0);
                $table->integer('prepay_forte')->default(0);

                $table->integer('post_pay_cache')->default(0);
                $table->integer('post_pay_kaspi')->default(0);
                $table->integer('post_pay_eurasian')->default(0);
                $table->integer('post_pay_forte')->default(0);

                $table->integer('extra_pay_cache')->default(0);
                $table->integer('extra_pay_kaspi')->default(0);
                $table->integer('extra_pay_eurasian')->default(0);
                $table->integer('extra_pay_forte')->default(0);

                $table->integer('amount');
                $table->integer('debt');

                $table->timestamps();
                $table->softDeletes();
                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
