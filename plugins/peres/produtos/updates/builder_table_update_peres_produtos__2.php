<?php namespace Peres\Produtos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePeresProdutos2 extends Migration
{
    public function up()
    {
        Schema::table('peres_produtos_', function($table)
        {
            $table->smallInteger('cotacao_id');
        });
    }
    
    public function down()
    {
        Schema::table('peres_produtos_', function($table)
        {
            $table->dropColumn('cotacao_id');
        });
    }
}
