<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramRoute extends Model
{
    use CrudTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'program_routes';
    protected $guarded = ['id'];
    protected $fillable = [
        'day',
        'program_id',
        'route_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}
