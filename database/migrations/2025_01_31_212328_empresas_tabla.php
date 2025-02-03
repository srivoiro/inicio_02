<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id()  ;
            $table->string('razon_social')->unique();
            $table->string('direccion');  
            $table->string('provincia');
            $table->string('telefono');   
            $table->string('email')->unique();
            $table->string('Condicion_IVA')->nullable();  
            $table->Biginteger('cuit')->unique()->nullable();            
            $table->timestamps();

            $table->index('razon_social');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empresas', function (Blueprint $table) {
            //
        });
    }
};
