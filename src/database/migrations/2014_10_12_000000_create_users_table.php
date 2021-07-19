<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->string('menuroles');
            $table->timestamps();
            $table->softDeletes();
            $table->date('datanasc');
            $table->string('sexo', 3)->nullable();
            $table->string('cpf', 11)->unique();
            $table->string('rg', 15)->nullable();
            $table->string('celular', 14);
            $table->string('logradouro', 100);
            $table->string('numero', 5);
            $table->string('complemento', 50)->nullable();
            $table->string('bairro', 50);
            $table->string('cep', 10);
            $table->integer('idcidade');
            $table->string('flinstrutor', 3)->default('nao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
