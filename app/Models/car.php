<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class car extends Model
{
    use HasFactory ;
    use SoftDeletes;
    protected $fillable=[
        'carTitle',
        'description',
        'price',
        'image',
        'published',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

}