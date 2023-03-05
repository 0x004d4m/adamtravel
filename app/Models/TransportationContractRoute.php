<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportationContractRoute extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transportation_contract_routes';
    protected $guarded = ['id'];
    protected $fillable = [
        'transportation_contract_id',
        'route_id',
        'car_price',
        'van_price',
    ];

    public function transportationContract()
    {
        return $this->belongsTo(TransportationContract::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
