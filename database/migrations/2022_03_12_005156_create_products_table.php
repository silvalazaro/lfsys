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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name1', 100);
            $table->string('name2', 100)->nullable();
            $table->string('description', 200);

            $table->decimal('aliquot_fcp', 15)->nullable();
            $table->decimal('aliquot_icss', 15)->nullable();

            $table->string('barcode', 500)->nullable();
            $table->string('barcode_cashier', 500)->nullable();
            $table->string('barcode_local', 20)->nullable();
            $table->string('barcode_taxed', 30)->nullable();

            $table->string('cod_tax_ipi', 4)->nullable();
            $table->string('cod_tax_pis', 4)->nullable();
            $table->string('cson', 3)->nullable();
            $table->decimal('price', 15, 4)->nullable();
            $table->decimal('price_resale', 15, 4)->nullable();
            $table->decimal('cost_average', 15, 4)->nullable();
            $table->decimal('cost_last', 15, 4)->nullable();
            $table->decimal('quantity', 15, 4)->nullable();
            $table->decimal('quantity_min', 15, 4)->nullable();
            $table->decimal('quantity_max', 15, 4)->nullable();
            $table->decimal('quantity_production', 15, 4)->nullable();
            $table->decimal('quantity_starting', 15, 4)->nullable();
            $table->decimal('quantity_reserved', 15, 4)->nullable();
            $table->decimal('quantity_actual', 15, 4)->nullable();
            $table->decimal('quantity_purchase', 15, 4)->nullable();
            $table->decimal('quantity_sale', 15, 4)->nullable();

            $table->string('field01', 100)->nullable();
            $table->string('field02', 100)->nullable();
            $table->string('field03', 100)->nullable();
            $table->string('field04', 100)->nullable();
            $table->string('field05', 100)->nullable();
            $table->string('field06', 100)->nullable();
            $table->string('field07', 100)->nullable();
            $table->string('field08', 100)->nullable();
            $table->string('field09', 100)->nullable();
            $table->string('field10', 100)->nullable();
            $table->date('date_last_purchase')->nullable();
            $table->date('date_last_sale')->nullable();
            $table->string('brand', 100);
            $table->integer('measure_id')->unsigned(); // unit of measurement
            $table->integer('provider_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
