<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankDetail extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'bank_details';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'currency_id',
        'details',
    ];
    protected $translatable = [
        'name',
        'details',
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
