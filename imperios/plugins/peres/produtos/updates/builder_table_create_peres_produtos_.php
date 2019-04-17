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
            $table->text('nome');
            $table->text('descricao');
            $table->text('volume');
            $table->string('valor');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peres_produtos_');
    }
}
