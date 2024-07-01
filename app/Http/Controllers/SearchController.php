<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SearchController extends Controller
{
    protected $databases = [
        'pgsql',

    ];

    protected $tables = [
        'header_navigations' => [
            'header1', 'header2', 'header3', 'header4',
            'header5', 'header6', 'header7', 'header8',
            'header9', 'header10',  'header12', 'header19',
            'image', 'header_navigation_content',
        ],
        'banners' => ['banner_content', 'image_path'],
        'basic_banners' => [
            'title', 'image_path',
            'basic_banner_content'
        ],
        'featured_news' => [
            'day',
            'views',
            'featured',
            'description',
            'likes',
            'link',
            'file',
        ],
        'latest_videos' => [
            'day',
            'views',
            'description',
            'latest_gallery',
            'button_text',
            'likes',
            'link',
            'file',
        ],
        'latest_news' => [
            'day',
            'views',
            'description',
            'latest_gallery',
            'button_text',
            'likes',
            'link',
            'file',
        ],
        'latest_galleries' => [
            'day',
            'views',
            'description',
            'latest_gallery',
            'button_text',
            'likes',
            'link',
            'file',
        ],
        'featured_news' => ['name', 'description'],
        'breadcrumbs' => [
            'breadcrumb1',
            'breadcrumb2',
            'breadcrumb_content'
        ],
        'tags' => [
            'tag1',
            'tag2'
        ],
        'footers' => [
            'footer1',
            'footer2',
            'footer_content' => 'footer pages'
        ],
        'socials' => [
            'name',
            'url',
            'image_path'
        ],
        // 'quicklinks' => [
        //     'name',
        //     'url',
        //     'image'
        // ],
        'currencies' => [
            'name',
            'code',
            'image_path',
        ],
        'top_navbars' => [
            'name',
            'link'
        ],
        'main_navbars' => [
            'name',
            'link'
        ],
        'nav_items' => [
            'name',
            'link',
            'name2',
            'link2'
        ],
        'columns' => [
            'name',
            'name2'
        ],



        'users' => ['name', 'email'],


        'latest_items' => ['name', 'description'],


        'top_navbars' => [
            'gallery_name',
            'featured',
            'button_text',
            'latest_news',
            'latest_videos',
        ],

    ];

    public function search(Request $request)
    {
        $query = $request->input('query');
        $allResults = collect();

        if ($query) {
            foreach ($this->databases as $database) {
                foreach ($this->tables as $table => $fields) {
                    $results = DB::connection($database)->table($table);

                    // Add the search conditions
                    foreach ($fields as $field) {
                        if (Schema::connection($database)->hasColumn($table, $field)) {
                            $results->orWhere($field, 'LIKE', "%{$query}%");
                        }
                    }

                    // Get the results and merge them
                    $allResults = $allResults->merge($results->get());
                }
            }
        }

        // Return a view with search results
        return view('search.search', compact('allResults', 'query'));
    }
}
