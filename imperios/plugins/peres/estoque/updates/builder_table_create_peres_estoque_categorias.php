<?php namespace Peres\Estoque\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePeresEstoqueCategorias extends Migration
{
    public function up()
    {
        Schema::create('peres_estoque_categorias', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->string('name');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peres_estoque_categorias');
    }
}
