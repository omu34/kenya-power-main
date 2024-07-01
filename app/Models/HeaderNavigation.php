<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class HeaderNavigation extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'header1', 'header2', 'header3', 'header4',
        'header5', 'header6', 'header7', 'header8',
        'header9', 'header10',  'header12','header19',
        'image', 'header_navigation_content',

        // 'name',
        // 'link'
    ];


    public function banners()
    {
        return $this->hasMany(Banner::class, 'header_navigation_id');
    }

    public function mainNavbar()
    {
        return $this->hasMany(MainNavbar::class, 'header_navigation_id');
    }
    public function topNavbar()
    {
        return $this->hasMany(TopNavbar::class, 'header_navigation_id');
    }

    public function basicBanner()
    {
        return $this->hasMany(BasicBanner::class, 'header_navigation_id');
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->searchable = DB::raw("to_tsvector('english', coalesce(title, '') || ' ' || coalesce(content, ''))");
    //     });
    // }

}
