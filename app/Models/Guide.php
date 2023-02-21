<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guide extends Model
{
    use CrudTrait, HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'guides';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'daily_rate',
        'accommodation_rate',
    ];
    protected $translatable = [
        'name',
    ];
}
