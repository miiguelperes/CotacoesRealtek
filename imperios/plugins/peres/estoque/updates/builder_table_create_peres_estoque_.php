<?php namespace Peres\Estoque\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePeresEstoque extends Migration
{
    public function up()
    {
        Schema::create('peres_estoque_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->text('nome');
            $table->string('volume');
            $table->integer('qntd');
            $table->text('descricao');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peres_estoque_');
    }
}
