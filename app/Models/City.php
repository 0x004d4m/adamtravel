<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'cities';
    protected $guarded = ['id'];
    protected $fillable = [
        'code',
        'name',
        'country_id',
    ];
    protected $translatable = [
        'name',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
