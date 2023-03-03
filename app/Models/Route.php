<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'routes';
    protected $guarded = ['id'];
    protected $fillable = [
        'number',
        'name',
        'description',
        'kilometers',
        'image',
        'transportation_service_id',
        'driver_id',
        'has_driver_accommodation',
        'guide_id',
        'has_guide_accommodation',
        'route_group_id',
        'starting_city_id',
        'overnight_city_id',
    ];
    protected $translatable = [
        'name',
        'description',
    ];

    public function transportationService()
    {
        return $this->belongsTo(TransportationService::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function routeGroup()
    {
        return $this->belongsTo(RouteGroups::class);
    }

    public function startingCity()
    {
        return $this->belongsTo(City::class);
    }

    public function overnightCity()
    {
        return $this->belongsTo(City::class);
    }
}
