<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inclusion extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'inclusions';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'is_exclusion',
        'inclusion_default_id',
    ];
    protected $translatable = [
        'name',
    ];

    public function inclusionDefault()
    {
        return $this->belongsTo(InclusionDefault::class);
    }
}
