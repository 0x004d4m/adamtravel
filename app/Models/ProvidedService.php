<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProvidedService extends Model
{
    use CrudTrait, HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'provided_services';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'description',
        'child_per_person',
        'child_per_groub',
        'adult_per_groub',
        'adult_per_person',
    ];
    protected $translatable = [
        'name',
        'description',
    ];
}
