<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        return Inertia::render('HomePage', [
            'library' => Library::all(),
            'filtered' => $search ? Library::where('title', 'like', '%'.$search.'%')->get() : '',
            'search' => $search,
        ]);
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
