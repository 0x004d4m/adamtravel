<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteVisitExtra extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'route_visit_extras';
    protected $guarded = ['id'];
    protected $fillable = [
        'route_visit_id',
        'visit_extra_id',
        'is_extra',
        'is_optional',
    ];

    public function routeVisit()
    {
        return $this->belongsTo(RouteVisit::class);
    }

    public function visitExtra()
    {
        return $this->belongsTo(VisitExtra::class);
    }
}
