<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HotelContractFreePolicy extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'hotel_contract_free_policies';
    protected $guarded = ['id'];
    protected $fillable = [
        'number_of_free_pax',
        'room',
        'every',
        'type',
        'maximum',
        'hotel_contract_id',
    ];

    public function hotelContract()
    {
        return $this->belongsTo(HotelContract::class);
    }
}
