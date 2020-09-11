<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::select()
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('dashboard.dashboard')->with('links', $links);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        Link::create([
            'title' => $request->title,
            'link' => $request->link,
            'user_id'   => Auth()->id()
        ]);
        emotify('success', 'You are awesome. Your data successfully saved. Great Job :) !');
        return redirect()->to(route('dashboard.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('dashboard.edit')->with('link', $link);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        if($link->user->id !== Auth()->id()) {
            return abort(403);
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        $link->update($request->only(['title', 'link']));
        emotify('success', 'You are awesome. Your data successfully updated. Great Job :) !');
        return redirect()->to(route('dashboard.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        if($link->user->id !== Auth()->id()) {
            return abort(403);
        }
        $link->delete();
        emotify('success', 'You are awesome. Your data successfully deleted. Great Job :) !');
        return redirect()->to(route('dashboard.index'));
    }
}
