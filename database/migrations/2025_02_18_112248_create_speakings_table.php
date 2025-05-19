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
        Schema::create('speakings', function (Blueprint $table) {
            $table->id();
            $table->string('banner_img')->nullable();
            $table->string('video')->nullable();
            $table->longText('testimonial')->nullable();
            $table->longText('inspiring_change')->nullable();
            $table->longText('topics_i_speak_on')->nullable();
            $table->longText('my_speaking_highlights')->nullable();
            $table->longText('why_book_me')->nullable();
            $table->longText('lets_inspire_together')->nullable();
            $table->longText('watch_now')->nullable();
            $table->longText('watch_blog')->nullable();
            $table->text('recognition_accolades')->nullable();
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
        Schema::dropIfExists('speakings');
    }
};
