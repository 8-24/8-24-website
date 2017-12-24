<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProcessingFrame;
class ProcessingFrameController extends Controller
{

    /**
     * Display a listing of resource for admin side
     * @return \Illuminate\Http\Response
     */

     public function adminIndex(){
         $data = ProcessingFrame::all();
         return view('admin.processing_frames.index', ['data' => $data]);
     }

    /**
     * Display the specified resource for admin side.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function adminShow($id){
        $item = ProcessingFrame::where('id', $id)->first();
        return view('admin.processing_frames.edit', ['data' => $item]);
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $slug = 'processing-frame-' . \str_random(8);
        $script = $request['script'];
        $item = new ProcessingFrame;
        $item->title = $title;
        $item->slug = $slug;
        $item->script = $script;
        $item->save();
        return \redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = ProcessingFrame::where('slug', $slug)->first();
        return \view('app.iframe.processing', ['data' => $item]);
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
        $script = $request['script'];

        ProcessingFrame::where('id', $id)
          ->update(['title' => $title, 'script' => $script]);
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
        $item = ProcessingFrame::where('id', $id)->first();
        $item->delete();
        return redirect()->back();
    }
}
