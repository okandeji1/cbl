<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flight extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'uuid', 'user_id', 'passengerName', 'passengerEmail', 'passengerPhone', 'passportNumber', 'airline', 'time', 'origin', 'paymentType', 'amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
