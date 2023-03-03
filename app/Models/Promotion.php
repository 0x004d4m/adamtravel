<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'promotions';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'is_only_ro',
        'is_inc_bb',
        'is_inc_hb',
        'is_inc_fb',
        'is_inc_all',
    ];
    protected $translatable = [
        'name',
    ];
}
