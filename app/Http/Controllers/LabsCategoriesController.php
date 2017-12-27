<?php

namespace agence\Http\Controllers;

use agence\LabsCategory;
use agence\SeoPage;
use Illuminate\Http\Request;

class LabsCategoriesController extends Controller
{

    public function adminIndex(){

        $data = LabsCategory::all();
        return view('admin.labs.categories.index', ['data' => $data]);
    }

    public function adminShow($id){
        $data = LabsCategory::where('id', $id)->first();
        return view('admin.labs.categories.edit', ['data' => $data]);
    }

    /**
     * Display a listing of the resource to the server rendering.
     *
     * @return \Illuminate\Http\Response
     */

    public function servIndex(){

        //$data = LabsCategory::all();
        $seo = SeoPage::where('title', 'labs')->first();
        return view('welcome', ['data' => $seo,
            'seo_keywords' => $seo->keywords,
            'seo_description' => $seo->description]);

    }

    /**
     * Display the resource to the server rendering.
     *
     */

    public function servShow($category)
    {
        $currenLink = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data = LabsCategory::where('slug', $category)->first();
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

    public function index()
    {
        $data = LabsCategory::all();
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
        $keywords = $request['keywords'];
        $description = $request['description'];
        $cover = $request['cover'];
        $item = new LabsCategory();
        $item->title = $title;
        $item->slug = $slug;
        $item->keywords = $keywords;
        $item->description = $description;
        $item->cover = $cover;
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
        $data = LabsCategory::where('slug', $slug)->first();
        if($data != null)
        {
            return response()->json($data, 200);
        }else{
            return response()->json(['message' => 'catégorie innéxistante'], 404);
        }
        
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
        $keywords = $request['keywords'];
        $description = $request['description'];
        $cover = $request['cover'];
        LabsCategory::where('id', $id)
            ->update(['title' => $title,
                'keywords' => $keywords,
                'slug' => $slug,
                'description' => $description,
                'cover' => $cover
            ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request['id'];
        $data = LabsCategory::where('id', $id);
        $data->delete();
        return redirect()->back();
    }
}
