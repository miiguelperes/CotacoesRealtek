<?php namespace Peres\Clientes\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePeresClientes extends Migration
{
    public function up()
    {
        Schema::create('peres_clientes_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->string('nome')->nullable();
            $table->string('sobrenome')->nullable();
            $table->string('rua')->nullable();
            $table->integer('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('complemento')->nullable();
            $table->string('contato')->nullable();
            $table->string('cidade')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('intagram')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->date('nascimento')->nullable();
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peres_clientes_');
    }
}
