<?php namespace Peres\Produtos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePeresProdutosCategorias extends Migration
{
    public function up()
    {
        Schema::create('peres_produtos_categorias', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->text('nome');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peres_produtos_categorias');
    }
}
