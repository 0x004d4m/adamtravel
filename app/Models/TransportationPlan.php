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
        'name',
        'is_default',
        'notes',
        'people_less_than',
        'people_greater_than',
        'pax',
        'free_pax_in_dbl',
        'free_pax_in_sgl',
        'transportation_type_id',
        'number_of_vehicles',
        'transportation_company_id',
    ];
    protected $translatable = [
        'name',
    ];

    public function transportationType()
    {
        return $this->belongsTo(TransportationType::class);
    }

    public function transportationCompany()
    {
        return $this->belongsTo(TransportationCompany::class);
    }
}
