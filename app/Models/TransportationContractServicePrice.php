<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportationContractServicePrice extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transportation_contract_service_prices';
    protected $guarded = ['id'];
    protected $fillable = [
        'transportation_contract_service_id',
        'transportation_type_id',
        'price',
    ];

    public function transportationContractService()
    {
        return $this->belongsTo(TransportationContractService::class);
    }

    public function transportationType()
    {
        return $this->belongsTo(TransportationType::class);
    }
}
