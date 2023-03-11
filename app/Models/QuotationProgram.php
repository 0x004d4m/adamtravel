<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotationProgram extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'quotation_programs';
    protected $guarded = ['id'];
    protected $fillable = [
        'quotation_id',
        'program_id'
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
