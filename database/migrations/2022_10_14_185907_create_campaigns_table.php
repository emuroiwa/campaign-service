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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_catergory_id');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('uri')->unique();
            $table->double('goal_amount', 10, 2)->nullable();
            $table->longText('description')->nullable();
            $table->string('payout_type')->nullable();
            $table->string('cover_image')->nullable();
            $table->foreign('campaign_catergory_id')->references('id')->on('campaign_categories')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('campaign_currencies')->onDelete('cascade');
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
        Schema::dropIfExists('campaigns');
    }
};
