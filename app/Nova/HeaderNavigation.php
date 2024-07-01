<?php

namespace App\Nova;

// use App\Nova\Actions\DeleteHeaderNavigation;
// use App\Nova\Actions\EditHeaderNavigation;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
// use Newsroom\Createbutton\Createbutton;

class HeaderNavigation extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\HeaderNavigation>
     */
    public static $model = \App\Models\HeaderNavigation::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'header1';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'header1', 'header2', 'header3',
        'header4', 'header5', 'header6',
        'header7', 'header19', 'image',
        'header8', 'header9', 'header10','header12'
    ];


    public static function search($query)
    {
        return static::where('header1', 'like', "%$query%")
            ->orWhere('header2', 'like', "%$query%")
            ->get();
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
            Text::make('Main NavLink 1', 'header1')->sortable(),

            // Text::make('Main Nav Link 1', 'header1')->displayUsing(function ($value, $resource) {
            //     $url = config('app.newsroom_base_url') . "/products/{$resource->id}";
            //     return "<a href=\"{$url}\" target=\"_blank\" class=\"text-base dark:text-white hover:underline hover:underline-offset-4 font-normal text-black\">{$value}</a>";
            // })->asHtml(),

            // Text::make('Main Nav Link 2', 'header2')->displayUsing(function ($value, $resource) {
            //     $url = config('app.newsroom_base_url') . "/products/{$resource->id}";
            //     return "<a href=\"{$url}\" target=\"_blank\" class=\"text-base dark:text-white hover:underline hover:underline-offset-4 font-normal text-black\">{$value}</a>";
            // })->asHtml(),

            // Text::make('Main Nav Link 3', 'header3')->displayUsing(function ($value, $resource) {
            //     $url = config('app.newsroom_base_url') . "/products/{$resource->id}";
            //     return "<a href=\"{$url}\" target=\"_blank\" class=\"text-base dark:text-white hover:underline hover:underline-offset-4 font-normal text-black\">{$value}</a>";
            // })->asHtml(),

            // Text::make('Main Nav Link 4', 'header4')->displayUsing(function ($value, $resource) {
            //     $url = config('app.newsroom_base_url') . "/products/{$resource->id}";
            //     return "<a href=\"{$url}\" target=\"_blank\" class=\"text-base dark:text-white hover:underline hover:underline-offset-4 font-normal text-black\">{$value}</a>";
            // })->asHtml(),

            // Text::make('Main Nav Link 5', 'header5')->displayUsing(function ($value, $resource) {
            //     $url = config('app.newsroom_base_url') . "/products/{$resource->id}";
            //     return "<a href=\"{$url}\" target=\"_blank\" class=\"text-base dark:text-white hover:underline hover:underline-offset-4 font-normal text-black\">{$value}</a>";
            // })->asHtml(),

            // Text::make('Main Nav Link 6', 'header6')->displayUsing(function ($value, $resource) {
            //     $url = config('app.newsroom_base_url') . "/products/{$resource->id}";
            //     return "<a href=\"{$url}\" target=\"_blank\" class=\"text-base dark:text-white hover:underline hover:underline-offset-4 font-normal text-black\">{$value}</a>";
            // })->asHtml(),

            // Text::make('Main Nav Link 7', 'header7')->displayUsing(function ($value, $resource) {
            //     $url = config('app.newsroom_base_url') . "/products/{$resource->id}";
            //     return "<a href=\"{$url}\" target=\"_blank\" class=\"text-base text-black text-white hover:underline hover:underline-offset-4 font-normal\">{$value}</a>";
            // })->asHtml(),

            Text::make('Main NavLink 2', 'header2')->sortable(),
            Text::make('Main NavLink 3', 'header3')->sortable(),
            Text::make('Main NavLink 4', 'header4')->sortable(),
            Text::make('Main NavLink 5', 'header5')->sortable(),
            Text::make('Main NavLink 6', 'header6')->sortable(),
            Text::make('Main NavLink 7', 'header7')->sortable(),
            Text::make('Main NavLink 8', 'header19')->sortable(),
            Text::make('Light/Dark', 'header8')->sortable(),
            Text::make('Increase Text', 'header9')->sortable(),
            Text::make('Decrease Text', 'header10')->sortable(),
            Text::make('Open Main Menu', 'header12')->sortable(),
            Image::make('Logo', 'image')->disk('public'),
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
        return [
            // new Createbutton()
        ];
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
        return [
            // new EditHeaderNavigation,
            // new DeleteHeaderNavigation
        ];
    }
}
