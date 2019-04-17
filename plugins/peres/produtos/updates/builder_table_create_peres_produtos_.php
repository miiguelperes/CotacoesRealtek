<?php namespace Peres\Produtos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePeresProdutos extends Migration
{
    public function up()
    {
        Schema::create('peres_produtos_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->bigInteger('codigo');
            $table->decimal('valor', 10, 0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peres_produtos_');
    }
}
