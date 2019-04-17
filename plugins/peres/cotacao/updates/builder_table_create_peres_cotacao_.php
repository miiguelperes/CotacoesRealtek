<?php namespace Peres\Cotacao\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePeresCotacao extends Migration
{
    public function up()
    {
        Schema::create('peres_cotacao_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('produtos_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->dateTime('data_final');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peres_cotacao_');
    }
}
