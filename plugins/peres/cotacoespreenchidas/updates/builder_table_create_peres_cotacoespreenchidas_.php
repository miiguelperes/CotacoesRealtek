<?php namespace Peres\Cotacoespreenchidas\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePeresCotacoespreenchidas extends Migration
{
    public function up()
    {
        Schema::create('peres_cotacoespreenchidas_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('idcotacao');
            $table->integer('idfornecedor');
            $table->integer('idproduto');
            $table->decimal('preco', 10, 0);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('peres_cotacoespreenchidas_');
    }
}
