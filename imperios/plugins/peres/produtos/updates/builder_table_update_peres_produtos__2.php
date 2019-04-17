<?php namespace Peres\Produtos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresProdutos2 extends Migration
{
    public function up()
    {
        Schema::table('peres_produtos_', function($table)
        {
            $table->integer('categoria');
        });
    }
    
    public function down()
    {
        Schema::table('peres_produtos_', function($table)
        {
            $table->dropColumn('categoria');
        });
    }
}
