<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\BookmarkDataMapperService;
use Illuminate\Contracts\View\View;

class BookmarkController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //fetching only the data that has the same user_id as the current logged in user
        $bookmarks = Bookmark::where('user_id', Auth::id())->get();
        return view('bookmarks.index', compact('bookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
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

        // Check if the URL already exists for the user
        $alreadyBookmarked = Bookmark::where('url', $request->url)
        ->where('user_id', auth()->id())
        ->exists();

        if ($alreadyBookmarked) {
        return back()->withErrors(['url' => 'This URL is already bookmarked.']);
        }

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
        
        //mapp the fetched json data to the columns in DB
        $mappedData = BookmarkDataMapperService::mapApiData($validatedData);

        //add the current users id
        $mappedData['user_id'] = auth()->user()->id;

        //check if the url is already bookmarked
        $canonicalUrl = $mappedData['url'];

        $alreadyBookmarked = Bookmark::where('url', $canonicalUrl)
            ->where('user_id', auth()->id())
            ->exists();

        if ($alreadyBookmarked) {
            return back()->withErrors(['url' => 'This URL is already bookmarked.']);
        }

        //save to DB
        Bookmark::create($mappedData);
        
        return redirect()->route('bookmarks.index')->with('success', 'Bookmark created');
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
    public function destroy(Bookmark $bookmark): RedirectResponse
    {
        //check if user is authorized to delete the bookmark
        $this->authorize('delete', $bookmark);

        $bookmark->delete();

        return redirect()->route('bookmarks.index')->with('success', 'Bookmark deleted successfully!');
    }
}
