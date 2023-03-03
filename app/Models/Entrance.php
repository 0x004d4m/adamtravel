<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entrance extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'entrances';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'city_id',
        'adult_rate',
        'child_rate',
    ];
    protected $translatable = [
        'name',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
