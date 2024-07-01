<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LatestItem extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'content'];

    // Constants to define the types of items
    const TYPE_GALLERY = 'gallery';
    const TYPE_VIDEO = 'video';
    const TYPE_NEWS = 'news';

    public static function getTypes()
    {
        return [
            self::TYPE_GALLERY,
            self::TYPE_VIDEO,
            self::TYPE_NEWS,
        ];
    }


    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->searchable = DB::raw("to_tsvector('english', coalesce(title, '') || ' ' || coalesce(content, ''))");
    //     });
    // }
}
