<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Response;
use App\Traits\ApiJsonResponse;

class TagController extends Controller
{
    use ApiJsonResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return Response::json($tags);
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
        Tag::create($request->all());
        return response()->json($this->successResponse([$request->all()],'Created successfuly'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        return Response::json($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
         // dump($slug);
         $tag = Tag::where('slug', $slug)->first();
         // dump($category);
         $tag->update($request->all());
         return response()->json($this->successResponse([$request->all()],'updated successfuly'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $tag->delete();
        return response()->json($this->successResponse([], 204));
    }
}
