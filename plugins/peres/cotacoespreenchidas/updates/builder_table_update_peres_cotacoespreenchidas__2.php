<?php namespace Peres\Cotacoespreenchidas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresCotacoespreenchidas2 extends Migration
{
    public function up()
    {
        Schema::table('peres_cotacoespreenchidas_', function($table)
        {
            $table->string('preco')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('peres_cotacoespreenchidas_', function($table)
        {
            $table->decimal('preco', 10, 0)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
