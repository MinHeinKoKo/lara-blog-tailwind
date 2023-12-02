<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Viewer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
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
        $posts = Post::when(request("keyword") , function ($q){
            $keyword = request("keyword");
            $q -> orWhere("title","like","%$keyword%")
                ->orWhere("description","like","%$keyword%");
        })
        ->when(Auth::user()->role === "author", fn($q)=> $q-> where("user_id",Auth::id()))
            ->latest("id")
            ->when(request()->trash, fn($q)=> $q->onlyTrashed())->paginate(10)->withQueryString();
        return view('post.index', compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description);
        $post->user_id = Auth::id();
        $post->category_id = $request->category;
        if ($request->hasFile("feature_image")){
            $newName = uniqid()."_feature_image_post.".$request->file("feature_image")->extension();
            $request->file("feature_image")->storeAs('public',$newName);
            $post->feature_image = $newName;
        }
        $post->save();

        foreach ($request->photos as $photo){
            $pName = uniqid()."_post_photo.".$photo->extension();
            $photo->storeAs('public',$pName);

            $photo = new Photo();
            $photo->post_id = $post->id;
            $photo->name = $pName;
            $photo->save();
        }
        return redirect()->route('post.index')->with('status',$post->title." is created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ( Gate::denies('update', $post)){
            return abort(403,"You are not updated This Post");
        }

        $categories = Category::all();
        return view("post.edit",compact("post","categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ( Gate::denies('update', $post)){
            return abort(403,"You are not updated This Post");
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description);
        $post->user_id = Auth::id();
        $post->category_id = $request->category;

        if ($request->hasFile('feature_image')){

            Storage::delete('public/'.$post->feature_image);

            $newName = uniqid()."_feature_image.".$request->file('feature_image')->extension();
            $request->file('feature_image')->storeAs('public',$newName);
            $post->feature_image = $newName ;
        }

        $post->update();

        foreach ($request->photos as $photo){
            $newName = uniqid()."_post_photo.".$photo->extension();
            $photo->storeAs('public',$newName);

            $photo = new Photo();
            $photo->post_id = $post->id;
            $photo->name = $newName ;
            $photo->save();
        }

        return redirect()->route('post.index')->with('status',$post->title." is updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id)->first();

        if ( Gate::denies('delete', $post)){
            return abort(403,"You are not allowed to delete This Post");
        }

        $title = $post->title;

        if (request("delete") === "force"):

            if (isset($post->feature_image)){
            Storage::delete('public/'.$post->feature_image);
            }

        foreach ($post->photos as $photo){
            //removing from storage
            Storage::delete("public/".$photo->name);

            //delete from table
            $photo->delete();
        }
        Post::withTrashed()->findOrFail($id)->forceDelete();
        $message = $title." is successfully deleted";

        elseif (request("delete") === "restore"):
            Post::withTrashed()->findOrFail($id)->restore();
            $message = $title." is restored successfully.";
            else:
                Post::withTrashed()->findOrFail($id)->delete();
                $message = $title." is moved to recycle bin successfully.";
                endif;
        return redirect()->route("post.index")->with("status",$message);
    }
}
