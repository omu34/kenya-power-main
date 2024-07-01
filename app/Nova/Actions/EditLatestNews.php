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

class EditLatestNews extends Action
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
                'main_page_name60' => $fields->main_page_name60,
                'main_page_name61' => $fields->main_page_name61,
                'main_page_name62' => $fields->main_page_name62,
                'main_page_name63' => $fields->main_page_name63,
                'main_page_name64' => $fields->main_page_name64,
                'main_page_name65' => $fields->main_page_name65,
                'main_page_image91' => $fields->main_page_image91,
                'main_page_image92' => $fields->main_page_image92,

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
            Text::make('Gallery Title', 'main_page_name23')->sortable(),
            Text::make('Date Updated', 'main_page_name24')->sortable(),
            Text::make('Views', 'main_page_name25')->sortable(),
            Text::make('Gallery Description', 'main_page_name81')->sortable(),
            Text::make('Likes', 'main_page_name59')->sortable(),
            Text::make('Button Text', 'main_page_name60')->sortable(),
            Image::make('Main Page Image 91', 'main_page_image91')->disk('public')->path('images'),
            Image::make('Main Page Image 92', 'main_page_image91')->disk('public')->path('images'),
        ];
    }
}
