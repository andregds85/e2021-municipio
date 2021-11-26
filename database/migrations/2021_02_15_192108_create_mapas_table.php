<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapasTable extends Migration
{
    
    public function up()
    {
        Schema::create('mapas', function (Blueprint $table) {
            $table->id();
            $table->string('idp2');
            $table->string('idPaciente');
            $table->text('observação');
            $table->string('usuarioSistema');
            $table->timestamps();
        });
    }

    
    public function down()
    {

        Schema::dropIfExists('mapas');
        
    }
}
