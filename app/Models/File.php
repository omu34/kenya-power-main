<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class File extends Model
{
    use HasFactory;

    protected $fillable=[

        'time',
        'content',
        'name',
        'mime_type',
        'file',
        'model', // Polymorphic relationship with other models
        'size',
        'file_id',
        'file_time',
        'likes',
        'views',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('images')
            ->acceptsMimeTypes(['image/jpeg', 'image/jpg', 'image/png']);

        $this
            ->addMediaCollection('videos')
            ->acceptsMimeTypes(['video/mp4', 'video/quicktime']);

        $this
            ->addMediaCollection('audios')
            ->acceptsMimeTypes(['audio/mpeg', 'audio/mp3', 'audio/wav']);

        $this
            ->addMediaCollection('documents')
            ->acceptsMimeTypes([
                'text/csv',
                'application/pdf',
                'application/vnd.ms-excel',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ]);
    }



    public function featuredNews()
    {
        return $this->morphedByMany(FeaturedNews::class, 'fileable');
    }
    public function latestNews()
    {
        return $this->morphedByMany(LatestNews::class, 'fileable');
    }
    public function latestVideos()
    {
        return $this->morphedByMany(LatestVideos::class, 'fileable');
    }
    public function latestGallery()
    {
        return $this->morphedByMany(LatestGallery::class, 'fileable');
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->searchable = DB::raw("to_tsvector('english', coalesce(title, '') || ' ' || coalesce(content, ''))");
    //     });
    // }
}
