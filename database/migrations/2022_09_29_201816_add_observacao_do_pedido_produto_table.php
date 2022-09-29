<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedido_produto', function (Blueprint $table) {
            $table->string('observacao')->after('quantidade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido_produto', function (Blueprint $table) {
            Schema::table('pedido_produto', function($table) {
                $table->dropColumn('observacao');
            });
        });
    }
};
