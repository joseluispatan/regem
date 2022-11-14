<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitos', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('cert_registro');
            $table->date('vencimiento_registro');
            $table->string('solicitud');
            $table->string('testimonio');
            $table->string('repr_legal');
            $table->string('cedula_pasaporte');
            $table->string('cert_feclcn_felcc');
            $table->string('antec_interpol');
            $table->string('rejap');
            $table->string('licen_func');
            $table->date('vencimiento_lic');
            $table->string('nit');
            $table->string('seprec');
            $table->date('vencimiento_seprec');
            $table->string('croquis_empresa');
            $table->string('boleta_deposito');
            $table->string('licen_pirotecnicos');
            $table->string('poliza_seguro');
            $table->date('vencimiento_poliza');
            $table->string('resolicion_afcor');
            $table->string('ficha_afcor');
            $table->string('observacion');
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
        Schema::dropIfExists('requisitos');
    }
}
