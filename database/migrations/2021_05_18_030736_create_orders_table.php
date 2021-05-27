<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->boolean('searchable')->default(1);
            $table->unsignedBigInteger('accepted_price')->nullable();
            $table->string('company_car');
            $table->string('model');
            $table->string('year');
            $table->text('details')->nullable();
            $table->string('image')->default('no-image.jpg');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->enum('state_piece',['من الوكالة', 'مستعملة', 'جديد', 'بديل من شركات اخرى', 'كليهما'])->default('جديد');
            $table->enum('receipt',['استلام من موقع التاجر', 'توصيل'])->default('توصيل');
            $table->enum('delivery',['مستعجل', 'عادى'])->default('عادى');
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
        Schema::dropIfExists('orders');
    }
}
