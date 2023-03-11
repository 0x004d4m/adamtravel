<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportationPlan extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'transportation_plans';
    protected $guarded = ['id'];
    protected $fillable = [
        'transportation_plan_default_id',
        'is_default',
        'notes',
        'people_less_than',
        'people_greater_than',
        'free_pax_in_dbl',
        'free_pax_in_sgl',
        'vehicle_type_id',
        'number_of_vehicles',
        'transportation_company_id',
    ];
    protected $translatable = [
        'name',
    ];

    public function transportationPlanDefault()
    {
        return $this->belongsTo(TransportationPlanDefault::class);
    }

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }

    public function transportationCompany()
    {
        return $this->belongsTo(TransportationCompany::class);
    }
}
