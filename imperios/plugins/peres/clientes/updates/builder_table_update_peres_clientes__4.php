<?php namespace Peres\Clientes\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresClientes4 extends Migration
{
    public function up()
    {
        Schema::table('peres_clientes_', function($table)
        {
            $table->text('contato')->nullable()->unsigned(false)->default(null)->change();
            $table->text('email')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('peres_clientes_', function($table)
        {
            $table->string('contato', 191)->nullable()->unsigned(false)->default(null)->change();
            $table->string('email', 191)->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
