<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classdata extends Model
{
    use HasFactory;
    protected $fillable=[
        'className',
        'capacity',
        'price',
        'isFulled',
        'timeFrom',
        'timeTo',
    ];

    protected $table= 'classes';
}
