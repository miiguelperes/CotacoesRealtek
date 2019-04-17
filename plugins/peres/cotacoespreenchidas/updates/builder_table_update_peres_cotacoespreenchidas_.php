<?php namespace Peres\Cotacoespreenchidas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresCotacoespreenchidas extends Migration
{
    public function up()
    {
        Schema::table('peres_cotacoespreenchidas_', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('peres_cotacoespreenchidas_', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
