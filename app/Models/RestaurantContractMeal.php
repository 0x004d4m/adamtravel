<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantContractMeal extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'restaurant_contract_meals';
    protected $guarded = ['id'];
    protected $fillable = [
        'restaurant_contract_id',
        'restaurant_meal_id',
        'adult_cost',
        'child_cost',
        'description',
    ];
    protected $translatable = [
        'description',
    ];

    public function restaurantContract()
    {
        return $this->belongsTo(RestaurantContract::class);
    }

    public function restaurantMeal()
    {
        return $this->belongsTo(RestaurantMeal::class);
    }
}
