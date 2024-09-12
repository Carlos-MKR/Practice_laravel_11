<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(3);

        // Post::create([
        //     'title' => 'test',
        //     'slug' => 'test',
        //     'content' => 'test',
        //     'category_id' => 1,
        //     'description' => 'test',
        //     'posted' => 'not',
        //     'image' => 'test',
        // ]);

        // $post = Post::find(1);
        // $post->update([
        //     'title' => 'test new',
        //     'slug' => 'test',
        //     'image' => 'test',
        // ]);

        // $post = Post::find(3);
        // $post->delete();
        // dd($post->category->title);

        return view('dashboard.post.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck("title", "id");
        $post = new Post();
        
        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        /*
        $request->validate([
            'title' => 'required|min:5|max:500',
            'slug' => 'required|min:5|max:500',
            'content' => 'required',
            'category_id' => 'required|integer',
            'description' => 'required',
            'posted' => 'required',
        ]);
        */

        Post::create($request->validated());
        /*
        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'posted' => $request->posted
        ]);
        */

        return redirect()->route('post.index')->with("status", "Post created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck("title", "id");

        return view('dashboard.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $data['image'] = $filename = time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads/posts'), $filename);
        }

        $post->update($data);

        return redirect()->route('post.index')->with("status", "Post updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with("status", "Post deleted successfully");
    }
}
