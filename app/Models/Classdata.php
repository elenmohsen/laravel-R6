<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classdata extends Model
{
    use HasFactory;
    use SoftDeletes;
    
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
