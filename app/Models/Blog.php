<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'slug', 'content'];

    //belongTo=banyak ke 1
    //hasmany = 1 ke banyak

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
}
