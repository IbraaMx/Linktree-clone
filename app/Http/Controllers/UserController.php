<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $links = Link::select()
        //     ->where('user_id', $user->id)
        //     ->orderBy('created_at', 'DESC')
        //     ->get();
        return view('user.index')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth()->user();
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(!$request->password) {

            $request->validate([
                'name'  => 'required|string|max:255',
                'email' => 'email|required'
            ]);
            Auth()->user()->update($request->only(['name', 'email']));
            emotify('success', 'You are awesome. Your data successfully saved. Great Job :) !');
            return redirect()->to(route('user.settings'));

         } else {

            $request->validate([
                'name'              => 'required|string|max:255',
                'email'             => 'email|required',
                'password'          => 'required',
                'newPassword'       => 'required',
                'confirmPassword'   => 'required|same:newPassword'
            ]);

            if(Hash::check($request->newPassword, Auth()->user()->password)) {
                emotify('error', 'Something went wrong');
                return redirect()->to(route('user.settings'))->with('passwordError', 'It seems the old password');
            } elseif(!Hash::check($request->password, Auth()->user()->password)) {
                emotify('error', 'Something went wrong');
                return redirect()->to(route('user.settings'))->with('passwordError', 'This password Doesn\'t match the old');
            } else {
                Auth()->user()->update([
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'password'  => Hash::make($request->newPassword)
                ]);
                emotify('success', 'You are awesome. Your data successfully saved. Great Job :) !');
                return redirect()->to(route('user.settings'));
            }

        }

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
