<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    public $table ='credits';
    protected $fillable = [
        'user_id',
        'holdername',
        'cardnumber',
        'expiredate',
        'cvv',
    ];
    protected $hidden = [
        'cardnumber',
        'cvv',
        'expiredate',
       
    ];

    use HasFactory;
}
