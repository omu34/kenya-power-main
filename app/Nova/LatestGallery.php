<?php

namespace App\Nova;

// use App\Nova\Actions\DeleteLatestGallery;
// use App\Nova\Actions\EditLatestGallery;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\BelongsTo;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
// use Newsroom\Createbutton\Createbutton;

class LatestGallery extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\LatestGallery>
     */
    public static $model = \App\Models\LatestGallery::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'latest_gallery';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'latest_gallery',
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
        return static::where('latest_gallery', 'like', "%$query%")
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
            Text::make('Title', 'latest_gallery')->sortable(),
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
            // new EditLatestGallery,
            // new DeleteLatestGallery
        ];
    }
}
