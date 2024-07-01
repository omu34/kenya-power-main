<?php

namespace App\Nova;

use App\Models\Banner;
use App\Models\BasicBanner;
use App\Models\Breadcrumb;
use App\Models\FeaturedNews;
use App\Models\HeaderNavigation;
use App\Models\LatestNews;
use App\Models\LatestVideos;
use App\Models\Search;
use App\Models\Socials;
use App\Models\Tags;
use App\Models\TopNavbar;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class GlobalSearch extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\GlobalSearch>
     */
    public static $model = \App\Models\GlobalSearch::class;




    public static function label()
    {
        return 'Global Search';
    }

    public static function singularLabel()
    {
        return 'Search Result';
    }

    

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];





    public static function search(NovaRequest $request, $query, $search)
    {
        // Aggregate search results from multiple models
        $bannerResults = Banner::search($search)->get();
        $footerResults = Footer::search($search)->get();
        $currencyResults = Currency::search($search)->get();
        $headerNavigationResults = HeaderNavigation::search($search)->get();
        $socialResults = Socials::search($search)->get();
        $basicBannerResults= BasicBanner::search($search)->get();
        $footerResults = Footer::search($search)->get();
        $breadcrumbResults = Breadcrumb::search($search)->get();
        $featuredNewsResults = FeaturedNews::search($search)->get();
        $latestNewsResults = LatestNews::search($search)->get();
        $latestVideosResults = LatestVideos::search($search)->get();
        $currencyResults = Currency::search($search)->get();
        $searchResults = Search::search($search)->get();
        $tagsResults = Tags::search($search)->get();
        $topNavbarResults = TopNavbar::search($search)->get();


        // Merge all results
        $results = $socialResults
            ->merge($bannerResults)
            ->merge($footerResults)
            ->merge($currencyResults)
            ->merge($headerNavigationResults)
            ->merge($basicBannerResults)
            ->merge($footerResults)
            ->merge($latestVideosResults)
            ->merge($breadcrumbResults)
            ->merge($latestNewsResults)
            ->merge($featuredNewsResults)
            ->merge($currencyResults)
            ->merge($searchResults)
            // ->merge($quickLinkResults)
            ->merge($topNavbarResults);
            // ->merge($currencyResults)
            // ->merge($navigationResults)
            // ->merge($quickLinkResults)
            // ->merge($footerResults)
            // ->merge($currencyResults)
            // ->merge($navigationResults);

        return $results;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
