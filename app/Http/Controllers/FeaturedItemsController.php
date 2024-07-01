<?php

namespace App\Http\Controllers;

use App\Models\FeaturedNews;
use Illuminate\Http\Request;

class FeaturedItemsController extends Controller
{
    public function show($id)
    {
        $featuredItems = FeaturedNews::findOrFail($id);

        return view('featuredItems.show', ['featuredItems' => $featuredItems]);
    }
}
