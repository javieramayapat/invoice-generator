<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_product', function (Blueprint $table) {
            $table->id();
            //Relationships
            $table->foreignId('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('invoice_id')
                ->references('id')
                ->on('invoices')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('amount_of_pieces');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_product');
    }
}
