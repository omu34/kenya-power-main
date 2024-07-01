<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Http\Requests\NovaRequest;

class EditFeaturedNews extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $model->update([
                'main_page_name16' => $fields->main_page_name16,
                'main_page_name17' => $fields->main_page_name17,
                'main_page_name18' => $fields->main_page_name18,
                'main_page_name29' => $fields->main_page_name29,
                'main_page_image85' => $fields->main_page_image85,
                'main_page_image86' => $fields->main_page_image86,

            ]);
        }

        return Action::message('Banner updated successfully!');
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Featured News Title', 'main_page_name12')->sortable(),
            Text::make('Date Updated', 'main_page_name16')->sortable(),
            Text::make('Number of Views', 'main_page_name17')->sortable(),
            Text::make('Likes', 'main_page_name18')->sortable(),
            Text::make('News Description', 'main_page_name29')->sortable(),
            Image::make('Background Image', 'main_page_image83')->disk('public'),
            Image::make('Video Image', 'main_page_image85')->disk('public'),
        ];
    }
}
