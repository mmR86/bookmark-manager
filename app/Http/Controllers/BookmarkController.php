<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\BookmarkDataMapperService;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bookmarks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bookmarks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //Validate the input
        $request->validate([
            'url' => 'required|url|max:2048'
        ]);

        //Get fetched metadata with microlink
        $response = Http::get('https://api.microlink.io', [
            'url' => $request->url]);

        //chech for API errors
        if(!$response->successful()) {
            return back()->withErrors(['url' => 'Unable to fetch data from the URL']);
        }

        $fetchedMetaToJson = $response->json('data');

        //Validate the data from the API
        $validatedData = validator($fetchedMetaToJson, [
            'author' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'image.url' => 'nullable|url|max:2048',
            'url' => 'required|url|max:2048',
            'description' => 'nullable|string|max:255',
            'logo.url' => 'nullable|url|max:2048'
        ])->validate();

        $mappedData = BookmarkDataMapperService::mapApiData($validatedData);
        
        dd($mappedData);
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
