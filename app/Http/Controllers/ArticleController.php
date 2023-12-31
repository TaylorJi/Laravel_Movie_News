<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\News;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::with('newsletter')->paginate();
        return view('articles.index', ['articles' => $articles])->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($newsletter_id)
    {

        return view('articles.create', ['newsletter_id' => $newsletter_id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $newsletter_id = $request->input('newsletter_id');

        
        $news = News::where('id', $newsletter_id)->first();
        $news->is_active = 1;
        $news->save();

        $article = new Articles([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'position' => $request->get('position'),
            'picUrl' => $request->get('picUrl'),
            'newsletter_id' => $newsletter_id,
        ]);
        $article->save();

        return redirect()->route('articles.show', ['newsletter_id' => $newsletter_id])->with('success', 'Article added successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $newsletter_id)
    {
        $articles = Articles::where('newsletter_id', $newsletter_id)->with('newsletter')->paginate();
        return view('articles.index', [
            'articles' => $articles,
            'newsletter_id' => $newsletter_id,
        ])->with(request()->input('page'));
    }


    public function view(string $newsletter_id)
    {
        $articles = Articles::where('newsletter_id', $newsletter_id)->with('newsletter')->paginate();
        $news = News::where('id', $newsletter_id)->get();
        return view('articles.view', [
            'news' => $news,
            'articles' => $articles,
            'newsletter_id' => $newsletter_id,
        ])->with(request()->input('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('articles.edit', [
            'articles' => Articles::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articles $articles)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $articles = Articles::find($request->get('id'));

        $output = new ConsoleOutput();
        $output->writeln('NEWSLETTER OBJECT: ' . $articles);

        // Getting values from the blade template form
        $articles->title = $request->get('title');
        $articles->description = $request->get('description');
        $articles->picUrl = $request->get('picUrl');
        $articles->position = $request->get('position');
        $articles->save();

        return redirect()->route('articles.show', ['newsletter_id' => $articles->newsletter_id])
            ->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $newsletter_id)
    {

        $news = News::where('id', $newsletter_id)->first();
        $news->is_active = 0;
        $news->save();

        $article = Articles::find($id);
        $article->delete();
        return redirect()->route('articles.show', ['newsletter_id' => $newsletter_id])->with('success', 'Article deleted successfully.');
    }
}
