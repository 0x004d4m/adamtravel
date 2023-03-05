<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportationContractService extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transportation_contract_services';
    protected $guarded = ['id'];
    protected $fillable = [
        'transportation_contract_id',
        'season_id',
        'transportation_service_id',
    ];

    public function transportationContract()
    {
        return $this->belongsTo(TransportationContract::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function transportationService()
    {
        return $this->belongsTo(TransportationService::class);
    }

    public function transportationContractServicePrices()
    {
        return $this->hasMany(TransportationContractServicePrice::class);
    }
}
