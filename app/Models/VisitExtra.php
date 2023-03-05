<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitExtra extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'visit_extras';
    protected $guarded = ['id'];
    protected $fillable = [
        'visit_id',
        'name',
        'is_extra',
        'is_optional',
    ];
    protected $translatable = [
        'name',
    ];

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
