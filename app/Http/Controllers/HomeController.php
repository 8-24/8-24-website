<?php

namespace App\Http\Controllers;

use App\Home;
use App\SeoPage;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function adminIndex(){

        $data = Home::all();
        $seo = SeoPage::where('title', 'contact')->first();
        return view('admin.home.index', ['data' => $data, 'seo' => $seo]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $data = Home::all();
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
        $content = $request['content'];
        $data = new Home();
        $data->title = $title;
        $data->content = $content;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Home::where('id', $id)->first();
        return view('admin.home.edit', ['data' => $data]);
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
        $content = $request['content'];
        Home::where('id', $id)
            ->update(['title' => $title, 'content' => $content]);
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
        $data = Home::where('id', $id)->first();
        $data->delete();
        return redirect('/admin/home');

    }
}
