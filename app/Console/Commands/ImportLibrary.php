<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

#[Signature('app:import-library')]
#[Description('Command description')]
class ImportLibrary extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $data = 'app/private/data.json'
                |> storage_path(...)
                |> file_get_contents(...)
                |> (fn ($x) => json_decode($x, true));

        foreach ($data as $item) {
            DB::table('library')->insert([
                'title' => $item['title'],
                'thumb_trending_large' => $item['thumbnail']['trending']['large'] ?? null,
                'thumb_trending_small' => $item['thumbnail']['trending']['small'] ?? null,
                'thumb_small' => $item['thumbnail']['regular']['small'],
                'thumb_medium' => $item['thumbnail']['regular']['medium'],
                'thumb_large' => $item['thumbnail']['regular']['large'],
                'year' => $item['year'],
                'category' => $item['category'],
                'rating' => $item['rating'],
                'bookmarked' => $item['isBookmarked'],
                'trending' => $item['isTrending'],
            ]);
        }
    }
}
