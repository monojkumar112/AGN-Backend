<?php

namespace App\Http\Controllers\Backend;

use App\Models\LetsTalk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LetsTalkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lets_talks = LetsTalk::latest()->get();
        return view('backend.lets-talk.lets-talk-lists', compact('lets_talks'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lets_talk = LetsTalk::findOrFail($id);
        return view('backend.lets-talk.lets-talk-show', compact('lets_talk'));
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
    public function destroy($id)
    {
        $lets_talk = LetsTalk::findOrFail($id);
        $lets_talk->delete();
        notify()->info('Delete', 'This Subscriber Successfully Deleted');
        return back();
    }
}
