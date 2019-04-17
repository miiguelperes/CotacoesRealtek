<?php namespace Peres\Clientes\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresClientes extends Migration
{
    public function up()
    {
        Schema::table('peres_clientes_', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('nome')->change();
            $table->string('sobrenome')->change();
            $table->string('rua')->change();
            $table->string('bairro')->change();
            $table->string('complemento')->change();
            $table->string('contato')->change();
            $table->string('cidade')->change();
            $table->string('email')->change();
            $table->string('facebook')->change();
            $table->string('intagram')->change();
            $table->string('cpf')->change();
            $table->string('rg')->change();
        });
    }
    
    public function down()
    {
        Schema::table('peres_clientes_', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->string('nome', 191)->change();
            $table->string('sobrenome', 191)->change();
            $table->string('rua', 191)->change();
            $table->string('bairro', 191)->change();
            $table->string('complemento', 191)->change();
            $table->string('contato', 191)->change();
            $table->string('cidade', 191)->change();
            $table->string('email', 191)->change();
            $table->string('facebook', 191)->change();
            $table->string('intagram', 191)->change();
            $table->string('cpf', 191)->change();
            $table->string('rg', 191)->change();
        });
    }
}
