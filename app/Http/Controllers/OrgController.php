<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use App\Models\Org;

class OrgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $orgs = Org::where('user_id', Auth::id())->latest('updated_at')->get();
        // $orgs = Auth::user()->orgs()->latest('updated_at')->get();
        $orgs = Org::whereBelongsTo(Auth::user())->latest('updated_at')->get();
        return view("orgs.index", ['orgs' => $orgs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'orgName' => 'required|max:120',
        //     'street' => 'required|max:120',
        //     'city' => 'required|max:60',
        //     'postalCode' => 'required|max:10',
        //     'province' => 'required|max:60',
        //     'country' => 'required|max:60',
        //     'phone' => 'required|max:15',
        //     'email' => 'required|max:120'
        // ]);
        // Auth::user->orgs()->create([
        //     'uuid' => Str::uuid(),
        //     'orgName' => $request->orgName,
        //     'street' => $request->street,
        //     'city' => $request->city,
        //     'postalCode' => $request->postalCode,
        //     'province' => $request->province,
        //     'country' => $request->country,
        //     'phone' => $request->phone,
        //     'email' => $request->email
        // ]);
        // return to_route('org.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        // if (!$org->user->is(Auth::user())) {
        //     return abort(403);
        // }
        // return view(org . show)->with('org', $org);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}