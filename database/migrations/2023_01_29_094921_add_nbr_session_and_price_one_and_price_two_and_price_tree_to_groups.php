<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNbrSessionAndPriceOneAndPriceTwoAndPriceTreeToGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            //
            $table->integer('nbr_session')->nullable();
            $table->float('price_one')->nullable();
            $table->float('price_two')->nullable();
            $table->float('price_tree')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            //
            $table->dropColumn(['nbr_session', 'price_one','price_two','price_tree']);
        });
    }
}
