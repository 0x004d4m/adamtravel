<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportationPlanDefault extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'transportation_plan_defaults';
    protected $guarded = ['id'];
    protected $fillable = ['name','is_default'];
    protected $translatable = ['name'];

    public function transportationPlans()
    {
        return $this->hasMany(TransportationPlan::class);
    }
}
