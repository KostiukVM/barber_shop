<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'position', 'working_schedule'];
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
