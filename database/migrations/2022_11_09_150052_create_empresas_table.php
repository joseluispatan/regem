<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('tipo_usuario_id');
            $table->string('tipo_empresa_id');
            $table->integer('nro_certificado');
            $table->integer('nit');
            $table->string('lic_municipal');
            $table->string('ceprec');
            $table->string('nom_rep_legal');
            $table->string('ci_rep_legal');
            $table->integer('telefono');
            $table->string('act_principal');
            $table->string('departamento_id');
            $table->string('provincia');
            $table->string('municipio');
            $table->string('zona_localidad');
            $table->string('calle_av');
            $table->string('clase_sociedad');
            $table->string('propietario');
            $table->date('fecha_fundacion');
            $table->date('vigente_desde');
            $table->date('vigente_hasta');
            $table->string('QR');
            $table->string('latitud');
            $table->string('longitud');
            $table->text('productos1');
            $table->text('productos2');
            $table->text('observaciones');
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
        Schema::dropIfExists('empresas');
    }
}
