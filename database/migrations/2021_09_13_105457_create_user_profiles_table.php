<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('social_links_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('about_id')->nullable();//Images in about tags
            $table->date('dob')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->string('user_image')->nullable();
            $table->string('location')->nullable();
            $table->string('skill_tag')->nullable();//Can create a separate table
            $table->text('about_description')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('bg_color')->nullable();
            $table->string('card_opacity')->nullable();
            $table->string('card_left_position')->nullable();
            $table->string('card_top_position')->nullable();//Use offset to get element along with width
            $table->string('full_name_color')->nullable();
            $table->string('full_name_font')->nullable();
            $table->string('full_name_font_size')->nullable();
            $table->string('location_color')->nullable();
            $table->string('location_font')->nullable();
            $table->string('location_font_size')->nullable();
            $table->string('skill_tag_bg_color')->nullable();
            $table->string('skill_tag_font')->nullable();
            $table->string('skill_tag_text_color')->nullable();
            $table->string('dob_color')->nullable();
            $table->string('dob_font')->nullable();
            $table->string('phone_color')->nullable();
            $table->string('phone_font')->nullable();
            $table->string('address_color')->nullable();
            $table->string('address_font')->nullable();
            $table->string('email_color')->nullable();
            $table->string('email_font')->nullable();            
            $table->string('website_color')->nullable();
            $table->string('website_font')->nullable();
            $table->string('description_color')->nullable();
            $table->string('description_font')->nullable();
            $table->string('background_opacity')->nullable();
            $table->string('bg_type')->nullable();  
            $table->string('bg_type_btn')->nullable();  
            $table->boolean('bg_display')->default(false);  
            $table->string('link_color')->nullable();
            $table->string('resize_width')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
