<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'programs';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'is_default',
    ];
    protected $translatable = [
        'name',
    ];

    public function programRoutes()
    {
        return $this->hasMany(ProgramRoute::class);
    }

    public function quotations()
    {
        return $this->belongsToMany(Quotation::class,'quotation_programs','program_id','quotation_id');
    }
}
