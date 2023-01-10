<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =[
        'category_name',
        'course_count',
        'course_feeds',
        'date'
    ];


    public function scopeSearch($query,$data)
    {
        $query->when($data ?? "" ,function($query,$search)
        {
            $query->orwhere('category_name','like',"%".$search."%")
                  ->orwhere('course_feeds','like',"%".$search."%");

        });
    }
}
