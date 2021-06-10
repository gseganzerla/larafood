<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['order_id', 'client_id', 'stars', 'comment'];

    protected $table = 'order_evaluations';

    public function order() 
    {
        return $this->belongsTo(Order::class);
    }

    public function client() 
    {
        return $this->belongsTo(Client::class);
    }
}
