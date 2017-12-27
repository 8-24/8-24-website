<?php
namespace agence\Http\Controllers;

use agence\SeoPage;
use agence\Work;
use Illuminate\Http\Request;

class WorksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function adminIndex(){

        $data = Work::all();

        return view('admin.works.index', ['data' => $data]);

    }

    public function adminShow($id){

        $data = Work::where('id', $id)->first();
        return view('admin.works.edit', ['data' => $data]);

    }

    public function adminAdd(){

        $data = Work::all();
        return view('admin.works.add', ['works' => $data]);

    }



    public function servIndex() // rendering server for all works
    {
        $seo = SeoPage::where('title', 'works')->first();
        return view('welcome', ['data' => $seo,
            'seo_keywords' => $seo->keywords,
            'seo_description' => $seo->description]);
    }

    public function ServItemIndex($slug) // for one item
    {
        $currenLink = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data = Work::where('slug', $slug)->first();
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

    public function index($limit)
    {
        if(!isset($limit)){
            $works = Work::all();
        }else{
            $works = Work::orderBy('id', 'desc')->limit($limit)->get();
        }
        return response()->json($works, 200);
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
        $keywords = $request['keywords'];
        $description = $request['description'];
        $content = $request['content'];
        $cover = $request['cover'];


        $post = new Work();
        $post->title = $title;
        $post->slug = $slug;
        $post->keywords = $keywords;
        $post->description = $description;
        $post->cover = $cover;
        $post->content = $content;
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
        $data = Work::where('slug', $slug)->first();
        if($data != null){
            return response()->json($data, 200);
        }else{
            return response()->json(['message' => 'Aucun Post trouvé :/'], 404);
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
        $content = $request['content'];
        $cover = $request['cover'];

        Work::where('id', $id)
            ->update(['title' => $title,
                'slug' => $slug,
                'content' => $content,
                'keywords' => $keywords,
                'description' => $description,
                'cover' => $cover]);

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
