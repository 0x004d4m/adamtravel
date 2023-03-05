<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelContract extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'hotel_contracts';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'hotel_id',
        'starting_date',
        'ending_date',
        'group_rate',
    ];
    protected $translatable = [
        'name',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function hotelContractFreePolicies()
    {
        return $this->hasMany(HotelContractFreePolicy::class);
    }

    public function hotelContractHigherRooms()
    {
        return $this->hasMany(HotelContractHigherRoom::class);
    }

    public function hotelContractRates()
    {
        return $this->hasMany(HotelContractRate::class);
    }

    public function hotelContractNotes()
    {
        return $this->hasMany(HotelContractNote::class);
    }

    public function hotelContractSupplements()
    {
        return $this->hasMany(HotelContractSupplement::class);
    }

    public function hotelContractOccupancies()
    {
        return $this->hasMany(HotelContractOccupancy::class);
    }
}
