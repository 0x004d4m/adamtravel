<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteEntrance extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'route_entrances';
    protected $guarded = ['id'];
    protected $fillable = [
        'route_id',
        'city_id',
        'entrance_id',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function entrance()
    {
        return $this->belongsTo(Entrance::class);
    }
}
