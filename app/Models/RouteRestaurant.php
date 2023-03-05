<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RouteRestaurant extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'route_restaurants';
    protected $guarded = ['id'];
    protected $fillable = [
        'route_id',
        'restaurant_id',
        'restaurant_contract_meal_id',
        'is_breakfast',
        'is_lunch',
        'is_dinner',
        'is_optional',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function restaurantContractMeal()
    {
        return $this->belongsTo(RestaurantContractMeal::class);
    }
}
