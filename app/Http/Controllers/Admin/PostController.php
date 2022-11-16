<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validator($request);
        $data = $request->all();
        $newPost = new Post();
        $newPost->fill($data);
        $newPost->slug = $this->getSlug($newPost->title);
        $newPost->save();
        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $this->validator($request);
        $edited_post = $request->all();
        if($post->title != $edited_post['title']){
            $edited_posts['slug'] = $this->getSlug($edited_post['title']);
        }

        $post->update($edited_post);
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getSlug($title){
        $slug = Str::slug($title);
        $slug_base = $slug;
        $counter = 1;
        $existingPost = Post::where('slug', $slug)->first();
        while($existingPost){
            $slug = $slug_base . '_' . $counter;
            $existingPost = Post::where('slug', $slug)->first();
            $counter++;
        }
        return $slug;
    }

    private function validator(Request $request){
        $request->validate([
            'title' => 'required|min:1|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id'
        ]);
    }
}
