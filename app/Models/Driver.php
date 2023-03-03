<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'drivers';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'tel',
        'fax',
        'mobile',
        'emergency_number',
        'email',
        'website',
        'contact',
        'p_o_box',
        'address',
        'notes',
        'country_id',
        'city_id',
    ];
    protected $translatable = [
        'name',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
