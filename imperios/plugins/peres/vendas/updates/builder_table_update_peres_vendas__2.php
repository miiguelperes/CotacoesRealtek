<?php namespace Peres\Vendas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresVendas2 extends Migration
{
    public function up()
    {
        Schema::table('peres_vendas_', function($table)
        {
            $table->renameColumn('clienteid', 'cliente_id');
        });
    }
    
    public function down()
    {
        Schema::table('peres_vendas_', function($table)
        {
            $table->renameColumn('cliente_id', 'clienteid');
        });
    }
}
