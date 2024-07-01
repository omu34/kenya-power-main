<?php

namespace App\Providers;

use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;


class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    protected function resources()
    {
        $resources = [
            \App\Nova\HeaderNavigation::class,
            \App\Nova\BasicBanner::class,
            \App\Nova\FeaturedNews::class,
            \App\Nova\LatestVideos::class,
            \App\Nova\LatestNews::class,
            \App\Nova\LatestGallery::class,
            \App\Nova\Breadcrumb::class,
            \App\Nova\Tags::class,
            \App\Nova\Search::class,
            \App\Nova\Footer::class,
            \App\Nova\Socials::class,
            \App\Nova\Currency::class,
            \App\Nova\FooterColumn::class,
            \App\Nova\FooterNavItem::class,
            // \App\Nova\LatestVideosContent::class,
            // \App\Nova\LatestNewsContent::class,
            // \App\Nova\LatestGalleryContent::class,
            \App\Nova\QuickLinks::class,
            \App\Nova\TopNavbar::class,
            \App\Nova\MainTopNavbar::class,
            \App\Nova\GlobalSearch::class,
        ];

        foreach ($resources as $resource) {
            if (class_exists($resource)) {
                Nova::resources([$resource]);
            }
        }
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'admin@gmail.com'
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
