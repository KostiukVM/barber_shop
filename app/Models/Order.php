<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'offer_id', 'start_time', 'duration', 'branch_id'];


    public function service()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    public function worker()
    {
        return $this->belongsTo(Employee::class, 'Employee_id');
    }

}
