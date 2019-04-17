<?php namespace Peres\Vendas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresVendas7 extends Migration
{
    public function up()
    {
        Schema::table('peres_vendas_', function($table)
        {
            $table->text('obs')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('peres_vendas_', function($table)
        {
            $table->dropColumn('obs');
        });
    }
}
