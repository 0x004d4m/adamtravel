<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicePricing extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'service_pricings';
    protected $guarded = ['id'];
    protected $fillable = [
        'service_id',
        'pax_less_than',
        'pax_greater_than',
        'price_per_adult',
        'price_per_child',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}
