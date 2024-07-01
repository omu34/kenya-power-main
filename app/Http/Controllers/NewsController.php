<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LatestItem;

class NewsController extends Controller
{
    public function show($id)
    {
        $newsItem = LatestItem::findOrFail($id);

        return view('news.show', ['newsItem' => $newsItem]);
    }
}
