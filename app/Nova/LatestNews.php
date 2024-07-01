<?php

namespace App\Nova;

// use App\Nova\Actions\DeleteLatestNews;
// use App\Nova\Actions\EditLatestNews;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\File;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Http\Requests\NovaRequest;
// use Newsroom\Createbutton\Createbutton;

class LatestNews extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\LatestNews>
     */
    public static $model = \App\Models\LatestNews::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'latest_news';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'latest_news',
        'button_text',
        'date',
        'likes',
        'link',
        'views',
        'description',
        'file'
    ];

    public static function search($query)
    {
        return static::where('latest_news', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
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
            Text::make('Title', 'latest_news')->sortable(),
            Text::make('Button Text', 'button_text')->sortable(),
            Date::make(__('Date'), 'day')->nullable(),
            Text::make('Link', 'link')->sortable(),
            Text::make('Likes', 'likes')->sortable(),
            Text::make('Views', 'views')->sortable(),
            TextArea::make('Description', 'description')->sortable(),
            File::make('File', 'file')->disk('public')->path('images')->sortable()->nullable(),

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
            // new EditLatestNews,
            // new DeleteLatestNews
        ];
    }

    /**
     * Get the label for the resource.
     *
     * @return string
     */
    public static function label()
    {
        return 'Latest News';
    }

    /**
     * Get the singular label for the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return 'Latest News';
    }
}
