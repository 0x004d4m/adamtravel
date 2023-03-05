<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelContractOccupancy extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hotel_contract_occupancies';
    protected $guarded = ['id'];
    protected $fillable = [
        'hotel_contract_id',
        'room_type_id',
        'max_adults',
        'max_children',
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
}
