<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nationality extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'nationalities';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'market_id',
    ];
    protected $translatable = [
        'name',
    ];

    public function market()
    {
        return $this->belongsTo(Market::class);
    }
}
