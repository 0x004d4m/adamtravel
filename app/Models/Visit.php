<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visit extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'visits';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description',
        'city_id',
    ];
    protected $translatable = [
        'name',
        'description',
    ];
    
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
