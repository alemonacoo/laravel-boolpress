<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $form_data = $request->all();
        $tag = new Tag();
        $tag->fill($form_data);
        $tag->slug = $this->getSlug($tag->name);;
        $tag->save();
        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        $this->validator($request);
        $form_data = $request->all();
        if($tag->name != $form_data['name']){
            $form_data['slug'] = $this->getSlug($form_data['name']);
        }
        $tag->update($form_data);
        return redirect()->route('admin.tags.show', $tag->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }


    private function getSlug($name){
        $slug = Str::slug($name);
        $slug_base = $slug;
        $counter = 1;
        $existingPost = Tag::where('slug', $slug)->first();
        while($existingPost){
            $slug = $slug_base . '_' . $counter;
            $existingPost = Tag::where('slug', $slug)->first();
            $counter++;
        }
        return $slug;
    }

    private function validator(Request $request){
        $request->validate([
            'name' => 'required|max:50'
        ],[
            'required' => 'Il campo è obbligatorio',
            'max' => 'il nome deve essere massimo :max caratteri'
        ]);
    }
}
