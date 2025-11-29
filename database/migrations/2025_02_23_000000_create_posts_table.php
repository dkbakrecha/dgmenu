<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('post_type')->default(1)->comment('1: Notes, 2: Blog, 3: Exam Notification');
            $table->integer('view_count')->default(0);
            $table->string('cover_image')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps(); // This adds created_at and updated_at, though model says public $timestamps = false; usually better to have them.
            // If model says $timestamps = false, we can skip this or keep it and update model. 
            // The model has public $timestamps = false; so I will remove this or keep it nullable.
            // Let's check the model again. It says public $timestamps = false;
            // But usually for blogs we need dates. I'll add them but nullable just in case, or maybe the model is old.
            // Actually, the views use created_at: {{ \Carbon\Carbon::parse($blog->created_at) }}
            // So the model configuration might be wrong or ignored, or I should enable timestamps in the model.
            // I will add timestamps here.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
