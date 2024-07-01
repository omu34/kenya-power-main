<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class EditFooter extends Action
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
                'main_page_name30' => $fields->main_page_name30,
                'main_page_name31' => $fields->main_page_name31,
                'main_page_name32' => $fields->main_page_name32,
                'main_page_name33' => $fields->main_page_name33,
                'main_page_name34' => $fields->main_page_name34,
                'main_page_name35' => $fields->main_page_name35,
                'main_page_name36' => $fields->main_page_name36,
                'main_page_name37' => $fields->main_page_name37,
                'main_page_name38' => $fields->main_page_name38,
                'main_page_name39' => $fields->main_page_name39,
                'main_page_name40' => $fields->main_page_name40,
                'main_page_name41' => $fields->main_page_name41,
                'main_page_name42' => $fields->main_page_name42,
                'main_page_name43' => $fields->main_page_name43,
                'main_page_name44' => $fields->main_page_name44,
                'main_page_name45' => $fields->main_page_name45,
                'main_page_name46' => $fields->main_page_name46,
                'main_page_name47' => $fields->main_page_name47,
                'main_page_name48' => $fields->main_page_name48,
                'main_page_name49' => $fields->main_page_name49,
                'main_page_name50' => $fields->main_page_name50,
                'main_page_name51' => $fields->main_page_name51,
                'main_page_name52' => $fields->main_page_name52,
                'main_page_name53' => $fields->main_page_name53,
                'main_page_name54' => $fields->main_page_name54,
                'main_page_name55' => $fields->main_page_name55,
                'main_page_name56' => $fields->main_page_name56,
                'main_page_name57' => $fields->main_page_name57,
                'main_page_name58' => $fields->main_page_name58,
                'main_page_name71' => $fields->main_page_name71,
                'main_page_name72' => $fields->main_page_name72,
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
            Text::make('Quick Links', 'main_page_name30')->nullable(),
            Text::make('Dashboard', 'main_page_name31')->nullable(),
            Text::make('Messages', 'main_page_name32')->nullable(),
            Text::make('Notifications', 'main_page_name33')->nullable(),
            Text::make('Facebook', 'main_page_name34')->nullable(),
            Text::make('Instagram', 'main_page_name35')->nullable(),
            Text::make('LinkedIn', 'main_page_name36')->nullable(),
            Text::make('YouTube', 'main_page_name37')->nullable(),
            Text::make('WhatsApp', 'main_page_name38')->nullable(),
            Text::make('X(Twitter)', 'main_page_name39')->nullable(),
            Text::make('TikTok', 'main_page_name40')->nullable(),
            Text::make('Flickr', 'main_page_name41')->nullable(),
            Text::make('Nav Item 1', 'main_page_name42')->nullable(),
            Text::make('Nav Item 2', 'main_page_name43')->nullable(),
            Text::make('Nav Item 3', 'main_page_name44')->nullable(),
            Text::make('Nav Item 1', 'main_page_name45')->nullable(),
            Text::make('Nav Item 2', 'main_page_name46')->nullable(),
            Text::make('Nav Item 3', 'main_page_name47')->nullable(),
            Text::make('Currency 1 Name', 'main_page_name48')->nullable(),
            Text::make('Rate', 'main_page_name49')->nullable(),
            Text::make('Currency 2 Name', 'main_page_name50')->nullable(),
            Text::make('Rate', 'main_page_name51')->nullable(),
            Text::make('Currency 3 Name', 'main_page_name52')->nullable(),
            Text::make('Rate', 'main_page_name53')->nullable(),
            Text::make('Currency 4 Name', 'main_page_name54')->nullable(),
            Text::make('Rate', 'main_page_name55')->nullable(),
            Text::make('Currency 5 Name', 'main_page_name56')->nullable(),
            Text::make('Rate', 'main_page_name57')->nullable(),
            Text::make('Rights', 'main_page_name58')->nullable(),
            Text::make('Column 1 Name', 'main_page_name71')->nullable(),
            Text::make('Column 2 Name', 'main_page_name72')->nullable(),
            // Image::make('Main Page Image 82', 'main_page_image82')->disk('public')->path('images'),
            // Image::make('Main Page Image 83', 'main_page_image83')->disk('public')->path('images'),
        ];
    }
}
