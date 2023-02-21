<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleType extends Model
{
    use CrudTrait, HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'vehicle_types';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'number_of_people',
    ];
    protected $translatable = [
        'name',
    ];
}
