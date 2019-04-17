<?php namespace Peres\Produtos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresProdutos extends Migration
{
    public function up()
    {
        Schema::table('peres_produtos_', function($table)
        {
            $table->decimal('valor', 10, 0)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('peres_produtos_', function($table)
        {
            $table->decimal('valor', 10, 0)->nullable(false)->change();
        });
    }
}
