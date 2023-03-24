<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

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
        return News::all();
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
 * @OA\JsonContent(ref="#/components/schemas/news")
 * ),
 * @OA\Response(
 * response=201,
 * description="Successful operation",
 * @OA\JsonContent(ref="#/components/schemas/news")
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
public function show(News $news)
{
    return $news;
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
 * @OA\JsonContent(ref="#/components/schemas/news")
 * ),
 * @OA\Response(
 * response=202,
 * description="Successful operation",
 * @OA\JsonContent(ref="#/components/schemas/news")
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

/**
* @OA\Delete(
* path="/api/news/{id}",
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