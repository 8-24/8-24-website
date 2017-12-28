<?php

namespace agence\Http\Controllers;

use agence\LabsCategory;
use agence\LabsPost;
use agence\SeoPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabsPostController extends Controller
{

    public function adminIndex(){
        $data = LabsPost::all();
        $categories = LabsCategory::all();
        return view('admin.labs.posts.index', ['data' => $data, 'categories' => $categories]);


    }

    public function adminShow($id){
        $data = LabsPost::where('id', $id)->first();
        $categories = LabsCategory::all();
        return view('admin.labs.posts.edit', ['data' => $data, 'categories' => $categories]);
    }

    /**
     * Display the resource to the server rendering.
     */

    public function servShow($category, $slug)
    {
        $currenLink = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data = LabsPost::where('slug', $slug)->first();
        if($data != null){
        return view('welcome', ['data' => $data,
            'seo_keywords' => $data->keywords,
            'seo_description' => $data->description,
            'current_link' => $currenLink
        ]);
        }else{
            $seo = SeoPage::where('slug', 'error-404')->first();
            return view('welcome', ['data' => $data, 
                                    'seo_keywords' => $seo->keywords,
                                    'seo_description' => $seo->description, 
                                    'seo_author' => $seo->author, 
                                    'seo_cover' => $seo->cover]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LabsPost::all();
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
        $title = $request['title'];
        $slug = str_slug($title, '-');
        $category = $request['category_id'];
        $description = $request['description'];
        $keywords = $request['keywords'];
        $content = $request['content'];
        $author = Auth::user()->name;
        $script = $request['script'];
        if(!empty($script) && $script != ""){
            $scriptState = true;
        }else{
            $scriptState = false;
        }
        $cover = $request['cover'];

        $item = new LabsPost();
        $item->title = $title;
        $item->slug = $slug;
        $item->category_id = $category;
        $item->cover = $cover;
        $item->keywords = $keywords;
        $item->description = $description;
        $item->author = $author;
        $item->content = $content;
        $item->script_state = $scriptState;
        $item->script_content = $script;
        $item->save();

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
        //
        //return $slug;
        $data = LabsPost::where('slug', $slug)->first();
        if($data != null){
            return response()->json($data, 200);
        }else{
            return response()->json(['message' => 'Aucun Post trouvé :( '], 404);
        }
    }

    /**
     * Display all posts from this category
     * @return \Illuminate\Http\Response
     */
    public function showCat($slug){
        $category = LabsCategory::where('slug', $slug)->first();
        $data = LabsPost::where('category_id', $category->id)->get();
        return response()->json($data, 200);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category, $slug)
    {
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
        $description = $request['description'];
        $keywords = $request['keywords'];
        $content = $request['content'];
        $cover = $request['cover'];
        $categoryId = $request['category_id'];
        LabsPost::where('id', $id)
        ->update(['title' => $title, 
                  'slug' => $slug, 
                  'keywords' => $keywords, 
                  'description' => $description, 
                  'content' => $content,
                  'cover' => $cover,
                  'category_id' => $categoryId]);
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
