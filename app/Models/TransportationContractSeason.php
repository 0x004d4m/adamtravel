<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportationContractSeason extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transportation_contract_seasons';
    protected $guarded = ['id'];
    protected $fillable = [
        'transportation_contract_id',
        'season_id',
        'starting_date',
        'ending_date',
    ];

    public function transportationContract()
    {
        return $this->belongsTo(TransportationContract::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
