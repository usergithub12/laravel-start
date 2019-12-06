<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Category;
use App\Post;


class PostController extends Controller
{

    public function create()
    {
        return view('create');
    }

    // public function create(Request $request)
    // {
    //     $post = new Post;
    //     $post->title = 'God of War';
    //     $post->description = 'MY Desc';

    //     $post->save();

    //     $category = Category::find([3, 4]);
    //     $post->categories()->attach($category);

    //     return 'Success';
    // }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
   
        Post::create($request->all());
    
        return Redirect::to('post/show')
       ->with('success','Greate! Product created successfully.');
    }


    public function showAll(){


        $posts = Post::all();

        return view('post-dashboard', compact('posts'));
    }

    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['post_info'] = Post::where($where)->first();
 
        return view('edit', $data);
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
         
        $update = ['title' => $request->title, 'description' => $request->description];
        Post::where('id',$id)->update($update);
   
        return Redirect::to('post/show')
       ->with('success','Great! Post updated successfully');
    }
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
   
        return Redirect::to('post/show')->with('success','Post deleted successfully');
    //   return view('post-dashboard');
    }

    
}
