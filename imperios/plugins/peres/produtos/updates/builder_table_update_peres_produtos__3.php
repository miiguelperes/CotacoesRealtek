<?php namespace Peres\Produtos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresProdutos3 extends Migration
{
    public function up()
    {
        Schema::table('peres_produtos_', function($table)
        {
            $table->renameColumn('categoria', 'categoria_id');
        });
    }
    
    public function down()
    {
        Schema::table('peres_produtos_', function($table)
        {
            $table->renameColumn('categoria_id', 'categoria');
        });
    }
}
