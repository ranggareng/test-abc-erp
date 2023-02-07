<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->boolean('active')->default(false);
            $table->char('NIK', 12)->unique();
            $table->datetime('joined');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('master_companies')->onDelete('set null');
            $table->foreign('department_id')->references('id')->on('master_departments')->onDelete('set null');
            $table->foreign('religion_id')->references('id')->on('master_religions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
