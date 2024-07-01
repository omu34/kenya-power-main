<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class EditLatestGallery extends Action
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

                'main_page_name23' => $fields->main_page_name23,
                'main_page_name24' => $fields->main_page_name24,
                'main_page_name25' => $fields->main_page_name25,
                'main_page_name81' => $fields->main_page_name81,
                'main_page_name59' => $fields->main_page_name59,
                'main_page_name60' => $fields->main_page_name60,
                'main_page_image89' => $fields->main_page_image89,
                'main_page_image90' => $fields->main_page_image90,
            ]);
        }

        return Action::message('Latest Gallery updated successfully!');
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
            Text::make('Gallery Title', 'main_page_name23')->sortable(),
            Text::make('Date Updated', 'main_page_name24')->sortable(),
            Text::make('Views', 'main_page_name25')->sortable(),
            Text::make('Gallery Description', 'main_page_name81')->sortable(),
            Text::make('Likes', 'main_page_name59')->sortable(),
            Text::make('Button Text', 'main_page_name60')->sortable(),
              Image::make('Gallery Background Image', 'main_page_image89')->disk('public')->path('images'),
            Image::make('Video Image', 'main_page_image90')->disk('public')->path('images'),
        ];
    }
}
