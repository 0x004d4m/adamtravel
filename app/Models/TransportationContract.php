<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportationContract extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'transportation_contracts';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'transportation_company_id',
        'starting_date',
        'ending_date',
        'driver_accommodation',
        'commission',
        'is_prices_by_route',
    ];
    protected $translatable = [
        'name',
    ];

    public function transportationCompany()
    {
        return $this->belongsTo(TransportationCompany::class);
    }

    public function transportationContractRoutes()
    {
        return $this->hasMany(TransportationContractRoute::class);
    }

    public function transportationContractSeasons()
    {
        return $this->hasMany(TransportationContractSeason::class);
    }

    public function transportationContractServices()
    {
        return $this->hasMany(TransportationContractService::class);
    }
}
