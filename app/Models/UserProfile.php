<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'about_id',
        'dob',
        'phone', 
        'address',
        'email',
        'website',
        'description',
        'user_image',
        'location',
        'skill_tag',
        'about_description',
        'bg_image',
        'bg_color',
        'card_opacity',
        'card_left_position',
        'card_top_position',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'full_name_color',
        'full_name_font',
        'full_name_font_size',
        'location_color',
        'location_font',
        'location_font_size',
        'skill_tag_bg_color',
        'skill_tag_font',
        'skill_tag_text_color',
        'dob_color',
        'dob_font',
        'phone_color',
        'phone_font',
        'address_color',
        'address_font',
        'email_color',
        'email_font',
        'website_color',
        'website_font',
        'description_color',
        'description_font',
        'background_opacity',
        'bg_type',
        'bg_type_btn',
        'bg_display',
        'link_color',
        'resize_width'
    ];
}