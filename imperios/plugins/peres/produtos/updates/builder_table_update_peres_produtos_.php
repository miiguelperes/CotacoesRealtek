<?php namespace Peres\Produtos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresProdutos extends Migration
{
    public function up()
    {
        Schema::table('peres_produtos_', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->text('nome')->nullable()->change();
            $table->text('descricao')->nullable()->change();
            $table->text('volume')->nullable()->change();
            $table->string('valor')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('peres_produtos_', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->text('nome')->nullable(false)->change();
            $table->text('descricao')->nullable(false)->change();
            $table->text('volume')->nullable(false)->change();
            $table->string('valor', 191)->nullable(false)->change();
        });
    }
}
