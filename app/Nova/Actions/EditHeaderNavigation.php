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

class EditHeaderNavigation extends Action
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
                'main_page_name1' => $fields->main_page_name1,
                'main_page_name2' => $fields->main_page_name2,
                'main_page_name3' => $fields->main_page_name3,
                'main_page_name4' => $fields->main_page_name4,
                'main_page_name5' => $fields->main_page_name5,
                'main_page_name6' => $fields->main_page_name6,
                'main_page_name7' => $fields->main_page_name7,
                'main_page_name4' => $fields->main_page_name8,
                'main_page_name5' => $fields->main_page_name9,
                'main_page_name6' => $fields->main_page_name10,
                'main_page_name7' => $fields->main_page_name12,
                'main_page_name19' => $fields->main_page_name19,
                'main_page_image82' => $fields->main_page_image82,
                'main_page_image83' => $fields->main_page_image83,
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
            Text::make('Main NavLink 1', 'main_page_name1')->sortable(),
            Text::make('Main NavLink 2', 'main_page_name2')->sortable(),
            Text::make('Main NavLink 3', 'main_page_name3')->sortable(),
            Text::make('Main NavLink 4', 'main_page_name4')->sortable(),
            Text::make('Main NavLink 5', 'main_page_name5')->sortable(),
            Text::make('Main NavLink 6', 'main_page_name6')->sortable(),
            Text::make('Main NavLink 7', 'main_page_name7')->sortable(),
            Text::make('Light/Dark', 'main_page_name8')->sortable(),
            Text::make('Increase Text', 'main_page_name9')->sortable(),
            Text::make('Decrease Text', 'main_page_name10')->sortable(),
            Text::make('Open Main Menu', 'main_page_name12')->sortable(),
            Text::make('Main NavLink 8', 'main_page_name19')->sortable(),
            Image::make('Main Page Image 82', 'main_page_image82')->disk('public'),
            Image::make('Main Page Image 83', 'main_page_image83')->disk('public')


        ];
    }
}
