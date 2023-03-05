<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelContractNote extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'hotel_contract_notes';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description',
        'hotel_contract_id',
    ];
    protected $translatable = [
        'name',
        'description',
    ];

    public function hotelContract()
    {
        return $this->belongsTo(HotelContract::class);
    }
}
