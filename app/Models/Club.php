<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Club extends Model
{
    //use HasFactory;
    protected $table = 'clubs'; 
    
    protected $fillable =[
        'serial_number',
        'club_name',
        'president_name',
        'secretary_name',
        'address',
        'total_deposit',
        'paid_amount',
        'due_amount',
        'payment_status',
        'club_logo',
        'created_by',
    ];
    public $timestamps = true; //if false then CREATED_AT and UPDATED_AT will not need to be find

    public function payment()
    {
        return $this->hasMany(Payment::class);
    } 

}
