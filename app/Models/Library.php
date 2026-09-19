<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string|null $thumb_trending_small
 * @property string|null $thumb_trending_large
 * @property string $thumb_small
 * @property string $thumb_medium
 * @property string $thumb_large
 * @property int $year
 * @property string $category
 * @property string $rating
 * @property bool $bookmarked
 * @property bool $trending
 */
#[Fillable(['title', 'thumb_trending_small', 'thumb_trending_large', 'thumb_small', 'thumb_medium', 'thumb_large', 'year', 'category', 'rating', 'bookmarked', 'trending'])]
#[Table('library')]
class Library extends Model
{
    //
}
