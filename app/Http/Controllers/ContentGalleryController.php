<?php

namespace App\Http\Controllers;

use App\Models\LatestGallery;
use App\Models\LatestVideos;
use App\Models\LatestNews;
use Illuminate\Http\Request;

class ContentGalleryController extends Controller
{
    public function index()
    {
        $latestVideos = LatestVideos::latest()->take(10)->pluck('thumbnail_url');
        $latestGallery = LatestGallery::latest()->take(10)->pluck('image_url');
        $latestNews = LatestNews::latest()->take(10)->pluck('image_url');

        return view('content.index', compact('latestVideos', 'latestGallery', 'latestNews'));
    }

    public function latestVideos()
    {
        $latestVideos = LatestVideos::latest()->take(10)->pluck('thumbnail_url');
        return view('content.latest-videos', compact('latestVideos'));
    }

    public function latestGallery()
    {
        $latestGallery = LatestGallery::latest()->take(10)->pluck('image_url');
        return view('content.latest-gallery', compact('latestGallery'));
    }

    public function latestNews()
    {
        $latestNews = LatestNews::latest()->take(10)->pluck('image_url');
        return view('content.latest-news', compact('latestNews'));
    }

}
