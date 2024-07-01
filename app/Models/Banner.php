<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Banner extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable = [
        'banner_content','image_path',
    ];

    public function headerNavigation()
    {
        return $this->belongsTo(HeaderNavigation::class, 'header_navigation_id');
    }


    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->searchable = DB::raw("to_tsvector('english', coalesce(title, '') || ' ' || coalesce(content, ''))");
    //     });
    // }

}
