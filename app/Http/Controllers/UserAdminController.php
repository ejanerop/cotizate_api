<?php

namespace Cotizate\Http\Controllers;

use Cotizate\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_admin.index', ['users'=> User::with(['roles', 'access_nano', 'user_nano', 'incomes' => function ($query) {
            $query->where('year', '2019');
        }])->get()]);
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
     * @param  \Cotizate\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $user->load('access_nano', 'user_nano', 'roles', 'incomes');
        foreach ($user->incomes() as $income){
            $income->total = $income->jan + $income->feb + $income->mar + $income->apr
                           + $income->may + $income->jun + $income->jul + $income->ago
                           + $income->sep + $income->oct + $income->nov + $income->dec;
            $income->save();
        }

        return view('user_admin.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Cotizate\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Cotizate\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Cotizate\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
