<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return News::all();
    }

    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'picUrl' => 'required',
        ]);

        return News::create([
            'title' => request('title'),
            'description' => request('description'),
            'picUrl' => request('picUrl'),
        ]);
    }


    public function show(News $news)
    {
        return $news;
    }


    public function update(Request $request, News $news)
    {
        // validate input
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'picUrl' => 'required',
        ]);

        $isSuccess = $news->update([
            'title' => request('title'),
            'description' => request('description'),
            'picUrl' => request('picUrl'),
        ]);

        return [
            'success' => $isSuccess
        ];
    }


    public function destroy(News $news)
    {
        $isSuccess = $news->delete([
            'title' => request('title'),
            'description' => request('description'),
            'picUrl' => request('picUrl'),
        ]);

        return [
            'success' => $isSuccess
        ];
    }
}
