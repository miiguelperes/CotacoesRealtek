<?php namespace Peres\Estoque\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresEstoque extends Migration
{
    public function up()
    {
        Schema::table('peres_estoque_', function($table)
        {
            $table->string('volume')->change();
        });
    }
    
    public function down()
    {
        Schema::table('peres_estoque_', function($table)
        {
            $table->string('volume', 191)->change();
        });
    }
}
