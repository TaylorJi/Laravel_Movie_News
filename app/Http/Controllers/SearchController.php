<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Articles;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        // Get the search value from the request         
        $search = $request->input('search'); // Search in the title and body columns from the posts table         
        $newsResults = News::query()->where('title', 'LIKE', "%{$search}%")->get();
        $articleResults =  Articles::query()->where('title', 'LIKE', "%{$search}%")->get();
        // foreach ($newsResults as $result) {
        //     $result->type = 'news';
        // }
        // foreach ($articleResults as $result) {
        //     $result->type = 'article';
        // }
    
        // Merge the results and sort them by their created_at date
        // $results = $newsResults->merge($articleResults)->sortByDesc('created_at');




        $results = $newsResults->merge($articleResults);

        return view('search.index', compact('results'));
        // Return the search view with the resluts compacted         
        // return view('search.index', ['results' => $results]);
    }
}
