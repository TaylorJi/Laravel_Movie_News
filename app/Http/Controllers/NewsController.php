<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use App\Models\News;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Output\ConsoleOutput;



class NewsController extends Controller
{

    /**
     * @OA\Get(
     * path="/api/news",
     * tags={"News"},
     * summary="Get all News",
     * description="Read all the News in the database",
     * operationId="index",
     * @OA\Response(
     * response=200,
     * description="successful operation"
     * ),
     * @OA\Response(
     * response=400,
     * description="Invalid status value"
     * )
     * )
     */
    public function index()
    {
        // $news = News::where('user_id', Auth::id())->latest('updated_at')->get();
        // return view("news.index", ['news' => $news]);

        $news = News::latest()->paginate(5);
        return view('news.index', ['news' => $news])->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * @OA\Post(
     * path="/api/news",
     * operationId="storeNews",
     * tags={"News"},
     * summary="Add new News",
     * description="Add News data.",
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(required={"title", "description", "picUrl"})
     * ),
     * @OA\Response(
     * response=201,
     * description="Successful operation",
     * @OA\JsonContent(required={"title", "description", "picUrl"})
     * ),
     * @OA\Response(
     * response=400,
     * description="Bad Request"
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * )
     * )
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|max:120',
        //     'description' => 'required|max:10000',

        // ]);
        // Auth::user()->news()->create([
        //     // 'uuid' => Str::uuid(),
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'picUrl' => $request->picUrl,
        // ]);
        // return to_route('news.index');

        // validate the input
        $request->validate([
            'title' => 'required',
            'logoUrl' => 'required',
        ]);
        // create a new newsletter
        News::create($request->all());
        // redirect the user to the newsletters list page and send a friendly message
        return redirect()
            ->route('news.index')
            ->with('success', 'Newsletter created successfully.');
    }

    /**
     * @OA\Get(
     * path="/api/news/{id}",
     * operationId="getNewsById",
     * tags={"News"},
     * summary="Get News information",
     * description="Returns News data",
     * @OA\Parameter(
     * name="id",
     * description="News id",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\Response(
     * response=200,
     * description="Successful operation",
     * ),
     * @OA\Response(
     * response=400,
     * description="Bad Request"
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * )
     * )
     */
    public function show(string $id)
    {
        return view('news.show', [
            'news' => News::findOrFail($id),
        ]);
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
     * @OA\Put(
     * path="/api/news/{id}",
     * operationId="updateNews",
     * tags={"News"},
     * summary="Update existing News",
     * description="Returns updated News data",
     * @OA\Parameter(
     * name="id",
     * description="News id",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\RequestBody(
     * required=true,
     * @OA\JsonContent(required={"title", "description", "picUrl"})
     * ),
     * @OA\Response(
     * response=202,
     * description="Successful operation",
     * @OA\JsonContent(required={"title", "description", "picUrl"})
     * ),
     * @OA\Response(
     * response=400,
     * description="Bad Request"
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * ),
     * @OA\Response(
     * response=404,
     * description="Resource Not Found"
     * )
     * )
     */

    public function update(Request $request, News $news)
    {
        $request->validate([
            'id' => 'required',
            'title' => 'required'
        ]);
        $news = News::find($request->get('id'));

        $output = new ConsoleOutput();
        $output->writeln('NEWSLETTER OBJECT: ' . $news);

        // Getting values from the blade template form
        $news->title = $request->get('title');
        $news->logoUrl = $request->get('logoUrl');
        $news->is_active = 1;
        $news->save();

        return redirect()->route('news.index')
            ->with('success', 'News updated successfully');
    }

    /**
     * @OA\Delete(
     * path="/news/destroy/{id}",
     * operationId="deleteNews",
     * tags={"News"},
     * summary="Delete existing News",
     * description="Deletes a record and returns no content",
     * @OA\Parameter(
     * name="id",
     * description="News id",
     * required=true,
     * in="path",
     * @OA\Schema(
     * type="integer"
     * )
     * ),
     * @OA\Response(
     * response=204,
     * description="Successful operation",
     * @OA\JsonContent()
     * ),
     * @OA\Response(
     * response=401,
     * description="Unauthenticated",
     * ),
     * @OA\Response(
     * response=403,
     * description="Forbidden"
     * ),
     * @OA\Response(
     * response=404,
     * description="Resource Not Found"
     * )
     * )
     */
    public function destroy(string $id)
    {
        $news = news::find($id);
        // delete the student
        $news->delete();
        // redirect to students list page
        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully');
    }

    public function delete(string $id)
    {
        $news = news::find($id);
        // delete the student
        $news->delete();
        // redirect to students list page
        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully');
    }

    // public function finalview()
    // {
    //     $news = News::whereBelongsTo(Auth::user())->latest('updated_at')->get();
    //     return view("news.finalview", ['news' => $news]);
    // }

    // public function welcome()
    // {
    //     $news = News::latest('updated_at')->get();
    //     return view("welcome", ['news' => $news]);
    // }
}
