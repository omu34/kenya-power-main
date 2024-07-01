<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Footer extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'footer1' ,
        'footer2' ,
        'footer_content' => 'footer pages'
    ];

    public function quickLinks()
    {
        return $this->hasMany(QuickLinks::class);
    }

    public function socials()
    {
        return $this->hasMany(Socials::class);
    }

    public function currencies()
    {
        return $this->hasMany(Currency::class);
    }


    public function nav_items()
    {
        return $this->hasMany(NavItem::class);
    }


    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->searchable = DB::raw("to_tsvector('english', coalesce(title, '') || ' ' || coalesce(content, ''))");
    //     });
    // }
}
