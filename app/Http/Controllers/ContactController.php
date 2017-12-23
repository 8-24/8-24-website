<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use App\SeoPage;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    /**
    * Display a listing of the resource for the admin side
    * @return \Illuminate\Http\Response
    */
    public function adminIndex(){

        $data = ContactMessage::all();
        return view('admin.contact.index', ['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo = SeoPage::where('title', 'Contact')->first();
        return view('welcome', ['seo_keywords' => $seo->keywords, 'seo_description' => $seo->description]);
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
        $email = $request['email'];
        $content = $request['content'];
        $message = new ContactMessage();
        $message->email = $email;
        $message->content = $content;
        $message->state = 0;
        $message->save();
        return response()->json(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy(Request $request)
    {
        $id = $request['id'];
        $item = ContactMessage::where('id', $id)->first();
        $item->delete();
        return redirect()->back();
        
    }
}
