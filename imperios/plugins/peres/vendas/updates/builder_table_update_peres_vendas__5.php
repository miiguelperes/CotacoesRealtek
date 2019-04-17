<?php namespace Peres\Vendas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresVendas5 extends Migration
{
    public function up()
    {
        Schema::table('peres_vendas_', function($table)
        {
            $table->text('total')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('peres_vendas_', function($table)
        {
            $table->decimal('total', 10, 0)->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
