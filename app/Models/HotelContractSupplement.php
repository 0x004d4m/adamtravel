<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelContractSupplement extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'hotel_contract_supplements';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'hotel_contract_id',
        'starting_date',
        'ending_date',
        'is_optional',
        'price_per_child',
        'price_per_adult',
        'notes',
    ];
    protected $translatable = [
        'name'
    ];

    public function hotelContract()
    {
        return $this->belongsTo(HotelContract::class);
    }
}
