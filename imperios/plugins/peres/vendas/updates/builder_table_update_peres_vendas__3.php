<?php namespace Peres\Vendas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresVendas3 extends Migration
{
    public function up()
    {
        Schema::table('peres_vendas_', function($table)
        {
            $table->text('descricao')->nullable(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('peres_vendas_', function($table)
        {
            $table->text('descricao')->nullable()->change();
        });
    }
}
