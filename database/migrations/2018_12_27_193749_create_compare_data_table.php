<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompareDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('compare_data')) {
            Schema::create('compare_data', function (Blueprint $table) {
                $table->increments('id');
                $table->string('crm_id')->nullable();
                $table->string('ab_id')->nullable();
                $table->integer('ab_owner_id')->nullable();
                $table->string('ab_owner_full_name')->nullable();
                $table->string('company_name')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('compare_data');
    }
}
