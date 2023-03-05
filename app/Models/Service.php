<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'services';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description',
        'visit_duration',
        'opening_hours',
        'website',
        'country_id',
        'city_id',
        'service_classification_id',
        'currency_id',
        'is_excursion',
        'is_per_group',
        'is_per_person',
        'is_per_capacity',
    ];
    protected $translatable = [
        'name',
        'description',
        'visit_duration',
        'opening_hours',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function serviceClassification()
    {
        return $this->belongsTo(ServiceClassification::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function ServicePricings()
    {
        return $this->hasMany(ServicePricing::class);
    }

}
