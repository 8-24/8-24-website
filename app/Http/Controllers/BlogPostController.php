<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use App\SeoPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function adminIndex(){

        $data = BlogPost::all();

        return view('admin.blog.index', ['data' => $data]);

    }

    public function adminShow($id){

        $data = BlogPost::where('id', $id)->first();
        $categories = BlogCategory::all();
        $category = BlogCategory::where('id', $data->category)->first();
        return view('admin.blog.edit', ['data' => $data, 'categories' => $categories, 'category' => $category]);

    }

    public function adminAdd(){

        $categories = BlogCategory::all();
        return view('admin.blog.add', ['categories' => $categories]);

    }

    public function servIndex()
    {
        $seo = SeoPage::where('title', 'blog')->first();
        return view('welcome', ['seo_keywords' => $seo->keywords, 'seo_description' => $seo->description]);

    }

    public function servPostIndex($slug)
    {
        $data = BlogPost::where('slug', $slug)->first();
        $seo = BlogPost::where('slug', $slug)->first();
        return view('welcome', ['data' => $data, 'seo_keywords' => $seo->description, 'seo_description' => $seo->description, 'seo_author' => $seo->author, 'seo_cover' => $seo->cover]);
    }

    public function index($limit)
    {
        if(!isset($limit)){
            $data = BlogPost::all();
        }else{
            $data = BlogPost::orderBy('id', 'desc')->limit($limit)->get();
        }
        return response()->json($data, 200);

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
        $id = $request['id'];
        $title = $request['title'];
        $slug = str_slug($title, '-');
        // TODO future method $category = $request['category'];
        $category = 99;
        $keywords = $request['keywords'];
        $description = $request['description'];
        $content = $request['content'];
        $cover = $request['cover'];
        $author = Auth::user()->name;


        $post = new BlogPost();
        $post->title = $title;
        $post->slug = $slug;
        $post->description = $description;
        $post->category = $category;
        $post->keywords = $keywords;
        $post->cover = $cover;
        $post->content = $content;
        $post->author = $author;
        $post->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->first();
        return response()->json($post, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request['id'];
        $title = $request['title'];
        $slug = str_slug($title, '-');
        // TODO future method $category = $request['category'];
        $category = 99;
        $keywords = $request['keywords'];
        $description = $request['description'];
        $content = $request['content'];
        $cover = $request['cover'];
        $author = Auth::user()->name;

        BlogPost::where('id', $id)
            ->update(['title' => $title,
                      'slug' => $slug,
                'content' => $content,
                'description' => $description,
                'keywords' => $keywords,
                'category' => $category,
                'cover' => $cover,
                'author' => $author]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
