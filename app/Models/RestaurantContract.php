<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantContract extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'restaurant_contracts';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'starting_date',
        'ending_date',
        'restaurant_id',
        'notes',
    ];
    protected $translatable = [
        'name',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function restaurantContractMeals()
    {
        return $this->hasMany(RestaurantContractMeal::class);
    }
}
