<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelContractSeason extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hotel_contract_seasons';
    protected $guarded = ['id'];
    protected $fillable = [
        'hotel_contract_id',
        'season_id',
        'starting_date',
        'ending_date',
        'notes',
    ];

    public function hotelContract()
    {
        return $this->belongsTo(HotelContract::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
