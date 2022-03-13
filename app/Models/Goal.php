<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    public $table ='goals';
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'goal',
        'savings',
        
    ];
    use HasFactory;
}
