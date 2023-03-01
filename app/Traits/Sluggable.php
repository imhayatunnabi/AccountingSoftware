<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * Sluggable
 *
 * @author
 * @copyright
 * @package
 */
trait Sluggable
{
    public static function bootSluggable()
    {
        static::saving(function ($model) {
            $settings = $model->sluggable();
            $model->slug = $model->generateSlug($settings['source']);
        });
    }

    abstract public function sluggable(): array;

    public function generateSlug(string $string): string
    {
        return Str::slug($this->{$string});
    }
}