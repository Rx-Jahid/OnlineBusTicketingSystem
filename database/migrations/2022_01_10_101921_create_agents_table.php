<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('agent_id');
            $table->string('agents_name', 100);
            $table->foreignId('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->integer('passport_no');
            $table->longText('nid_uplod');
            $table->string('gender',10);
            $table->string('email');
            $table->string('phone',50);
            $table->String('address');
            $table->string('password',100);
            $table->string('_token',100);
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
        Schema::dropIfExists('agents');
    }
}
