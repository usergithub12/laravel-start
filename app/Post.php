<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['field1', 'foo', 'bar' ,'title','description'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
