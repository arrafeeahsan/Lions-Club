<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //use HasFactory;
    protected $table = 'members'; 
    
    protected $fillable =[
        'member_id',
        'member_name',
        'member_type',
        'member_club',
        'member_phone',
        'member_email',
        'member_address',
        'member_father_name',
        'member_mother_name',
        'member_picture',
        'created_by',
    ];
    public $timestamps = true; //if false then CREATED_AT and UPDATED_AT will not need to be find
}
