<?php namespace Peres\Estoque\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresEstoque2 extends Migration
{
    public function up()
    {
        Schema::table('peres_estoque_', function($table)
        {
            $table->integer('categoria_id');
        });
    }
    
    public function down()
    {
        Schema::table('peres_estoque_', function($table)
        {
            $table->dropColumn('categoria_id');
        });
    }
}
