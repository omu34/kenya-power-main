<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class EditBreadcrumb extends Action
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

                'main_page_name26' => $fields->main_page_name26,
                'main_page_name27' => $fields->main_page_name27,
                'main_page_name28' => $fields->main_page_name28,

                // 'main_page_image84' => $fields->main_page_image84,
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
            Text::make('Page Location', 'main_page_name26')->sortable(),
            Text::make('Main Page Name', 'main_page_name27')->sortable(),
            Text::make('Single Page Name', 'main_page_name28')->sortable(),
            // Image::make('Main Page Image 82', 'main_page_image82')->disk('public')->path('images'),
            // Image::make('Main Page Image 83', 'main_page_image83')->disk('public')->path('images'),
        ];
    }
}
