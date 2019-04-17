<?php namespace Peres\Vendas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresVendas6 extends Migration
{
    public function up()
    {
        Schema::table('peres_vendas_', function($table)
        {
            $table->text('endereco')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('peres_vendas_', function($table)
        {
            $table->dropColumn('endereco');
        });
    }
}
