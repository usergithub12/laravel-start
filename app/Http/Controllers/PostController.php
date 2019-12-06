<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;


class PostController extends Controller
{
    public function create(Request $request)
    {
        $post = new Post;
        $post->title = 'God of War';
        $post->description = 'MY Desc';

        $post->save();

        $category = Category::find([3, 4]);
        $post->categories()->attach($category);

        return 'Success';
    }
    
}
