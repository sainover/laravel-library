<?php

namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class CustomPathGenerator implements PathGenerator
{
    public function getPath(Media $media): string
    {
        return $this->getBasePath().'/';
    }

    public function getPathForConversions(Media $media): string
    {
        return $this->getBasePath().'/conversions/';
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getBasePath().'/responsive-images/';
    }

    protected function getBasePath(): string
    {
        return date('Y/m/Y-m-d');
    }
}
