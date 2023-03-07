<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

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

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }

    public function routeGroup()
    {
        return $this->belongsTo(RouteGroup::class);
    }

    public function startingCity()
    {
        return $this->belongsTo(City::class);
    }

    public function overnightCity()
    {
        return $this->belongsTo(City::class);
    }

    public function routeEntrances()
    {
        return $this->hasMany(RouteEntrance::class);
    }

    public function routeRestaurants()
    {
        return $this->hasMany(RouteRestaurant::class);
    }

    public function routeVisits()
    {
        return $this->hasMany(RouteVisit::class);
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $destination_path = "public/uploads";

        if ($value==null) {
            $this->attributes[$attribute_name] = null;
        }

        if (Str::startsWith($value, 'data:image'))
        {
            $image = Image::make($value)->encode('png', 90);
            $filename = md5($value.time()).'.png';
            Storage::put($destination_path.'/'.$filename, $image->stream());
            $public_destination_path = Str::replaceFirst('public/', 'storage/', $destination_path);
            $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
        }
    }
}
