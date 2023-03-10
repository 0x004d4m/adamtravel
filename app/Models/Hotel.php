<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'hotels';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'star_id',
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

    public function star()
    {
        return $this->belongsTo(Star::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
