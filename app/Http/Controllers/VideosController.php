<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LatestItem;
use App\Models\LatestVideos;

class VideosController extends Controller
{
    public function show($id)
    {
        $videosItem= LatestItem::findOrFail($id);

        return view('videos.show', ['videosItem' => $videosItem]);

        // $videosItem = LatestVideos::findOrFail($id);
        // return view('videos.show', ['videosItem' => $videosItem]);
    }
}
