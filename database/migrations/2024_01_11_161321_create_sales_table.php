<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id');
            $table->foreignId('bp_id');
            $table->String('cc');
            $table->String('ecc');
            $table->String('gender');
            $table->String('age');
            $table->String('rokok_asal');
            $table->String('other_info')->nullable();
            $table->String('longitude')->nullable();
            $table->String('latitude')->nullable();
            $table->Integer('total')->nullable();
            $table->String('image')->nullable();
            $table->Integer('mengisi_waktu_luang')->nullable();
            $table->Integer('memilih_produk_rokok')->nullable();
            $table->Integer('pertimbangan_harga')->nullable();
            $table->Integer('cowok_itu')->nullable();
            $table->boolean('is_Delete');
            $table->timestamps();
        });

        Schema::create('salesDetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreignId('product_id');
            $table->Integer('qty');
            $table->Integer('price');
            $table->Integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
        Schema::dropIfExists('salesDetails');
        Schema::table('salesDetails', function (Blueprint $table) {
            $table->dropForeign('peserta_sales_id_foreign');
        });
    }
};
