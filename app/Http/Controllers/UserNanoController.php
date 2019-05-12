<?php

namespace Cotizate\Http\Controllers;

use Cotizate\UserNano;
use Illuminate\Http\Request;

class UserNanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_nano.index', ['userNanos' => UserNano::withCount('users')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_nano.create');
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
     * @param  \Cotizate\UserNano  $userNano
     * @return \Illuminate\Http\Response
     */
    public function show(UserNano $userNano)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Cotizate\UserNano  $userNano
     * @return \Illuminate\Http\Response
     */
    public function edit(UserNano $userNano)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Cotizate\UserNano  $userNano
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserNano $userNano)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Cotizate\UserNano  $userNano
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserNano $userNano)
    {
        //
    }
}
