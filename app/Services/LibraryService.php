<?php

namespace App\Services;

use App\Models\Library;
use Illuminate\Database\Eloquent\Collection;
use LaravelIdea\Helper\App\Models\_IH_Library_C;

class LibraryService
{
    public function getFullLibrary(): Collection|array|_IH_Library_C
    {
        return Library::all();
    }

    public function getMovies(): Collection|array|_IH_Library_C
    {
        return Library::where('category', 'Movie')->get();
    }

    public function getTvSeries(): Collection|array|_IH_Library_C
    {
        return Library::where('category', 'TV Series')->get();
    }

    public function filterLibrary($search, $category): Collection|array|_IH_Library_C
    {
        if ($category == 'all') {
            return Library::where('title', 'like', '%'.$search.'%')->get();
        }

        return Library::where('title', 'like', '%'.$search.'%')
            ->where('category', $category)->get();
    }
}
