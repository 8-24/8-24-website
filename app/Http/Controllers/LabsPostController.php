<?php

namespace App\Http\Controllers;

use App\LabsCategory;
use App\LabsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabsPostController extends Controller
{

    public function adminIndex(){
        $data = LabsPost::all();
        $categories = LabsCategory::all();
        return view('admin.labs.posts.index', ['data' => $data, 'categories' => $categories]);


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
    public function show($category, $slug)
    {
        //
        //return $slug;
        $data = LabsPost::where('slug', $slug)->first();
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
    public function update(Request $request, $id)
    {
        //
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
