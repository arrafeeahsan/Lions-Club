<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club;

class Payment extends Model
{
    //use HasFactory;
    protected $table = 'payments'; 
    
    protected $fillable =[
        'past_due',
        'current_payment',
        'payment_due',
        'payment_note',
        'club_serial',
        'created_by',
    ];
    public $timestamps = true; //if false then CREATED_AT and UPDATED_AT will not need to be find

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

}
