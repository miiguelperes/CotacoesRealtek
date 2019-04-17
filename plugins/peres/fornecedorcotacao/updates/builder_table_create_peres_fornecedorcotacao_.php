<?php namespace Peres\Fornecedorcotacao\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePeresFornecedorcotacao extends Migration
{
    public function up()
    {
        Schema::create('peres_fornecedorcotacao_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('cotacao_id');
            $table->integer('user_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peres_fornecedorcotacao_');
    }
}
