<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [];

    protected $table = 'order_evaluation';

    public function order() 
    {
        return $this->belongsTo(Order::class);
    }

    public function client() 
    {
        return $this->belongsTo(Client::class);
    }
}
