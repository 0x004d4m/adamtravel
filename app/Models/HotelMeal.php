<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelMeal extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'hotel_meals';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'is_bb',
        'is_hb',
        'is_fb',
        'is_all_inc',
        'is_ro',
    ];
    protected $translatable = [
        'name',
    ];
}
