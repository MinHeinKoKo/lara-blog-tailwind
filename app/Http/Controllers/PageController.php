<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::when(request("keyword"), function ($q){
            $keyword = request("keyword");
            $q -> orWhere("title","like","%$keyword%")
                ->orWhere("description","like","%$keyword%");
        })
            ->latest("id")
            ->with(['user','category','photos'])
            ->paginate(10)->withQueryString();
        $mostVP = Post::take(5)->orderBy("count","DESC")->get();
        return view("pages.index", compact("posts","mostVP"));
    }

    public function detailPost($slug)
    {

        $post = Post::where("slug",$slug)->with(['user','category','photos'])->firstOrFail();
//        return $post;
        $recentPosts = Post::latest("id")->limit(5)->get();

        $viewer = new Viewer();
        if (Auth::user()){
            $viewer->user_id = Auth::id();
        }else{
            $viewer->user_id = 3;
        }
        $post->count += 1;
        $post->update();
        $viewer->post_id = $post->id;
        $viewer->save();

        return view("pages.detail" ,compact("post","recentPosts"));

    }

    public function pdfDownload($slug)
    {
        $post = Post::where("slug",$slug)->with(['user','category','photos'])->firstOrFail();
        $pdf = App::make("dompdf.wrapper");
        $pdf->loadHtml("<h1>$post->title</h1><div>$post->description</div>");
        return $pdf->stream();
    }
    public function categoryByPosts($slug)
    {
        $category = Category::where("slug",$slug)->first();
        $posts = Post::when(request("keyword"), function ($q){
            $keyword = request("keyword");
            $q->orWhere("title","like","%$keyword%")
                ->orWhere("description","like","%$keyword%");
        })->where("category_id",$category->id)
            ->latest("id")
            ->with(["user","category"])->paginate(10)->withQueryString();
        return view("pages.index",compact("posts","category"));
    }
}
