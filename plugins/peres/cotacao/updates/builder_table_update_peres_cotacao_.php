<?php namespace Peres\Cotacao\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresCotacao extends Migration
{
    public function up()
    {
        Schema::table('peres_cotacao_', function($table)
        {
            $table->text('descricao')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('peres_cotacao_', function($table)
        {
            $table->dropColumn('descricao');
        });
    }
}
