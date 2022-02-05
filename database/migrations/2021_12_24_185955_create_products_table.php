<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_eng');
             $table->string('product_name_hin');
            $table->string('product_slug_eng');
            $table->string('product_slug_hin');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_eng');
             $table->string('product_tags_hin');
            $table->string('product_sige_eng')->nullable();;
            $table->string('product_sige_hin')->nullable();;
            $table->string('product_color_eng');
            $table->string('product_color_hin');
            $table->string('seeling_price');
             $table->string('discount_price')->nullable();;
            $table->string('short_descrip_eng');
            $table->string('short_descrip_hin');
            $table->text('long_descrip_eng');
            $table->text('long_descrip_hin');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('spacial_offer')->nullable();
            $table->integer('spacial_deals')->nullable();

            $table->integer('status')->default(0);
           
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
}
