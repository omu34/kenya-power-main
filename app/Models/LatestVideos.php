<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LatestVideos extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'latest_videos',
        'button_text',
        'views',
        'description',
        'likes',
        'link',
        'file',
    ];
    protected $casts = [
        'day' => 'date',
    ];

    public function files()
    {
        if (!$this->exists) {
            return collect();
        }

        return $this->morphMany(File::class, 'fileable');
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->searchable = DB::raw("to_tsvector('english', coalesce(title, '') || ' ' || coalesce(content, ''))");
    //     });
    // }
}
