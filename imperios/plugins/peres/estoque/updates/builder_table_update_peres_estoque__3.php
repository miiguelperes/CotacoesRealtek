<?php namespace Peres\Estoque\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresEstoque3 extends Migration
{
    public function up()
    {
        Schema::table('peres_estoque_', function($table)
        {
            $table->renameColumn('categoria_id', 'categorias_id');
        });
    }
    
    public function down()
    {
        Schema::table('peres_estoque_', function($table)
        {
            $table->renameColumn('categorias_id', 'categoria_id');
        });
    }
}
