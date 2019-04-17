<?php namespace Peres\Vendas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePeresVendas extends Migration
{
    public function up()
    {
        Schema::create('peres_vendas_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('descricao')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peres_vendas_');
    }
}
