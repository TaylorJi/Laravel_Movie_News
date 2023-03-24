<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use App\Models\News;
use App\Http\Controllers\Controller;


class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::where('user_id', Auth::id())->latest('updated_at')->get();
        return view("news.index", ['news' => $news]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:120',
            'description' => 'required|max:10000',

        ]);
        Auth::user()->news()->create([
            // 'uuid' => Str::uuid(),
            'title' => $request->title,
            'description' => $request->description,
            'picUrl' => $request->picUrl,
        ]);
        return to_route('news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('news.edit', [
            'news' => news::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, news $news)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $news = news::find($request->get('id'));


        // Getting values from the blade template form
        $news->title = $request->get('title');
        $news->description = $request->get('description');
        $news->picUrl = $request->get('picUrl');
        $news->is_active = 1;
        $news->save();

        return redirect()->route('news.index')
            ->with('success', 'News updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = news::find($id);
        // delete the student
        $news->delete();
        // redirect to students list page
        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully');

    }

    public function finalview()
    {
        $news = News::whereBelongsTo(Auth::user())->latest('updated_at')->get();
        return view("news.finalview", ['news' => $news]);
    }

    public function welcome()
    {
        $news = News::latest('updated_at')->get();
        return view("welcome", ['news' => $news]);
    }
}