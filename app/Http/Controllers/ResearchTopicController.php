<?php

namespace App\Http\Controllers;

use App\ResearchTopic;
use Illuminate\Http\Request;

class ResearchTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'alo mi fren';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('research_topic.create');
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
     * @param  \App\ResearchTopic  $researchTopic
     * @return \Illuminate\Http\Response
     */
    public function show(ResearchTopic $researchTopic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResearchTopic  $researchTopic
     * @return \Illuminate\Http\Response
     */
    public function edit(ResearchTopic $researchTopic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResearchTopic  $researchTopic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchTopic $researchTopic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResearchTopic  $researchTopic
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResearchTopic $researchTopic)
    {
        //
    }
}