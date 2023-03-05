<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteVisit extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'route_visits';
    protected $guarded = ['id'];
    protected $fillable = [
        'route_id',
        'visit_id',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }

    public function routeVisitExtras()
    {
        return $this->hasMany(RouteVisitExtra::class);
    }
}
