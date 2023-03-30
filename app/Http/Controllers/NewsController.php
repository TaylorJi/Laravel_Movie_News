<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use App\Models\News;
use App\Http\Controllers\Controller;


class NewsController extends Controller
{
    /**
     * @OA\Get(
     * path="/news",
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
        return News::all();
        // $news = News::where('user_id', Auth::id())->latest('updated_at')->get();
        // return view("news.index", ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
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
    }

    /**
     * @OA\Get(
     * path="/news/{id}",
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


    public function update(Request $request, news $news)
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
        // $request->validate([
        //     'id' => 'required',
        //     'title' => 'required',
        //     'description' => 'required',
        // ]);
        // $news = news::find($request->get('id'));


        // // Getting values from the blade template form
        // $news->title = $request->get('title');
        // $news->description = $request->get('description');
        // $news->picUrl = $request->get('picUrl');
        // $news->is_active = 1;
        // $news->save();

        // return redirect()->route('news.index')
        //     ->with('success', 'News updated successfully');
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
