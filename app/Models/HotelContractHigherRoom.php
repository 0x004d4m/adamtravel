<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelContractHigherRoom extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hotel_contract_higher_rooms';
    protected $guarded = ['id'];
    protected $fillable = [
        'hotel_contract_id',
        'room_type_id',
        'season_id',
        'single',
        'double',
        'triple',
        'notes',
    ];

    public function hotelContract()
    {
        return $this->belongsTo(HotelContract::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
