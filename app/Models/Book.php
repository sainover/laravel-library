<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'isbn',
        'description',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(
                Manipulations::FIT_CROP, 
                env('THUMB_SIZE_WIDTH', 200),
                env('THUMB_SIZE_HEIGHT', 400)
            )
        ;
    }

    public function scopeSearch(Builder $query, ?string $search)
    {
        if ($search) {
            return $query
                ->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('isbn', 'LIKE', '%' . $search . '%')
            ;
        }
    }
}

