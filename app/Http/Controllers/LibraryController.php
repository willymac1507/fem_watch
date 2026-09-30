<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Services\LibraryService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LibraryController extends Controller
{
    public function __construct(
        private readonly LibraryService $libraryService,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        return Inertia::render('HomePage', [
            'library' => ! $search ? $this->libraryService->getFullLibrary() : null,
            'filtered' => $search ? $this->libraryService->filterLibrary($search, 'all') : null,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function moviesIndex(Request $request)
    {
        $search = $request->input('search');

        return Inertia::render('MoviesPage', [
            'movies' => ! $search ? $this->libraryService->getMovies() : null,
            'filtered' => $search ? $this->libraryService->filterLibrary($search, 'Movie') : null,
            'search' => $search,
        ]);
    }

    public function tvSeriesIndex(Request $request)
    {
        $search = $request->input('search');

        return Inertia::render('TVPage', [
            'series' => ! $search ? $this->libraryService->getTvSeries() : null,
            'filtered' => $search ? $this->libraryService->filterLibrary($search, 'TV Series') : null,
            'search' => $search,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $item = Library::findOrFail($request->id);
        $item->update([
            'bookmarked' => ! $item->bookmarked,
        ]);

        return redirect()->back()->with('success', 'Bookmarked!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Library $library)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Library $library)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Library $library)
    {
        //
    }

    public function search()
    {
        if (! request('search')) {
            return redirect('/home');
        } else {
            return Inertia::render('HomePage', [
                'filtered' => Library::where('title', 'like', '%'.request('search').'%')->get(),
            ]);
        }
    }
}
